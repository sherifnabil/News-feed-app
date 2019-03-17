<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'featured'          =>       'required|image',
            'other_images.*'    =>       'required|image|min:1|max:3500',
            'category_id'       =>       'required|numeric',
            'user_id'           =>       'required|numeric',
            'tag_id'            =>       'required|array',
        ];
    }
    public function messages()
    {
        return [
            'title.required'                =>       'Title is Required',
            'title.unique'                  =>       'This Title has Selected before',
            'post_body.required'            =>       'Post Body is Required',
            'featured.required'             =>       'Main Image is Required',
            'featured.image'                =>       'Main Image Must be an Image',
            'other_images.*.required'       =>       'Other Images are Required',
            'other_images.*.image'          =>       'Other Images Must be of Type Image',
            'other_images.*.min:1'          =>       'Other Images Needs at least an Image',
            'other_images.*.max:3500'       =>       'Other Images Must not exceed 3500kb',
            'category_id.required'          =>       'Post Category is Required',
            'category_id.numeric'           =>       'Post Category Must be a Numeric Value',
            'user_id.required'              =>       'Post User is Required',
            'user_id.numeric'               =>       'Post User Must be a Numeric Value',
            'tag_id.required'               =>       'Post Tags are Required',
            'tag_id.numeric'                =>       'Post Tag Must be a Numeric Value',
        ];
    }
}
