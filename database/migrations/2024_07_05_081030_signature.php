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
        Schema::create('signature', function (Blueprint $table) {
            $table->id();
            $table->string('redmine_no');
            $table->string('group_head')->nullable();
            $table->string('impact')->nullable();
            $table->string('notes')->nullable();
            $table->text('signature')->nullable();
            $table->string('kode')->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('signature');

    }
};
