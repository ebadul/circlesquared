<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTestCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_cases', function (Blueprint $table) {

            $table->unsignedBigInteger('testsuite_id')->index()->nullable()->change();
            $table->text('testcase_raw_details')->nullable();
            $table->text('testcase_steps_gherkins')->nullable();
            $table->text('testcase_steps_classic')->nullable();
            
            $table->foreign('testsuite_id')->references('id')->on('test_suites')->onDelete('cascade');
            
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
