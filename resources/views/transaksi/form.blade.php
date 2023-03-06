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
                            <label class="mb-2" for="id_outlet">Outlet</label>
                            <select type="text" class="form-control" name="id_outlet" id="id_outlet" value="{{ old('id_outlet')}}" class="form-control @error('id_outlet') is-invalid @enderror">
                                <option selected>pilih...</option>
                                @foreach ($outlet as $outlet)
                                    <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                                @endforeach
                                @error('id_outlet')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>

                            <div class="my-1">
                                <label class="mb-2" for="kode_invoice">Kode</label>
                                <input type="text" class="form-control" name="kode_invoice" id="kode_invoice" value="{{ $kode_invoice }}" aria-label="Disabled input example" readonly>
                                @error('kode_invoice')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <label class="mt-2" for="id_member">Nama Member</label>
                            <select type="text" class="form-control" name="id_member" id="id_member" value="{{ old('id_member')}}" class="form-control @error('id_member') is-invalid @enderror">
                                <option selected>pilih...</option>
                                @foreach ($member as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                                @error('id_member')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </select>

                            <div class="my-1">
                                <label class="mb-2" for="tgl">Tanggal</label>
                                <input type="date" class="form-control" name="tgl" id="tgl">
                            </div>
                            
                            <div class="my-1">
                                <label class="mb-2" for="batas_waktu">Batas Waktu</label>
                                <input type="date" class="form-control" name="batas_waktu" id="batas_waktu">
                            </div>

                            <div class="my-1">
                                <label class="mb-2" for="tgl_bayar">Tanggal Bayar</label>
                                <input type="date" class="form-control" name="tgl_bayar" id="tgl_bayar">
                            </div>
                            
                            {{-- <div class="my-1">
                                <label class="mb-2" for="biaya_tambahan">Biaya Tambahan</label>
                                <input type="number" class="form-control" name="biaya_tambahan" id="biaya_tambahan" value="{{ old('biaya_tambahan')}}" class="form-control @error('biaya_tambahan') is-invalid @enderror">
                                @error('biaya_tambahan')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            {{-- <div class="my-1">
                                <label class="mb-2" for="diskon">Diskon</label>
                                <input type="number" class="form-control" name="diskon" id="diskon" value="{{ old('diskon')}}" class="form-control @error('diskon') is-invalid @enderror">
                                @error('diskon')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            <div class="my-1">
                                <label class="mb-2" for="status">Status</label>
                                <select type="enum" class="form-control" name="status" id="status" value="{{ old('status')}}" class="form-control @error('status') is-invalid @enderror">
                                <option selected>pilih...</option>
                                <option value="baru">baru</option>
                                <option value="proses">proses</option>
                                <option value="selesai">selesai</option>
                                <option value="diambil">diambil</option>
                                </select>
                                    @error('status')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="my-1">
                                <label class="mb-2" for="dibayar">Dibayar</label>
                                <select type="enum" class="form-control" name="dibayar" id="dibayar" value="{{ old('dibayar')}}" class="form-control @error('dibayar') is-invalid @enderror">
                                <option selected>pilih...</option>
                                <option value="dibayar">sudah bayar</option>
                                <option value="belum_dibayar">belum bayar</option>
                                </select>
                                    @error('dibayar')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label class="mt-2" for="id_user">Nama Pelanggan</label>
                                <select type="integer" class="form-control" name="id_user" id="id_user" class="form-control @error('id_user') is-invalid @enderror">
                                    <option selected>Pilih...</option>
                                    @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                @error('id_user')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </select>
                        </div>
                </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>