<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MasterDataChangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $data = [
            'Front-end', 'Middleware', 'Backend', 'Android EDC ( GST )', 'IPG', 'Android EDC ( Inhouse )', 'Data Management', 'Infrastructure', 'Other'
        ];

        foreach ($data as $item) {
            DB::table('master_data_changes')->insert([
                'name' => $item,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
