<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeLeakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 代码泄露表
        Schema::create('code_leak', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('status')->unsigned()->comment('0:Pending 1:False 2:Abnormal 3:Solved');
            $table->char('sha', 40)->unique()->comment('GitHub Blob Hash');
            $table->string('repo_owner', 100)->comment('GitHub Repository Owner');
            $table->string('repo_name', 255)->comment('GitHub Repository Name');
            $table->string('path', 1000)->comment('GitHub File Path');
            $table->string('repo_description', 255)->comment('GitHub Repo Description');
            $table->string('keyword', 255)->comment('Matched Keyword');
            $table->string('handle_user', 255);
            $table->string('description', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_leak');
    }
}
