<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Requests\Admin\ContactRequest;
use App\Models\Setting;
use App\Services\SettingService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function contacts() {
        $contacts = Setting::where('key', 'contact')->get()->toArray();

        return view('admin.pages.contacts', compact('contacts'));
    }

    public function contactStore(ContactRequest $request, SettingService $service) {
        Setting::create(['key' => 'contact', 'value' => $service->saveJSON($request->only('address', 'lat', 'lng', 'phone'))]);
        $this->flashMessage($request, 'Контакт добавлено', 'success');

        return redirect()->back();
    }
}
