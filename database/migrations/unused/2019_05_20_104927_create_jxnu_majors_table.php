<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJxnuMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_jwc')->create('jxnu_majors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            // 添加字段
            $table->string('id', 20)->primary();
            $table->string('name', 191)->unique();
            $table->string('college_id', 20)->nullable(); // 获取不全 只能可空！
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
            $table->softDeletes();
            // 添加外键
            $table->foreign('college_id')->references('id')->on('jxnu_colleges')
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
        Schema::connection('mysql_jwc')->dropIfExists('jxnu_majors');
    }
}
