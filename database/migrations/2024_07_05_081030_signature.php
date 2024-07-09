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
            $table->string('group_head')->nullAble();
            $table->string('impact')->nullAble();
            $table->string('notes')->nullAble();
            $table->text('signature')->nullAble();
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
