<?php

namespace App\Http\Requests\movie;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
            'movie_title' => 'required|max:100',
            'movie_description' => 'required|max:2000',
            'movie_rela'=>'required|max:5',
            'genres'=>'required',
            'types'=>'required',
            'image'=>'required:image',
            'movie'=>'required:video',
        ];
    }
}
