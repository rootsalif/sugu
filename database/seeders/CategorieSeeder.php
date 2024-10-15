<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\ImageStatic;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use ImageStatic;
    public function run(): void
    {
        //
        $data=[
            'homme'=>[
                'Les chaussures fait référence aux différents styles et types de chaussures spécifiquement conçus pour les hommes.',
                'homme1.png'],
            'Femme'=>[
                'Les chaussures fait référence aux différents styles et types de chaussures spécifiquement conçus pour les femmes.',
                'femme1.jpeg'],
            'Enfant'=>[
                'Les chaussures fait référence aux différents styles et types de chaussures spécifiquement conçus pour les enfants.',
                'enfant.jpeg'],
            'Bébé'=>[
                'Les chaussures fait référence aux différents styles et types de chaussures spécifiquement conçus pour les bébés.',
                'bebe.jpeg'],
            'Tout les catégories'=>[
                'Les chaussures fait référence aux différents styles et types de chaussures spécifiquement conçus pour plusieur categorie.',
                'famille.jpeg'],
        ];
        foreach($data as $key=>$value){

            $path = $this->copyImage('/back/src/image/categorie/'.$value[1], 'categories');

            Categorie::create([
                'familie_id'=>1,
                'label_categorie'=>$key,
                'describ_categorie'=>$value[0],
                'path_categorie'=>$path,
            ]);

        }

    }
}
