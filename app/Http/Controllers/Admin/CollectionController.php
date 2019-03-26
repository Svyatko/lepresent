<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CollectionRequest;
use App\Models\Collection;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::get();

        return view('admin.collections.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.collections.create');
    }

    public function store(CollectionRequest $request)
    {
        $filename = Collection::storeImg($request->file('image'));

        $collection = Collection::create(['title' => $request->title_ru, 'image' => $filename]);

        $collection->fill([
            'ru' => [
                'title' => $request->title_ru,
            ],
            'en' => [
                'title' => $request->title_en
            ],
        ]);
        $collection->save();


        $this->flashMessage($request, 'Колекцию добавлено', 'warning');

        return redirect()->route('admin.collections.index');
    }
}
