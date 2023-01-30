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
                            <label class="mb-2" for="outlet">Outlet</label>
                            <input type="text" name="outlet" id="outlet" value="{{ old('outlet')}}" class="form-control @error('outlet') is-invalid @enderror">
                            @error('outlet')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="my-1">
                            <label class="mb-2" for="jenis">Progres</label>
                            <input type="text" name="jenis" id="jenis" value="{{ old('jenis')}}" class="form-control @error('jenis') is-invalid @enderror">
                            @error('jenis')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <label class="mt-2" for="nama_paket">Jenis Paket</label>
                        <select type="text" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($paket as $paket)
                            <option value="{{$paket->id}}">{{$paket->nama}}</option>
                            @endforeach
                        @error('nama_paket')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </select>

                        <div class="my-1">
                            <label class="mb-2" for="harga">Harga</label>
                            <input type="text" name="harga" id="harga" value="{{ old('harga')}}" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
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