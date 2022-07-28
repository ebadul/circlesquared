<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTestCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_test_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('testcase_id')->index()->nullable();
            $table->text('attachment_path')->nullable();
            $table->timestamps();
            $table->dropForeign('testcase_id');
            $table->foreign('testcase_id')->references('id')->on('test_cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images_test_cases');
    }
}
