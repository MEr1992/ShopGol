<?php 

namespace Publics\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
    