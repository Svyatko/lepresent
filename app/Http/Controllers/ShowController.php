<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function catalog() {
        $products = Item::all();

        return view('catalog.index', compact('products'));
    }

    public function show($id) {
        $item = Item::find($id);

        return view('catalog.show', compact('item'));
    }
}
