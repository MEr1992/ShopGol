<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{

    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            
            $table->engine  = 'MyISAM';
            $table->charset = 'utf8';
            $table->collation = 'utf8_persian_ci';
            $table->id();
            $table->string('title_fa')->nullable()->comment("عنوان");
            $table->string('title_en')->nullable()->comment("عنوان");
            $table->integer('status_id')->default(1)->comment("شناسه وضعیت فعال/غیر فعال");
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
