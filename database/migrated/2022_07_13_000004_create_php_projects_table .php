<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhp_ProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('my_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            $table->string('purpose');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
