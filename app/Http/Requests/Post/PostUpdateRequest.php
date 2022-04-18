<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostUpdateRequest extends FormRequest
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
            'title'         => 'required',
            'slug'          => 'required|unique:posts,slug,'. $this->post->id,
            'excerpt'       => 'required',
            'thumbnail'     => 'image',
            'body'          => 'required',
            'category_id'   => 'required|exists:categories,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'slug.unique' => 'Title already exists',
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    public function validationData()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);

        return $this->all();
    }
}
