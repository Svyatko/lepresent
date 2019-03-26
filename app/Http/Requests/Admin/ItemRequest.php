<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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

        $item = $this->route()->parameter('item');

        $rule = [
            'category_id' => 'required|integer',
            'style_id' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'sex_id' => 'required',
            'colors' => 'required|array|min:1',
            'colors.*' => 'required|integer',

            'title_ru' => 'required|string|max:191',
            'text_ru' => 'required',
            'character_ru' => 'required',

            'title_en' => 'required|string|max:191',
            'text_en' => 'required',
            'character_en' => 'required',
        ];

        if(!$item) {
            $rule['files'] = 'required|array|min:1';
            $rule['files.*'] = 'required|file';
        }

        return $rule;
    }
}
