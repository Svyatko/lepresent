<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DesignerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('id');

        $rule = [
            'title_ru' => 'required|string|max:191',
            'main_banner_ru' => 'required|url|max:191',
            'additional_banner_ru' => 'sometimes|nullable|url|max:191',
            'title_en' => 'required|string|max:191',
            'main_banner_en' => 'required|url|max:191',
            'additional_banner_en' => 'sometimes|nullable|url|max:191',
        ];

        if($id) {
            $rule['banner_main'] = 'required|file|max:5125';
            $rule['banner_additional'] = 'sometimes|nullable|file|max:5125';
        }

        return $rule;
    }
}
