<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(AgamaSeeder::class);
        $this->call(KontakSeeder::class);
        $this->call(PengumumanSeeder::class);
        $this->call(ProsedurSeeder::class);
        $this->call(JadwalSeeder::class);
    }
}
