<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Make sure to include this use statement
// use DB

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_data_changes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        $data = [
            'Front-end', 'Middleware', 'Backend', 'Android EDC ( GST )', 'IPG', 'Android EDC ( Inhouse )', 'Data Management', 'Infrastructure', 'Other'
        ];

        for ($i = 0; $i < count($data); $i++) {
            DB::table('master_data_changes')->insert(['name' => $data[$i]]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_data_changes');
    }
};
