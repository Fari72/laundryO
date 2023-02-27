<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Detailttansaksi;

class transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_outlet','kode_invoice','id_member','tgl','batas_waktu','tgl_bayar','biaya_tambahan','diskon','status',
        'dibayar','id_user'
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
