<?php 

namespace Publics\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_fa'=>'required',
            'logo'=>'required',
        ];
    }
}
    