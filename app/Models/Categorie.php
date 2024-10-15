<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'familie_id',
        'label_categorie',
        'describ_categorie',
        'path_categorie',
    ];


    public function urlImage(): string
    {
        return Storage::url($this->path_categorie);
    }

    public function findMode(string $id):string
    {
        
        return Familie::findOrFail($id)->label_family;
    }

    public function familie(): BelongsTo
    {
        return $this->belongsTo(Familie::class);
    }
    public function subCategories():HasMany
    {
        return $this->hasMany(subCategorie::class);
    }
}
