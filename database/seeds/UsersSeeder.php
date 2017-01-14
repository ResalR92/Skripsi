<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        // Membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // Membuat role operator
        $operatorRole = new Role();
        $operatorRole->name = "operator";
        $operatorRole->display_name = "Operator";
        $operatorRole->save();

        // Membuat role peserta
        $pesertaRole = new Role();
        $pesertaRole->name = "peserta";
        $pesertaRole->display_name = "Peserta";
        $pesertaRole->save();


        //membuat sample admin
        $admin = new User();
        $admin->name ='Administrator';
        $admin->email = 'admin@panjatek.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat sample operator
        $operator = new User();
        $operator->name ='Operator';
        $operator->email = 'operator@panjatek.com';
        $operator->password = bcrypt('rahasia');
        $operator->save(); 
        $operator->attachRole($operatorRole); 

        //membuat sample peserta
        $peserta = new User();
        $peserta->name ='Taylor';
        $peserta->email = 'taylor@mail.com';
        $peserta->password = bcrypt('rahasia');
        $peserta->save();
        $peserta->attachRole($pesertaRole);

        //membuat sample peserta
        $paulus = new User();
        $paulus->name ='Paulus';
        $paulus->email = 'paulus@mail.com';
        $paulus->password = bcrypt('rahasia');
        $paulus->save();
        $paulus->attachRole($pesertaRole);

        //membuat sample peserta
        $yakobus = new User();
        $yakobus->name ='Yakobus';
        $yakobus->email = 'yakobus@mail.com';
        $yakobus->password = bcrypt('rahasia');
        $yakobus->save();
        $yakobus->attachRole($pesertaRole);
    }
}
