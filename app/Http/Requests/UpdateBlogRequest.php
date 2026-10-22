<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => ['required', 'string', Rule::in(Blog::ALLOWED_SLUGS), Rule::unique('blog', 'slug')->whereNull('deleted_at')->ignore($this->route('blog'))],
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'short_description' => 'nullable|string',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000',
            'description' => 'nullable|string',
        ];
    }
}