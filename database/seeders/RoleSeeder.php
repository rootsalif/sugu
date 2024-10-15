<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\ImageStatic;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use ImageStatic;
    public function run(): void
    {
        $roles=[
            'Enregistreur'=>[
                'personne qui consigne des informations, souvent utilisé pour enregistrer des données dans un système.', 
                'magasinier1.jpeg'],
            'Commandeur'=>[
                'Personne qui commande ou dirige, souvent dans un contexte militaire ou d’organisation. Cela peut aussi faire référence à un titre honorifique.', 
                'commande1.jpeg'],
            'Courssier'=>[
                'Personne chargée de transporter et de livrer des messages ou des paquets. Cela peut aussi désigner le service de livraison de ces messages.', 
                'courssier.jpeg'],
            'Dirigeant'=>[
                'Individu qui occupe une position de leadership au sein d\'une organisation, responsable de la prise de décisions et de la direction stratégique.', 
                'gerant.jpeg'],
            'Caissier'=>[
                'Personne qui s\'occupe des transactions financières dans un commerce, gérant les encaissements et les paiements.', 
                'caissier1.jpeg'],
            'Comptable'=>[
                'Professionnel chargé de la tenue des comptes d\'une entreprise, responsable de la gestion financière, de la préparation des états financiers et du respect des obligations fiscales.', 
                'comptable1.jpeg'],
            'Gestionnaire'=>[
                'Individu responsable de la planification, de l\'organisation et de la gestion des ressources d\'une entreprise ou d\'une organisation.', 
                'gestionnaire2.jpeg'],
            'Magasinier'=>[
                'Personne responsable de la gestion des stocks dans un magasin ou un entrepôt, s\'occupant de l\'approvisionnement, de l\'organisation et de la distribution des produits.', 
                'magasinier2.jpeg'],
            'Client'=>[
                'Individu ou entité qui achète des biens ou des services d\'une entreprise, souvent considéré comme essentiel pour la réussite commerciale.', 
                'caissier2.jpeg'],
        ];
        foreach($roles as $key=>$value){            
            $imagePath = '/back/src/image/user/' . $value[1];

            // Vérification de l'existence de l'image avant de la copier
            // if (!file_exists($imagePath)) {
            //     echo "L'image $imagePath n'existe pas.\n";
            //     continue;
            // }

            // Copier l'image et obtenir le nouveau chemin
            $path = $this->copyImage($imagePath, 'roles');

            Role::create([
            'superadmin_id'=>1,
            'admin_id'=>null,
            'label_role'=>$key,
            'describ_role'=>$value[0],
            'path_role'=>$path,
            ]);            
        }    

    }
}
