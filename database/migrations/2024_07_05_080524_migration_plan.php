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
        Schema::create('impact_analisis', function (Blueprint $table) {
            $table->id();
            $table->string('redmine_no')->nullAble();
            $table->string('title')->nullAble();
            $table->string('changes_area')->nullAble();
            $table->string('scope_existing')->nullAble();
            $table->string('scope_changes')->nullAble();
            $table->string('testing_requirement')->nullAble();
            $table->string('uat_env_data')->nullAble();
            $table->string('data_testing')->nullAble();
            $table->string('setup_parameter')->nullAble();
            $table->string('changes_of_exsiting_structure_file')->nullAble();
            $table->string('changes_of_database')->nullAble();
            $table->string('recomended_action')->nullAble();
            $table->string('down_time')->nullAble();
            $table->string('down_time_message')->nullAble();
            $table->text('request_by')->nullAble();
            $table->string('group_head')->nullAble();
            $table->string('project_manager')->nullAble();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impact_analisis');
    }
};
