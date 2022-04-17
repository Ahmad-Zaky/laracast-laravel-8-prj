<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostStoreRequest extends FormRequest
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
            'slug'          => 'required|unique:posts,slug',
            'excerpt'       => 'required',
            'thumbnail'     => 'required|image',
            'body'          => 'required',
            'category_id'   => 'required|exists:categories,id',
            'user_id'       => 'required|exists:users,id',
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

    public function validationData()
    {
        $this->merge([
            'user_id' => Auth::id(),
            'slug' => Str::slug($this->title),
        ]);

        return $this->all();
    }
}
