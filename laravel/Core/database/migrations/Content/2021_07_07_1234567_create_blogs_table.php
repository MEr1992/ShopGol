<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->string('title', 200)->nullable()->comment('عنوان');
            $table->integer('subject_id')->nullable()->comment('شناسه موضوع مقاله');
            $table->string('image', 200)->nullable()->comment('تصویر');
            $table->text('summary')->nullable()->comment('خلاصه');
            $table->text('text')->nullable()->comment('متن');
            $table->integer('count_view')->default(0)->comment('تعداد بازدید');
            $table->string('lang', 2)->default('fa')->comment('زبان');
            $table->integer('status_id')->default(1)->comment('شناسه وضعیت فعال/غیر فعال');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
