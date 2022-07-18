<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasColumn('projects', 'project_type'))
        {
            Schema::table('projects', function (Blueprint $table)
            {
                $table->dropColumn('project_type');
            });
        }

        Schema::table('projects', function (Blueprint $table) {
            $table->string('project_type')->nullable()->after('project_remarks');
            $table->string('project_description')->nullable()->change();
            $table->string('project_logo_path')->nullable()->change();
            $table->string('project_remarks')->nullable()->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
