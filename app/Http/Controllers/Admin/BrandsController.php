<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brands;
use App\Services\BrandsService;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index() {
        $brands = Brands::get();

        return view('admin.brands.index', compact('brands'));
    }

    public function create() {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $request, BrandsService $service) {
        Brands::create(['name' => $request->name, 'is_vip' => $service->isVip($request->is_vip)]);

        $this->flashMessage($request, 'Бренд добавлено', 'success');

        return redirect()->back();
    }

    public function edit(Brands $brand) {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Brands $brand, BrandRequest $request, BrandsService $service) {
        $brand->update(['name' => $request->name, 'is_vip' => $service->isVip($request->is_vip)]);

        $this->flashMessage($request, 'Бренд обновлено', 'success');

        return redirect()->back();
    }

    public function destroy(Brands $brand, Request $request) {
        $message = "Бренд $brand->name удалено";
        $this->flashMessage($request, $message, 'warning');

        $brand->delete();

        return redirect()->back();
    }

    public function search(Request $request) {
        $brands = Brands::where('name', 'like', "%$request->text%")->get();

        $view = view('admin.brands.includes.table', compact('brands'));

        return response($view);
    }
}
