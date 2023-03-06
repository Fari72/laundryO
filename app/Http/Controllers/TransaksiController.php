<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\outlet;
use App\Models\member;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = date('m');
        $tahun = date('y');
        $maxid = transaksi::max('id')+1;

        $transaksi = Transaksi::all();
        $outlet = Outlet::all();
        $member = Member::all();
        $user = User::all();

        $kode_invoice = 'INV' . '/' . $maxid . '/'. $bulan . '/' . $tahun;

        return view('transaksi.index', compact('transaksi','outlet','member','user','kode_invoice'));
    }

    public function data()
    {
        $transaksi = Transaksi::orderBy('id', 'desc')->get();

        return datatables()
            ->of($transaksi)
            ->addIndexColumn()
            ->editColumn('id_outlet', function($transaksi){
                return !empty($transaksi->outlet->name) ? $transaksi->outlet->name : '-';
              })
            ->editColumn('id_member', function($transaksi){
                return !empty($transaksi->member->name) ? $transaksi->member->name : '-';
              })
            ->editColumn('user', function($transaksi){
                return !empty($transaksi->user->name) ? $transaksi->user->name : '-';
              })
            ->addColumn('aksi', function($transaksi){
                return '
                <div class="btn-group">
                    <button onclick="editData(`' .route('transaksi.update', $transaksi->id). '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button onclick="deleteData(`' .route('transaksi.destroy', $transaksi->id). '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi','id_member','id_transaksi'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_outlet' => 'required',
            'kode_invoice' => 'required',
            'id_member' => 'required',
            'tgl' => 'required',
            'batas_waktu' => 'required',
            'tgl_bayar' => 'required',
            'biaya_tambahan' => 'required',
            'diskon' => 'required|numeric',
            'status' => 'required',
            'dibayar' => 'required',
            'id_user' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $transaksi = Transaksi::create([
            'id_outlet' => $request->id_outlet,
            'kode_invoice' => $request->kode_invoice,
            'id_member' => $request->id_member,
            'tgl' => $request->tgl,
            'batas_waktu' => $request->batas_waktu,
            'tgl_bayar' => $request->tgl_bayar,
            'biaya_tambahan' => $request->biaya_tambahan,
            'diskon' => $request->diskon,
            'status' => $request->status,
            'dibayar' => $request->dibayar,
            'id_user' => $request->id_user,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $transaksi
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::find($id);
        return response()->json($transaksi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::find($id);
        $outlet = Outlet::find($id);
        $member = Member::find($id);
        $user = User::find($id);
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->kode_invoice = $request->kode_invoice;
        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->id_user = $request->id_user;
        return view('transaksi.form', compact('transaksi','outlet','member','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->id_outlet = $request->id_outlet;
        $transaksi->kode_invoice = $request->kode_invoice;
        $transaksi->id_member = $request->id_member;
        $transaksi->tgl = $request->tgl;
        $transaksi->batas_waktu = $request->batas_waktu;
        $transaksi->tgl_bayar = $request->tgl_bayar;
        $transaksi->biaya_tambahan = $request->biaya_tambahan;
        $transaksi->diskon = $request->diskon;
        $transaksi->status = $request->status;
        $transaksi->dibayar = $request->dibayar;
        $transaksi->id_user = $request->id_user;
        $transaksi->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect('transaksi');
    }
}
