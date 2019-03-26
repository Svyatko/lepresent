<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\DesignerRequest;
use App\Models\Translations\Designer;
use App\Http\Controllers\Controller;
use App\Services\DesignerService;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function index() {
        $designers = Designer::get();

        return view('admin.designers.index', compact('designers'));
    }

    public function create() {
        return view('admin.designers.create');
    }

    public function store(DesignerRequest $request, DesignerService $service) {
        Designer::create([
            'image' => $service->saveImg($request, 'banner_main'),
            'banner' => $service->saveImg($request, 'banner_additional'),
            'is_vip' => $service->isVip($request->is_vip),
        ]);

        $this->flashMessage($request, 'Вы успешно создали дезайнера', 'success');

        return redirect()->back();
    }

    public function edit(Designer $designer) {
        return view('admin.designers.edit', compact('designer'));
    }

    public function update(Designer $designer, DesignerRequest $request, DesignerService $service) {
        $input['is_vip'] = $service->isVip($request->is_vip);


        if($request->new_banner_main)
            $input['image'] = $service->saveImg($request, 'new_banner_main');
        if($request->new_banner_additional)
            $input['banner'] = $service->saveImg($request, 'new_banner_additional');


        $designer->update($input);

        $this->flashMessage($request, 'Вы успешно обновили дезайнера', 'success');

        return redirect()->back();
    }

    public function destroy(Designer $designer, Request $request) {
        $designer->delete();

        $this->flashMessage($request, 'Вы успешно удалили дезайнера', 'warning');

        return redirect()->back();
    }

    public function search(Request $request) {
        $designers = Designer::where('title', 'like', "%$request->text%")->get();

        $view = view('admin.designers.includes.table', compact('designers'));

        return response($view);
    }
}
