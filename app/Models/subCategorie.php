<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class subCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'label_sub_categorie',
        'describ_sub_categorie',
        'path_sub_categorie',
    ];


    public function urlImage(): string
    {
        return Storage::url($this->path_sub_categorie);
    }

    public function findMode(string $id):string
    {
        
        return Categorie::findOrFail($id)->label_categorie;
    }


    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }
}
