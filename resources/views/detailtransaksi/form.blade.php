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
                        <label class="mt-2" for="id_transaksi">Transaksi</label>
                        <select type="text" name="id_transaksi" id="id_transaksi" class="form-control @error('id_transaksi') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($transaksi as $transaksi)
                                <option value="{{$transaksi->id}}">{{$transaksi->nama}}</option>
                            @endforeach
                        @error('id_transaksi')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </select>

                        <label class="mt-2" for="id_paket">Paket</label>
                        <select type="text" name="id_paket" id="id_paket" class="form-control @error('id_paket') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($paket as $paket)
                                <option value="{{$paket->id}}">{{$paket->nama}}</option>
                            @endforeach
                        @error('id_paket')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </select>

                        <div class="my-1">
                            <label class="mb-2" for="qty">QTY</label>
                            <input type="string" name="qty" id="qty" value="{{ old('qty')}}" class="form-control @error('qty') is-invalid @enderror">
                            @error('qty')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="my-1">
                            <label class="mb-2" for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" value="{{ old('keterangan')}}" class="form-control @error('keterangan') is-invalid @enderror">
                            @error('keterangan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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