<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paket;
use App\Models\Transaksi;

class detailtransaksi extends Model
{
    use HasFactory;

    protected $table = 'detailtransaksi';
    protected $fillable = [
        'id_transaksi','id_paket','qty','keterangan'
    ];
    public function paket()
    {
        return  $this->belongsTo('App\Models\Paket', 'id_paket', 'id');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\Models\Transaksi', 'id_transaksi', 'id');
    }
}
