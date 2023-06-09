<?php

namespace App\Http\Requests\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:post_categories,id',
            'is_published' => 'nullable|integer',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
        ];
    }
}
