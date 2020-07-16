<?php

namespace App\Http\Requests;

use App\MeidaType\MeidaTypes;
use Illuminate\Foundation\Http\FormRequest;

class TweetMediaRequest extends FormRequest
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
                'media.*' => 'required|file|mimetypes:' . implode(',', MeidaTypes::all())
        ];
    }

    public function messages()
    {
        return [
            'media.*.required|mimes' => 'media is required!',
        ];
    }
}
//|mime:' . implode(',', MeidaTypes::all())
