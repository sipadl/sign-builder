<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDataGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'divisi' => 'IT Infras & Operation - Application Infrastructure',
                'tipe' => 1,
                'name' => 'Jaka Sembung',
                'kode' => 'jakasembung'
            ],
            [
                'divisi' => 'IT Infras & Operation - System Network',
                'tipe' => 1,
                'name' => 'Reza Prasetya',
                'kode' => 'rezaprasetya'
            ],
            [
                'divisi' => 'IT Infras & Operation - IT Monitoring & Services',
                'tipe' => 1,
                'name' => 'Ferry Sulistiyanto',
                'kode' => 'ferrysulistiyanto'
            ],
            [
                'divisi' => 'IT Infras & Operation - Data Center Operation & IT Facilities',
                'tipe' => 1,
                'name' => 'Dian Ramadhan',
                'kode' => 'dianramadhan'
            ],
            [
                'divisi' => 'IT Infras & Operation - IT Application Support',
                'tipe' => 1,
                'name' => 'Tangkas Prio Sembodo',
                'kode' => 'tangkaspriosembodo'
            ],
            [
                'divisi' => 'IT Information Security',
                'tipe' => 1,
                'name' => 'Caesar Wahyu Cahya A',
                'kode' => 'caesarwahyucahyaa'
            ],
            [
                'divisi' => 'IT Strategy & Architecture',
                'tipe' => 1,
                'name' => 'Nanang Ridwan',
                'kode' => 'nanangridwan'
            ],
            [
                'divisi' => 'IT Engineering - Front End',
                'tipe' => 1,
                'name' => 'Enrico Babeher',
                'kode' => 'enricobabeher'
            ],
            [
                'divisi' => 'IT Engineering - Middleware',
                'tipe' => 1,
                'name' => 'Cristopherus Ray`onaldo',
                'kode' => 'cristopherusrayonald'
            ],
            [
                'divisi' => 'IT Engineering - Back End',
                'tipe' => 1,
                'name' => 'Andew Tasidjawa',
                'kode' => 'andewtasidjawa'
            ],
            [
                'divisi' => 'IT Engineering - Improvement & Production Support',
                'tipe' => 1,
                'name' => 'Inti',
                'kode' => 'inti'
            ],
            [
                'divisi' => 'Enterprise Data Management & Digital Innovation',
                'tipe' => 1,
                'name' => 'Budi Arisandi',
                'kode' => 'budiarisandi'
            ],
            [
                'divisi' => 'IT Solution Engineering',
                'tipe' => 1,
                'name' => 'Debrian S A Wibowo',
                'kode' => 'debriansawibowo'
            ],
            [
                'divisi' => 'IT Governance, Risk, Compliance',
                'tipe' => 2,
                'name' => 'I Wayan Yuliarta',
                'kode' => 'iwayanyuliarta'
            ],
            [
                'divisi' => 'Risk Management',
                'tipe' => 2,
                'name' => 'Rahadian Elnas Pratama',
                'kode' => 'rahadianelnaspratama'
            ],
        ];
        DB::table('master_data_group_head')->insert($data);
    }
}
