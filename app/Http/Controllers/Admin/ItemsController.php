<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ItemRequest;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Color;
use App\Models\Designer;
use App\Models\Image;
use App\Models\Translations\Item as Translation;
use App\Models\Item;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemsController extends Controller
{
    public function index() {
        $items = Translation::where('locale', 'ru')->get();

        return view('admin.items.index', compact('items'));
    }

    public function create() {
        $brands = Brands::get()->all();
        $designers = Designer::get()->all();
        $designers_brands = array_merge($brands, $designers);
        $sizes = Size::orderBy('size')->get();
        $categories = Category::get();
        $colors = Color::get();

        return view('admin.items.create', compact('sizes', 'designers_brands', 'categories', 'colors'));
    }

    public function store(ItemRequest $request) {
        Item::create($request->except('_token'));

        $this->flashMessage($request, 'Продукт добавлено', 'success');

        return redirect()->route('admin.items.index');
    }

    public function edit(Item $item) {
        $brands = Brands::get()->all();
        $designers = Designer::get()->all();
        $designers_brands = array_merge($brands, $designers);
        $sizes = Size::orderBy('size')->get();
        $categories = Category::get();
        $colors = Color::get();

        return view('admin.items.edit', compact('item', 'designers_brands', 'sizes', 'categories', 'colors'));
    }

    public function update(ItemRequest $request, Item $item) {
        $item->update($request->except('_token'));

        $this->flashMessage($request, 'Продукт обновлено', 'success');

        return redirect()->route('admin.items.index');
    }

    public function destroy(Item $item, Request $request) {
        $message = "Продукт $item->name удалено";
        $this->flashMessage($request, $message, 'warning');

        $item->delete();

        return redirect()->route('admin.items.index');
    }

    public function imageDestroy(Request $request, $id) {
        if($request->ajax()) {

            Image::findOrFail($id)->delete();

            return response()->json(['status' => true]);
        }
    }

    public function search(Request $request) {
        $items = Translation::where('name', 'like', "%$request->text%")->where('locale', 'ru')->get();

        $view = view('admin.items.includes.table', compact('items'));

        return response($view);
    }
}
