<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'modele_id',
        'size_id',
        'usine_id',
        'name_article',
        'price_article',
        'price_vent_article',
        'qte_article',
    ];
}
