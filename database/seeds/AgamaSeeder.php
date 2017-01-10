<?php

use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agama = [
        	['nama'=>'Kristen'],
        	['nama'=>'Katholik'],
        	['nama'=>'Islam'],
        	['nama'=>'Hindu'],
        	['nama'=>'Budha'],
        ];

        //Masukkan data ke database
        DB::table('agama')->insert($agama);
    }
}
