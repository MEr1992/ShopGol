<?php 

namespace Publics\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title_fa'=>'required',
        ];
    }
}
    