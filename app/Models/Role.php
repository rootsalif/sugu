<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'superadmin_id',
        'admin_id',
        'label_role',
        'describ_role',
        'path_role',
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('role_id', 'user_id');
    }

    public function urlImage(): string
    {
        return Storage::url($this->path_role);
    }
    public function userRole(){
        return $this->users->where('admin_id', Auth::guard('admin')->id);
    }
}
