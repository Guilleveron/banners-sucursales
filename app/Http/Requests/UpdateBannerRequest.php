<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateBannerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required', 'string',
            ],
            'image' => [
                'mimes:jpeg,png,svg,gif,webp,mpg,mp4',
            ],
            'order' => [
                'required', 'numeric', 'integer', 'max:1000',
            ],
            'status' => [
                'required', 'boolean',
            ],
            'categories.*'  => [
                'integer',
            ],
            'categories'    => [
                'required',
                'array',
            ],
            'timeRefresh' => [
                'required', 'numeric', 'integer', 'min:1', 'max:100000',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('banner_access');
    }
}
