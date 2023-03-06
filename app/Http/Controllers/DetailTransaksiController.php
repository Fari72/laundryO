<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use App\Models\Paket;
use Illuminate\Http\Request;
use Validator;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailtransaksi = DetailTransaksi::all();
        $transaksi = Transaksi::all();
        $paket = Paket::all();
        return view('detailtransaksi.index', compact('detailtransaksi','transaksi','paket'));
    }

    public function data()
    {
        $detailtransaksi = DetailTransaksi::orderBy('id', 'desc')->get();

        return datatables()
            ->of($detailtransaksi)
            ->addIndexColumn()
            ->editColumn('id_transaksi', function($detailtransaksi){
                return !empty($detailtransaksi->transaksi->name) ? $detailtransaksi->transaksi->name : '-';
              })
            ->editColumn('id_paket', function($detailtransaksi){
            return !empty($detailtransaksi->paket->name) ? $detailtransaksi->paket->name : '-';
            })
            ->addColumn('aksi', function($detailtransaksi){
                return '
                <div class="btn-group">
                    <button onclick="editData(`' .route('detailtransaksi.update', $detailtransaksi->id). '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button onclick="deleteData(`' .route('detailtransaksi.destroy', $detailtransaksi->id). '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi','id_transaksi','id_paket'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detailtransaksi.form');
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
            'id_transaksi' => 'required',
            'id_paket' => 'required',
            'qty' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $detailtransaksi = DetailTransaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'id_paket' => $request->id_paket,
            'qty' => $request->qty,
            'keteragan' => $request->keteragan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $detailtransaksi
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detailtransaksi  $detailtransaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailtransaksi = DetailTransaksi::find($id);
        return response()->json($detailtransaksi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detailtransaksi  $detailtransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailtransaksi = DetailTransaksi::find($id);
        $transaksi = Transaksi::find($id);
        $paket = Paket::find($id);
        $detailtransaksi->id_transaksi = $request->id_transaksi;
        $detailtransaksi->id_paket = $request->id_paket;
        $detailtransaksi->qty = $request->qty;
        $detailtransaksi->keterangan = $request->keterangan;
        return view('detailtransaksi.form', compact('detailtransaksi','transaksi','paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detailtransaksi  $detailtransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detailtransaksi = DetailTransaksi::find($id);
        $detailtransaksi->id_transaksi = $request->id_transaksi;
        $detailtransaksi->id_paket = $request->id_paket;
        $detailtransaksi->qty = $request->qty;
        $detailtransaksi->keterangan = $request->keterangan;
        $detailtransaksi->update();
        
        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailtransaksi  $detailtransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailtransaksi = DetailTransaksi::find($id);
        $detailtransaksi->delete();
    }
}
