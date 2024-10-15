<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RightAccess extends Model
{
    use HasFactory;

    protected $fillable=[
        'label_right_accesse',
    ];


    public function functional():BelongsToMany
    {
        return $this->belongsToMany(Functional::class, 'right_accesse_id', 'function_id');
    }
}
