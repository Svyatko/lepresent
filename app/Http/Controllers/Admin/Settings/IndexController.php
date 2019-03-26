<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function destroy($id, Request $request) {
        Setting::findOrFail($id)->delete();

        $this->flashMessage($request, 'Контакт удалено', 'warning');

        return redirect()->back();
    }
}
