<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogSubjectsTable extends Migration
{

    public function up()
    {
        Schema::create('blog_subjects', function (Blueprint $table) {
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->string('title_fa', 200)->nullable()->comment('عنوان');
            $table->string('image', 200)->nullable()->comment('تصویر');
            $table->integer('count_blog')->default(0)->comment("تعداد مقاله در موضوع");
            $table->integer('status_id')->default(1)->comment('شناسه وضعیت فعال/غیر فعال');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_subjects');
    }
}
