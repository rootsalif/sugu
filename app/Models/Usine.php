<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usine extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'name_usine',
        'email_usine',
        'adresse_usine',
        // 'profession_usine',
    ];
}
