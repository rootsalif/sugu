<?php

namespace Database\Seeders;

use App\Models\Familie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\ImageStatic;

class FamilieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use ImageStatic;
    public function run(): void
    {
        //
        $path = $this->copyImage('/back/src/image/produit/IMG-20240721-WA0022.jpg', 'families');

        Familie::create([
            'superadmin_id'=>1,
            'label_family'=>'Chaussures',
            'describ_family'=>'La famille des chaussures fait référence aux différents types et styles de chaussures qui partagent des caractéristiques similaires ou qui sont conçus pour des usages spécifiques.',
            'path_family'=>$path,
        ]);

    }
}
