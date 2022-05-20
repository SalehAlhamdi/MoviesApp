<?php

namespace App\Http\Requests\tvShow;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTvShowRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required|max:2000',
            'genres'=>'required',
            'types'=>'required',
            'season'=>'required',
        ];
    }
}
