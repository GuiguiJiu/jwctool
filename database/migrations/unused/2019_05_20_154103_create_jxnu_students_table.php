<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJxnuStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_jwc')->create('jxnu_students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            // 添加字段
            $table->string('id', 20)->primary();
            $table->string('name', 191);
            $table->char('gender', 2);
            $table->string('id_card', 18)->nullable();
            $table->string('tel', 128)->nullable();
            $table->date('birthday')->nullable();
            $table->string('email', 128)->nullable();
            $table->string('college_id', 20);
            $table->string('class_id', 20);
            $table->tinyInteger('active')->default(0);
            $table->timestamps();
            $table->softDeletes();
            // 添加外键
            $table->foreign('college_id')->references('id')->on('jxnu_colleges')
                ->onDelete('no action')->onUpdate('cascade');
            $table->foreign('class_id')->references('id')->on('jxnu_classes')
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
        Schema::connection('mysql_jwc')->dropIfExists('jxnu_students');
    }
}
