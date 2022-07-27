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

            if (Schema::hasColumn('test_cases', 'testsuite_id'))
            {
                 
            }else{
                $table->unsignedBigInteger('testsuite_id')->index()->nullable()->change();
            }

            if (Schema::hasColumn('test_cases', 'testcase_raw_details'))
            {
                 
            }else{
                $table->text('testcase_raw_details')->nullable();
            }

            if (Schema::hasColumn('test_cases', 'testcase_steps_gherkins')){
                 
            }else{
                $table->text('testcase_steps_gherkins')->nullable();
            }

            if (Schema::hasColumn('test_cases', 'testcase_steps_classic')){
                 
            }else{
                $table->text('testcase_steps_classic')->nullable();
            }

            if (Schema::hasColumn('test_cases', 'testcase_steps_classic')){
                 
            }else{
                $table->text('testcase_steps_classic')->nullable();
            }


            if (Schema::hasColumn('test_cases', 'switch_steps_raw')){
                 
            }else{
                $table->text('switch_steps_raw')->nullable()->after('testcase_steps');
            }
            
            $table->dropForeign('testsuite_id');
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
