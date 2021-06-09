<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreUpdate extends FormRequest
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
        $id = $this->segment(3);

        return [
            'name' => ['required', 'string', 'min:3', 'max:255', "unique:books,name,{$id},id"],
            'author' => ['required', 'string', 'min:3', 'max:255'],
            'date' => ['required', 'date'],
            'user_id' => ['exists:user,id']
        ];
    }
}
