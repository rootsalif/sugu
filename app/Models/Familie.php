<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Familie extends Model
{
    use HasFactory;

    protected $fillable = [
        'superadmin_id',
        'label_family',
        'describ_family',
        'path_family',
    ];



    public function admins():BelongsToMany
    {
        return $this->belongsToMany(Admin::class)->withPivot('admin_id', 'familie_id');
    }

    public function urlImage(): string
    {
        return Storage::url($this->path_family);
    }

    public function categories():HasMany
    {
        return $this->hasMany(Categorie::class);
    }

    
}
