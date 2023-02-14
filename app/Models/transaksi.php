<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = [];

    protected $fillable = [
        'user',
        'outlet',
        'paket',
        'member',
        'detailtransksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    public function detailtransaksi()
    {
        return $this->belongsTo(Detailtransaksi::class);
    }
}
