<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index() {
        $colors = Color::get();

        return view('admin.settings.colors.index', compact('colors'));
    }

    public function create() {
        return view('admin.settings.colors.create');
    }

    public function store(ColorRequest $request) {
        Color::create($request->except('_token'));

        $this->flashMessage($request, 'Цвет успешно создан', 'success');

        return redirect()->back();
    }

    public function edit(Color $color) {
        return view('admin.settings.colors.edit', compact('color'));
    }

    public function update(Color $color, ColorRequest $request) {
        $color->update($request->except('_token'));

        $this->flashMessage($request, 'Цвет успешно обновлен', 'success');

        return redirect()->back();
    }

    public function destroy(Color $color, Request $request) {
        $color->delete();

        $this->flashMessage($request, 'Цвет успешно удален', 'warning');

        return redirect()->back();
    }
}
