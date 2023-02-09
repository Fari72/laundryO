<div class="modal fade" id="modalForm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        {{-- Add Mapel --}}
                        <div class="my-1">
                            <label class="mb-2" for="id_transaksi">Transaksi</label>
                            <input type="text" name="id_transaksi" id="id_transaksi" value="{{ old('id_transaksi')}}" class="form-control @error('id_transaksi') is-invalid @enderror">
                            @error('id_transaksi')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="my-1">
                            <label class="mb-2" for="id_outlet">Outlet</label>
                            <input type="text" name="id_outlet" id="id_outlet" value="{{ old('id_outlet')}}" class="form-control @error('id_outlet') is-invalid @enderror">
                            @error('id_outlet')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="my-1">
                            <label class="mb-2" for="kode_invoice">Kode</label>
                            <input type="text" name="kode_invoice" id="kode_invoice" value="{{ old('kode_invoice')}}" class="form-control @error('kode_invoice') is-invalid @enderror">
                            @error('kode_invoice')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <label class="mt-2" for="id_member">Nama Member</label>
                        <select type="text" name="id_member" id="id_member" class="form-control @error('id_member') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($member as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        @error('id_member')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>

                        <div class="my-1">
                            <label class="mb-2" for="tgl">Tanggal</label>
                            <input type="date" name="tgl" id="tgl" value="{{ old('tgl')}}" class="form-control @error('tgl') is-invalid @enderror">
                            @error('tgl')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="my-1">
                            <label class="mb-2" for="batas_waktu">Batas Waktu</label>
                            <input type="date" name="batas_waktu" id="batas_waktu" value="{{ old('batas_waktu')}}" class="form-control @error('batas_waktu') is-invalid @enderror">
                            @error('batas_waktu')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="my-1">
                            <label class="mb-2" for="tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" id="tgl_bayar" value="{{ old('tgl_bayar')}}" class="form-control @error('tgl_bayar') is-invalid @enderror">
                            @error('tgl_bayar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="my-1">
                            <label class="mb-2" for="biaya_tambahan">Biaya Tambahan</label>
                            <input type="integer" name="biaya_tambahan" id="biaya_tambahan" value="{{ old('biaya_tambahan')}}" class="form-control @error('biaya_tambahan') is-invalid @enderror">
                            @error('biaya_tambahan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="my-1">
                        <label class="mb-2" for="diskon">Diskon</label>
                        <input type="integer" name="diskon" id="diskon" value="{{ old('diskon')}}" class="form-control @error('diskon') is-invalid @enderror">
                        @error('diskon')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-1">
                        <label class="mb-2" for="status">Status</label>
                        <input type="text" name="status" id="status" value="{{ old('status')}}" class="form-control @error('status') is-invalid @enderror">
                        @error('status')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="my-1">
                        <label class="mb-2" for="dibayar">Dibayar</label>
                        <input type="text" name="dibayar" id="dibayar" value="{{ old('dibayar')}}" class="form-control @error('dibayar') is-invalid @enderror">
                        @error('dibayar')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <label class="mt-2" for="id_user">Nama Pembeli</label>
                        <select type="integer" name="id_user" id="id_user" class="form-control @error('id_user') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($user as $user)
                            <option value="{{$user->id}}">{{$user->nama}}</option>
                            @endforeach
                        @error('id_user')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>
                </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>