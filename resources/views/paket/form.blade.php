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
                        </div>

                        <div class="my-1">
                            <label class="mb-2" for="jenis">Jenis</label>
                            <select type="enum" class="form-control" name="jenis" id="jenis" value="{{ old('jenis')}}" class="form-control @error('jenis') is-invalid @enderror">
                                <option selected>Pilih...</option>
                                <option value="kiloan">kiloan</option>
                                <option value="selimut">selimut</option>
                                <option value="bed_cover">bed cover</option>
                                <option value="kaos">kaos</option>
                                <option value="lain">lain</option>
                            </select>
                                @error('jenis')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label class="mt-2" for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control" name="nama_paket" id="nama_paket" class="form-control @error('nama_paket') is-invalid @enderror">
                        @error('nama_paket')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="my-1">
                            <label class="mb-2" for="harga">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga')}}" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>