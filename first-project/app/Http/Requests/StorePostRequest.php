<?php
//class has all the validations
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
           
            'title' => ['required', 'min:3',Rule::unique('posts')->ignore($this->id)],
            'description' => ['required', 'min:5'],
            'post_creator' => ['exists:users,id'],    
            'image'=> ['max:2048','mimes:png,jpg'],
             
        ];
    }
    public function messages(): array//to customize the msgs
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}