<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
            "name" => "required|unique:books|max:200",
            "isbn" => "required|max:200",
            "authors" => "required|max:200",
            "country" => "required|max:200",
            "number_of_pages" => "required|integer|max:200",
            "publisher" => "required|max:200",
            "release_date" => "required|max:200"
        ];
    }
}
