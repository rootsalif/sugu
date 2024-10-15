<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Functional extends Model
{
    use HasFactory;

    protected $fillable=[
        'label_functional',
        'describ_functional',
    ];

    public function rightAccesses():BelongsToMany
    {
        return $this->belongsToMany(RightAccess::class, 'permissions', 'functional_id', 'right_accesse_id');
    }

    public function scopeFunctions(Builder $builder): Builder
    {
        return $builder->where('created_at', 'desc');
    }

    public function admins():HasMany
    {
        return $this->hasMany(Admin::class);
    }
}
