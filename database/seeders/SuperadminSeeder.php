<?php

namespace Database\Seeders;

use App\Models\Superadmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Superadmin::create([
            'name_super'=>'Salif',
            'email'=>'sugu@sugu.com',
            'password'=>Hash::make('scorpion'),
            'phone_super'=>'Salif',
            'address_super'=>'Salif',
        ]);
    }
}
