<?php 

namespace Publics\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $item =  [
            'firstname'=>'required',
            'lastname'=>'required',
            'gender_id'=>'required',
            'photo'=>'required',
        ];
        if(request()->_method == "PUT")
        {
            $url = explode("/", request()->path());
            $id = $url[2];
            $item["mobile"] = "required|unique:users,mobile,".$id.",id,deleted_at,NULL";
            $item["email"] = "required|unique:users,email,".$id.",id,deleted_at,NULL";
        }
        else
        {
            $item["mobile"] = "required|unique:users,mobile,NULL,id,deleted_at,NULL";
            $item["email"] = "required|unique:users,email,NULL,id,deleted_at,NULL";
        }
        if(str_contains(request()->path(),"personnels"))
        {
            $item["role_id"] = "required";
        }
       
        return $item;
    }
}
    