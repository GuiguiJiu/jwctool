<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJxnuClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_jwc')->create('jxnu_classes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            // 添加字段
            $table->string('id', 20)->primary();
            $table->string('name', 191)->unique();
            $table->tinyInteger('is_normal')->default(0); // 是否是公费师范生班级
            $table->string('major_id', 20);
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
            $table->softDeletes();
            // 添加外键
            $table->foreign('major_id')->references('id')->on('jxnu_majors')
                ->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_jwc')->dropIfExists('jxnu_classes');
    }
}
