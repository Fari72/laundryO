<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Outlet;

class paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'id_outlet','jenis','nama_paket','harga'
    ];
    
    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet', 'id_outlet', 'id');
    }
}
