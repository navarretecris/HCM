<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Con metodo ORM
        $user = new User();
        $user->name = 'Cristian Navarrete';
        $user->document_type = 'CC';
        $user->document = '75108037';
        $user->id_card = '123456';
        $user->role = 'admin';
        $user->status = 'active';
        $user->email = 'cristianc.navarreter@autonoma.edu.co';
        $user->password = bcrypt('12345678');
        $user->save();
        
    }
}
