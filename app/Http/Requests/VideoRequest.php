<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            // 'thumbnail_path' => 'nullable|string',
            // 'vimeo_video_id' => 'nullable|string',
            // 'teacher_id' => 'nullable|integer',
        ];
    }

    public function messages(){
        return [
            // 
        ];
    }

    public function attribute(){
        return [
            // 
        ];
    }
}
