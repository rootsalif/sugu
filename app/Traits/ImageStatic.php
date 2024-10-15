<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

trait ImageStatic
{
    public function copyImage($path_file, $directory)
    {
        // Vérifiez si le fichier existe
        if (File::exists(public_path($path_file))) {
            // Récupérer l'extension du fichier original
            $extension = File::extension($path_file);

            // Générer un nom de fichier unique avec l'extension d'origine
            $newFileName = uniqid() . '.' . $extension;
            $newFilePath = $directory . '/' . $newFileName;

            // Copier le fichier dans le répertoire spécifié
            Storage::disk('public')->put($newFilePath, File::get(public_path($path_file)));

            // Retourner le nouveau chemin du fichier
            return $newFilePath;
        } else {
            throw new \Exception("Le fichier $path_file, n'existe pas.");
        }
    }
}
