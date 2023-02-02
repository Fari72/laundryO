<?php

namespace App\Http\Controllers;

use App\Models\Detail_transaksi;
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
        $detail_transaksi = Detail_transaksi::all();
        $transaksi = Transaksi::all();
        $paket = Paket::all();
        return view('detail_transaksi.index', compact('transaksi','paket'));
    }

    public function data()
    {
        $detail_transaksi = Detail_transaksi::orderBy('id', 'desc')->get();

        return datatables()
            ->of($detail_transaksi)
            ->addIndexColumn()
            ->addColumn('aksi', function($detail_transaksi){
                return '
                <div class="btn-group">
                    <button onclick="editData(`' .route('detail_transaksi.update', $detail_transaksi->id). '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button onclick="deleteData(`' .route('detail_transaksi.destroy', $detail_transaksi->id). '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'qty' => 'required',
            'keterangan' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $detail_transaksi = Detail_transaksi::create([
            'id_transaksi' => $request->id_transaksi,
            'id_paket' => $request->id_paket,
            'qty' => $request->qty,
            'keteragan' => $request->keteragan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $detail_transaksi
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_transaksi = Detail_transaksi::find($id);
        return response()->json($detail_transaksi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail_transaksi = Detail_transaksi::find($id);
        return view('detail_transaksi.form', compact('detail_transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detail_transaksi = Detail_transaksi::find($id);
        $detail_transaksi->nama = $request->nama;
        $detail_transaksi->id_transaksi = $request->id_transaksi;
        $detail_transaksi->id_paket = $request->id_paket;
        $detail_transaksi->qty = $request->qty;
        $detail_transaksi->keterangan = $request->keterangan;
        $detail_transaksi->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detail_transaksi  $detail_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_transaksi = Detail_transaksi::find($id);
        $detail_transaksi->delete();

        return redirect('detail_transaksi');
    }
}
