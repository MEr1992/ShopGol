<?php

namespace Admin\Controllers\Product;

use Admin\Controllers\Public\BaseAbstract;

class ProductLineController extends BaseAbstract
{
    protected $model = "Models\Product\Line";
    protected $request = "Publics\Requests\Product\LineRequest";
    // protected $with = ["activeStatus"];
    // protected $showWith = ["activeStatus"];
    // protected $searchFilter = ["name"];
    // protected $files = ["image"];

    public function init()
    {
        $this->storeQuery = function ($query) {
            if (request()->_method != "PUT") {
                $query->password = bcrypt(request()->email);
            }
            $query->save();
        };

        $this->needles = [
            \Person\Role::class => fn($query) => $query->active(),
            \Base\Gender::class,
        ];
    }

    public function showInfo($id)
    {
        $data = [
            "item" => $this->model::with($this->with)->find($id),
            "registers" => Register::with("course","role")->where("user_id", $id)->orderBy("group", "desc")->get(),
        ];
        return response()->json($data);
    }
}