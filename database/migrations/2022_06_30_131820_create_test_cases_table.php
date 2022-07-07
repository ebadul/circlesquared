<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->index();
            $table->string('project_code')->nullable();
            $table->string('testcase_name')->nullable();
            $table->text('testcase_precondition')->nullable();
            $table->text('expected_result')->nullable();
            $table->text('testcase_steps')->nullable();
            $table->text('testcase_steps_raw')->nullable();
            $table->text('testcase_steps_when')->nullable();
            $table->text('testcase_steps_then')->nullable();
            $table->text('testcase_steps_and')->nullable();
            $table->bigInteger('project_admin')->nullable();
            $table->string('testsuite_id')->nullable();
            $table->string('testcase_status')->nullable();
            $table->string('testcase_severity')->nullable();
            $table->string('testcase_type')->nullable();
            $table->string('testcase_automation')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('project_admin')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_cases');
    }
}
