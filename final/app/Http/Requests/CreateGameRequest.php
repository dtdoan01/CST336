<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGameRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'publisher' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'platforms' => 'required|array',
            'platforms.*' => 'required|exists:platforms,id',
            'price' => 'numeric|min:0',
            'score' => 'numeric|min:0',
            'votes' => 'numeric',
            'image_url' => 'required|url',
            'description' => 'string|nullable',
        ];
    }
}
