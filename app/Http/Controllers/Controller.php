<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function flashMessage($request, $message, $type) {
        $request->session()->flash('message', $message);
        $request->session()->flash('message-type', $type);
    }

    public function switchDesigner($id, Request $request) {
        if($request->ajax()) {
            $model = "App\Models\\$request->model";
            $entity = $model::find($id);

            $entity->update(['is_vip' => $request->type]);
        }
    }
}
