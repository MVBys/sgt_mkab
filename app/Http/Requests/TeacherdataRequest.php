<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherdataRequest extends FormRequest
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
        return [
            'surname' => 'max:255',
            'name' => 'max:255',
            'patronymic' => 'max:255',
            'experience' => 'max:255',
            'qualification_category_id' => 'integer',
            'teaching_title_id' => 'integer',
            'teacher_photo' => 'mimes:jpg,png|file|max:5512',
            'portfolio_presentation' => 'mimes:pptx|file|max:5512',

        ];
    }
}
