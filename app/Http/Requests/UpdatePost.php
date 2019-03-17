<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
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
            'title'             =>       'required:unique:posts',
            'post_body'         =>       'required',
            'featured'          =>       'sometimes|nullable|image',
            'other_images.*'    =>       'sometimes|nullable|image|min:1|max:3000',
            'category_id'       =>       'required|numeric',
            'user_id'           =>       'required|numeric',
            'tag_id'            =>       'sometimes|nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'title.required'                =>       'Title is Required',
            'post_body.required'            =>       'Body is Required',
            'title.unique'                  =>       'This Title has Selected before',
            'category_id.required'          =>       'Category is Required',
            'category_id.numeric'           =>       'Category Must has a Numeric Value',
            'user_id.required'              =>       'User is Required',
            'user_id.numeric'               =>       'User Must be a Numeric Value',
            'tag_id.required'               =>       'Post Tags are Required',
            'tag_id.numeric'                =>       'Tag Must have a Numeric Value',
        ];
    }
}
