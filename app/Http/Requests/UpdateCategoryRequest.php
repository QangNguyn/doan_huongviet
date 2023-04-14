<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\DifferentFrom;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
            'parent_id' => [
                'nullable',
                new DifferentFrom('id')
            ],
        ];
    }

    public function messages()
    {
        return [
            'required'=>'Không được bỏ trống'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'=>'Tên',
            'description'=>'Mô tả',
            'parent_id'=>'Danh mục cha'
        ];
    }
}
