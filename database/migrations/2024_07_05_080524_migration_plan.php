<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('migration_plan', function (Blueprint $table) {
            $table->id();
            $table->string('redmine_no');
            $table->string('title');
            $table->string('changes_area');
            $table->string('scope_existing');
            $table->string('scope_changes');
            $table->string('testing_requirement');
            $table->string('uat_env_data');
            $table->string('data_testing');
            $table->string('setup_parameter');
            $table->string('changes_of_exsiting_structure_file');
            $table->string('changes_of_database');
            $table->string('recomended_action');
            $table->string('down_time');
            $table->string('request_by');
            $table->string('group_head');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('migration_plan');
    }
};
