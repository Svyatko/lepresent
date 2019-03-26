<?php

namespace App\Services;

class DesignerService
{
    function saveImg($request, $fieldname)
    {
        if ($request->hasFile($fieldname)) {
            $image = $request->file($fieldname);

            $filename = time() . '_' . $request->file($fieldname)->getClientOriginalName();
            $image->storeAs(
                '/uploads/designers', $filename
            );

            return $filename;
        }

    }
}