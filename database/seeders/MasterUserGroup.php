<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class MasterUserGroup extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_group' => 1,
                'name' => 'Jaka Sembung',
                'kode' => 'jakasembung',
                'email' => 'jakasembung@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Reza Prasetya',
                'kode' => 'rezaprasetya',
                'email' => 'rezaprasetya@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Ferry Sulistiyanto',
                'kode' => 'ferrysulistiyanto',
                'email' => 'ferrysulistiyanto@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Dian Ramadhan',
                'kode' => 'dianramadhan',
                'email' => 'dianramadhan@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Tangkas Prio Sembodo',
                'kode' => 'tangkaspriosembodo',
                'email' => 'tangkaspriosembodo@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Caesar Wahyu Cahya A',
                'kode' => 'caesarwahyucahyaa',
                'email' => 'caesarwahyucahyaa@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Nanang Ridwan',
                'kode' => 'nanangridwan',
                'email' => 'nanangridwan@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Enrico Babeher',
                'kode' => 'enricobabeher',
                'email' => 'enricobabeher@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Cristopherus Ray`onaldo',
                'kode' => 'cristopherusrayonald',
                'email' => 'cristopherusrayonald@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Andew Tasidjawa',
                'kode' => 'andewtasidjawa',
                'email' => 'andewtasidjawa@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Inti',
                'kode' => 'inti',
                'email' => 'inti@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Budi Arisandi',
                'kode' => 'budiarisandi',
                'email' => 'budiarisandi@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 1,
                'name' => 'Debrian S A Wibowo',
                'kode' => 'debriansawibowo',
                'email' => 'debriansawibowo@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 2,
                'name' => 'I Wayan Yuliarta',
                'kode' => 'iwayanyuliarta',
                'email' => 'iwayanyuliarta@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 2,
                'name' => 'Rahadian Elnas Pratama',
                'kode' => 'rahadianelnaspratama',
                'email' => 'rahadianelnaspratama@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 99,
                'name' => 'Administrator',
                'kode' => 'administrator',
                'email' => 'admin@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
            [
                'id_group' => 98,
                'name' => 'IT Incident',
                'kode' => 'incident',
                'email' => 'incident@tst.co.id',
                'password' => Hash::make('Mti123!@#')
            ],
        ];

        DB::table('users')->insert($data);

    }
}
