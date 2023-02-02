<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index(){

        $user = User::all();
        $paket = Paket::all();
        $member = Member::all();
        $outlet = Outlet::all();
        $transaksi = Transaksi::all();
        return view('dashboard', compact('user','paket','member','outlet',('transaksi')));
    }
}
