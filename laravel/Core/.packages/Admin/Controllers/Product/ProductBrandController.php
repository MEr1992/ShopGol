<?php

namespace Admin\Controllers\Product;

use Admin\Controllers\Public\BaseAbstract;

class ProductBrandController extends BaseAbstract
{
    protected $model = "Models\Product\Brand";
    protected $request = "Publics\Requests\Product\BrandRequest";
    protected $with = ["activeStatus"];
    // protected $showWith = ["activeStatus"];
    protected $searchFilter = ["name_fa","count_product"];
    protected $files = ["logo"];

    public function showInfo($id)
    {
        $data = [
            "item" => $this->model::with($this->with)->find($id),
            "registers" => Register::with("course","role")->where("user_id", $id)->orderBy("group", "desc")->get(),
        ];
        return response()->json($data);
    }
}