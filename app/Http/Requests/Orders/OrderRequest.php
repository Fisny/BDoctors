<?php

namespace App\Http\Requests\Orders;

use App\Rules\ValidProduct;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'token'=> 'required',
            'amount'=> [
                'required',
                new ValidProduct() //valido l'id con la funzione ValidProduct
                

            ]
        ];
    }
}
