<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatematerialRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required|max:1200',
            'category' => 'required',
            'material_type_id' => 'required',
            'pdf_link' => 'required|mimes:pdf|file|max:5512',
            'presentation_link' => 'mimes:pptx|file|max:5512',
            'published' => 'integer',
        ];
    }
}
