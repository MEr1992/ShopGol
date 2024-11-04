<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->string('name')->nullable()->comment("نام");
            $table->integer('category_id')->nullable()->comment("شناسه دسته بندی محصول");
            $table->integer('line_id')->nullable()->comment("شناسه لاین محصول");
            $table->integer('brand_id')->nullable()->comment("شناسه برند محصول");
            $table->string('image')->nullable()->comment("تصویر");
            $table->text('review')->nullable()->comment("نقد وبررسی");
            $table->text('usage')->nullable()->comment("نحوه استفاده و مصرف");
            $table->text('description')->nullable()->comment("توضیحات");
            $table->string('lang')->default("fa")->comment("زبان");
            $table->integer('status_id')->default(1)->comment("شناسه وضعیت فعال/غیر فعال");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
