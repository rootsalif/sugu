<?php

namespace Database\Seeders;

use App\Models\subCategorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\ImageStatic;

class subCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use ImageStatic;
    public function run(): void
    {
        //
        $data=[
            'Sandales de sport'=>[
                'Les chaussures fait référence aux différents styles de sport.',
                'sport.jpeg',
                1,
            ],
            'Sandales en cuir'=>[
                'Les chaussures fait référence aux différents styles de cuir.',
                'cuir.jpeg',
                1
            ],
            'Tongs classique'=>[
                'Les chaussures fait référence aux différents styles de tong.',
                'tong2.jpeg',
                1,
            ],

            'Autres'=>[
                'Les chaussures fait référence à d\'autres styles.',
                'autres.jpeg',
                1,
            ],
            // Femme
            'Sandales gladiateur'=>[
                'Les chaussures fait référence aux différents styles de glagiateur.',
                'glagiateur3.jpeg',
                2,
            ],
            'Mules'=>[
                'Les chaussures fait référence aux différents styles de mule.',
                'mule1.jpeg',
                2
            ],
            'Sabot'=>[
                'Les chaussures fait référence aux différents styles de sabot.',
                'sabot2.jpeg',
                2,
            ],
            'Autres'=>[
                'Les chaussures fait référence à d\'autres styles.',
                'autres.jpeg',
                2,
            ],
            // Enfant
            'Sandales de enfant'=>[
                'Les chaussures fait référence aux différents styles d\'enfant.',
                'sandaleEnfant.jpeg',
                3,
            ],
            'Sabot'=>[
                'Les chaussures fait référence aux différents styles de sabot.',
                'sabo1.jpeg',
                3
            ],
            'Autres'=>[
                'Les chaussures fait référence à d\'autres styles.',
                'autres.jpeg',
                3,
            ],
            // Bebe
            'Sandales bebe'=>[
                'Les chaussures fait référence aux différents styles de bebe.',
                'Bebe.jpeg',
                4,
            ],
            'Autres'=>[
                'Les chaussures fait référence à d\'autres styles.',
                'autres.jpeg',
                4,
            ],

        ];
        foreach($data as $key=>$value){

            $path = $this->copyImage('/back/src/image/sous-categorie/'.$value[1], 'sub-categories');

            subCategorie::create([
                'categorie_id'=>$value[2],
                'label_sub_categorie'=>$key,
                'describ_sub_categorie'=>$value[0],
                'path_sub_categorie'=>$path,
            ]);

        }

    }
}
