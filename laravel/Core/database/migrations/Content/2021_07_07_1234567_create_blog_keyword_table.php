<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogKeywordTable extends Migration
{

    public function up()
    {
        Schema::create('blog_keyword', function (Blueprint $table) {
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->integer('blog_id')->nullable()->comment('شناسه مقاله');
            $table->integer('keyword_id')->nullable()->comment('شناسه کلمه کلیدی');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_keyword');
    }
}
