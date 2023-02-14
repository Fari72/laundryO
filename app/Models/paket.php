<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $guarded = [];

    protected $fillable = [
        'outlet',
    ];
    
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
