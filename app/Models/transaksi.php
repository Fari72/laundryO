<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Member;

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
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    public function outlet()
    {
        return $this->belongsTo('App\Models\Outlet', 'id_outlet', 'id');
    }
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'id_member', 'id');
    }
}
