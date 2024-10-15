<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantitie extends Model
{
    use HasFactory;
    protected $fillable = [

        'price_article',
        'price_vent_article',
        'qte_article',
    ];
}
