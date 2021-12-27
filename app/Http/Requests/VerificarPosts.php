<?php
// para gerar   php artisan make:request verificarPosts

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class verificarPosts extends FormRequest
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
        $id = $this->segment(2);  // pega o segmento 2 da uri passada
        $rules = [
          'title' => [
              'required',
              'min:3',
              'max:160',                        // para evitar erro duplicação na alteraçãp
              //'unique:posts,title,{$id},id', //  aplica apenas qdo $id diferente de id
              Rule::unique('posts')->ignore($id),
          ],
          'content' => ['required', 'min:3', 'max:1000'],
          'image' => ['required', 'image']
        ];

        if($this->method == "PUT"){
            $rules['image'] = ['nullable', 'image'];
        }
        return $rules;
    }
}
