<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    protected $fillable=[
        'code_abonner',
        'date_debut',
        'date_fin',
        'admin_id',
        'superadmin',
    ];
}
