<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;
class member extends Model
{
    use HasFactory;

    protected $table = 'member';
    
    protected $fillable = [
        'name','alamat','jenis_kelamin','tlp'
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
