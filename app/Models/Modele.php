<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $fillable = [
        'sub_categorie_id',
        'marque_id',
        'label_modele',
        'describ_modele',
        'path_modele',
    ];
}
