<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;
use App\Models\Detail_transaksi;

class DashboardController extends Controller
{
    public function index(){

        $user = User::all();
        $paket = Paket::all();
        $member = Member::all();
        $outlet = Outlet::all();
        $transaksi = Transaksi::all();
        $detail_transaksi = Detail_transaksi::all();
        return view('dashboard', compact('user','paket','member','outlet','detail_transaksi',('transaksi')));
    }
}
