<div class="modal fade " id="modalForm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog" 
data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>

                    <div class="form-group">
                        
                             <!-- Add Jenis Kelamin  -->
                            <div class="my-1">
                                <label class="mb-2" for="jenis_kelamin">Jenis Kelamin</label>
                                <br>
                                <select name="jenis_kelamin" id="jenis_kelamin" value="{{ old('jenis_kelamin')}}" class="form-control">
                                    <option selected>pilih...</option>
                                    <option value="Laki-laki"> Laki-Laki</option>
                                    <option value="Perempuan"> Perempuan</option>
                                </select>
                            </div>
                        
                    </div>

                    <div class="form-group">
                        <label for="tlp">telepone</label>
                        <input type="numeric" class="form-control" name="tlp" id="tlp">
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>