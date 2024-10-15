<?php

namespace Database\Seeders;

use App\Models\Enterprise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageStatic;


class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use ImageStatic;

    public function run(): void
    {
        $path = $this->copyImage('/back/src/image/user/famanta.png', 'enterprise');

        $pathFont = $this->copyImage('/back/src/image/produit/IMG-20240713-WA0004.jpg', 'enterprise');

        Enterprise::create([
            'admin_id'=>1,
            'name_enterprise'=>'Entreprise Famanta & Fils',
            'logo_enterprise'=>$path,
            'font_path_enterprise'=>$pathFont,
            'phone_enterprise'=>'78999565',
            'address_enterprise'=> 'Grand Marcher',
            'describ_enterprise'=> ' Nous somme un entreprise de commerce chaussure de tout les
            marques et modeles disponible au marcher. Afin de satisfaire nos clients et augmenter
            notre clientel pour le bien de tous',
            'num_Id_enterprise'=>'1212332ZESFZER21',
            'argument_enterprise'=>'Notre objectif c\'est nos client d\'abort, leurs satifractions et leurs confiences',
            'email_enterprise'=>'famanta@traffic.com',
            'created_enterprise'=>date('2024-08-03'),
        ]);
    }
}
