<?php

namespace App\Http\Requests\tvshow;

use Illuminate\Foundation\Http\FormRequest;

class EpisodesRequest extends FormRequest
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
            'ep_num'=>'required',
            'ep_video'=>'required:file',
            'select_ep'=>'required',
            'select_season'=>'required',
        ];
    }
}
