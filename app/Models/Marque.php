<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $fillable = [

        'label_marque',
        'describ_marque',
        'path_marque',
    ];
}
