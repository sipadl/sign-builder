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
        Schema::create('review_results', function (Blueprint $table) {
            $table->id();
            $table->string('redmine_no');
            $table->string('impact_application_infrastructure')->nullable();
            $table->string('notes_application_infrastructure')->nullable();
            $table->text('sign_by_jakasembung')->nullable();
            $table->string('notes_system_network')->nullable();
            $table->text('sign_by_rezaprasetya')->nullable();
            $table->string('notes_&_services')->nullable();
            $table->text('sign_by_ferrysulistiyanto')->nullable();
            $table->string('notes_it_facilities')->nullable();
            $table->text('sign_by_dianramadhan')->nullable();
            $table->string('notes_application_support')->nullable();
            $table->text('sign_by_tangkaspriosembodo')->nullable();
            $table->string('notes_information_security')->nullable();
            $table->text('sign_by_caesarwahyucahyaa')->nullable();
            $table->string('notes_&_architecture')->nullable();
            $table->text('sign_by_nanangridwan')->nullable();
            $table->string('notes_front_end')->nullable();
            $table->text('sign_by_enricobabeher')->nullable();
            $table->string('notes_-_middleware')->nullable();
            $table->text('sign_by_cristopherusrayonald')->nullable();
            $table->string('notes_back_end')->nullable();
            $table->text('sign_by_andewtasidjawa')->nullable();
            $table->string('notes_production_support')->nullable();
            $table->text('sign_by_inti')->nullable();
            $table->string('notes_digital_innovation')->nullable();
            $table->text('sign_by_budiarisandi')->nullable();
            $table->string('notes_solution_engineering')->nullable();
            $table->text('sign_by_debriansawibowo')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_results');
    }
};
