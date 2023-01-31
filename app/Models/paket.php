<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $guarded = [];

    public function detail_transaksi()
    {
        return $this->belongsTo(Detail_transaksi::class);
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
