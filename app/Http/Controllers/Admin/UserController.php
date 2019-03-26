<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(Request $request) {

        $users = ($request->type === 'all') ? User::all() : User::where('is_vip', 1)->get()->all();

        return view('admin.users.index', compact('users'));
    }
}
