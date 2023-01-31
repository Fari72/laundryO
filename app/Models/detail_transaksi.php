<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $guarded = [];

    public function paket()
    {
        return  $this->belongsTo(Paket::class);
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
