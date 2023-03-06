<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Validator;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all();
        $transaksi = Transaksi::all();
        return view('member.index', compact('member','transaksi'));
    }

    public function data()
    {
        $member = Member::orderBy('id', 'desc')->get();

        return datatables()
            ->of($member)
            ->addIndexColumn()
            ->addColumn('aksi', function($member){
                return '
                <div class="btn-group">
                    <button onclick="editData(`' .route('member.update', $member->id). '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button onclick="deleteData(`' .route('member.destroy', $member->id). '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
            'name' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',['laki-laki','perempuan'],
            'tlp' => 'required|numeric',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $member = Member::create([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $member
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return response()->json($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        $member->name = $request->name;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->tlp = $request->tlp;
        return view('member.form', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->name = $request->name;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->tlp = $request->tlp;
        $member->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect('member');
    }
}
