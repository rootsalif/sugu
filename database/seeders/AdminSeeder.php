<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Traits\ImageStatic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use ImageStatic;
    public function run(): void
    {            
        $path = $this->copyImage('/back/src/image/user/famanta.png', 'profil');

        Admin::create([
            'superadmin_id'=>1,
            'name_admin'=>'Aboubacar FAMANTA',
            'profession_admin'=>'Commerçant',
            'email'=>'famanta@gmail.com',
            'password'=>Hash::make('scorpion'),
            'phone_admin'=>'70343454',
            'address_admin'=>'Djicoroni',
            'path_admin'=>$path

        ]);

    }
}
