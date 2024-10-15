<?php


namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard='admin';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'superadmin_id',
        'family_id',
        'name_admin',
        'profession_admin',
        'email',
        'password',
        'email_verified_at',
        'phone_admin',
        'address_admin',
        'path_admin',
        'status_admin',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // les scopes builder

    public function scopeRecente(Builder $builder):Builder
    {
       return $builder->where('created_at', 'desc');
    }

    public function subscribes(): HasMany
    {
        return $this->hasMany(Subscribe::class);
    }

    public function function(): BelongsTo
    {
        return $this->belongsTo(Functional::class);
    }

    public function enterprise(): HasOne
    {
        return $this->hasOne(Enterprise::class);
    }
    public function family(): HasOne
    {
        return $this->hasOne(Familie::class);
    }

    public function urlImage(): string
    {
        return Storage::url($this->path_admin);
    }

    public function families():BelongsToMany
    {
        return $this->belongsToMany(Familie::class)->withPivot('admin_id', 'familie_id');
    }
}
