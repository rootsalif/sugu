<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable=[
        'admin_id',
        'name_enterprise',
        'logo_enterprise',
        'font_path_enterprise',
        'phone_enterprise',
        'address_enterprise',
        'describ_enterprise',
        'num_Id_enterprise',
        'argument_enterprise',
        'email_enterprise',
        'created_enterprise',
        'status_enterprise',
    ];


    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function urlImageLogo(): string
    {
        return Storage::url($this->logo_enterprise);
    }
    public function urlImageFont(): string
    {
        return Storage::url($this->font_path_enterprise);
    }
}
