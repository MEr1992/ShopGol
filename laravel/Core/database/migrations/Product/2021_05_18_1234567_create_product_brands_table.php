<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductBrandsTable extends Migration
{

    public function up()
    {
        Schema::create('product_brands', function (Blueprint $table) {
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->string('name_fa')->nullable()->comment("نام");
            $table->string('logo')->nullable()->comment("لوگو");
            $table->integer('count_product')->default(0)->comment("تعداد محصولات در لاین");
            $table->integer('status_id')->default(1)->comment("شناسه وضعیت فعال/غیر فعال");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_brands');
    }
}
