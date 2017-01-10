<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
        	['name'=>'Administrator','email'=>'admin@panjatek.com','password'=>bcrypt('rahasia'),'level'=>'admin'],
        	['name'=>'Operator','email'=>'operator@panjatek.com','password'=>bcrypt('rahasia'),'level'=>'operator'],
        	['name'=>'Taylor Otwell','email'=>'taylor@gmail.com','password'=>bcrypt('rahasia')],
        ];

        //membuat sample admin
        $admin = new User();
        $admin->name ='Administrator';
        $admin->email = 'admin@panjatek.com';
        $admin->password = bcrypt('rahasia');
        $admin->level = 'admin';
        $admin->save();

        //membuat sample operator
        $operator = new User();
        $operator->name ='Operator';
        $operator->email = 'operator@panjatek.com';
        $operator->password = bcrypt('rahasia');
        $operator->level = 'operator';
        $operator->save();  

        //membuat sample peserta
        $peserta = new User();
        $peserta->name ='Taylor';
        $peserta->email = 'taylor@mail.com';
        $peserta->password = bcrypt('rahasia');
        $peserta->save();
    }
}
