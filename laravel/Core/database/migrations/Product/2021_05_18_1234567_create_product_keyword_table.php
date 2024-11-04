<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductKeywordTable extends Migration
{

    public function up()
    {
        Schema::create('product_keyword', function (Blueprint $table) {
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->integer('product_id')->nullable()->comment("شناسه محصول");
            $table->integer('keyword_id')->nullable()->comment("شناسه کلمه کلیدی");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_keyword');
    }
}
