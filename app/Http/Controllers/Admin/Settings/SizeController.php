<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SizeRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index() {
        $sizes = Size::orderBy('size')->get();

        return view('admin.settings.sizes.index', compact('sizes'));
    }

    public function create() {
        return view('admin.settings.sizes.create');
    }

    public function store(SizeRequest $request) {
        Size::create($request->only('size'));

        $this->flashMessage($request, 'Размер добавлено', 'warning');

        return redirect()->back();
    }

    public function edit(Size $size) {
        return view('admin.settings.sizes.edit', compact('size'));
    }

    public function update(Size $size, SizeRequest $request) {
        $size->update($request->only('size'));

        $this->flashMessage($request, 'Размер обновлено', 'success');

        return redirect()->route('admin.sizes.index');
    }

    public function destroy(Size $size, Request $request) {
        $size->delete();

        $this->flashMessage($request, 'Размер удалено', 'success');

        return redirect()->route('admin.sizes.index');
    }
}
