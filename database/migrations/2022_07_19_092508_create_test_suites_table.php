<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestSuitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('test_suites', function (Blueprint $table) {
            $table->id();
            $table->string("testsuite_name");
            $table->text("testsuite_description")->nullable();
            $table->bigInteger("project_id")->nullable();
            $table->bigInteger("parent_testsuite_id")->nullable();
            $table->text("testsuite_precondition")->nullable();
            $table->string("project_admin");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_suites');
    }
}
