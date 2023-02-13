@extends('layouts.app')

@section('title')
    Paket
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Paket</h1>
    </div>

    <div class="section-body">
        <div class="row">

            {{-- Data Paket --}}
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    {{-- Judul --}}
                    <div class="card-header">
                        <div class="col-12 col-md-10 col-lg-10">
                            <h4>Data Paket</h4>
                        </div>
                        <div class="col-12 col-md-2 col-lg-2">
                            <button type="button" onclick="addForm('{{ route('paket.store') }}')" class="btn btn-primary shadow-sm rounded-pill">
                                    <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>

                    {{-- Tabel --}}
                    <div class="card-body" style="width: 100%;">
                        <table class="table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <td scope="col" style="width: 50px;">No</td>
                                    <td scope="col">Outlet</td>
                                    <td scope="col">Jenis</td>
                                    <td scope="col">Nama Paket</td>
                                    <td scope="col">Harga</td>
                                    <td scope="col" style="width: 84px;">Aksi</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@include('paket.form')

@endsection

@push('script')
    <script>
        // Data Tables
        let table;

        $(function() {
            table = $('.table').DataTable({
                proccesing: true,
                autowidth: false,
                ajax: {
                    url: '{{ route('paket.data') }}'
                },
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'id_outlet'},
                    {data: 'jenis'},
                    {data: 'nama_paket'},
                    {data: 'harga'},
                    {data: 'aksi'}
                ]
            });
        })

        $('#modalForm').on('submit', function(e){
            if(! e.preventDefault()){
                $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
                .done((response) => {
                    $('#modalForm').modal('hide');
                    table.ajax.reload();
                    iziToast.success({
                        title: 'Sukses',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    })
                })
                .fail((errors) => {
                    iziToast.error({
                        title: 'Gagal',
                        message: 'Data gagal disimpan',
                        position: 'topRight'
                    })
                    return;
                })
            }
        })

        function addForm(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Tambah Data paket');
            $('#modalForm form')[0].reset();

            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('post');
        }

        function editData(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data paket');
            
            $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('put');
            $.get (url)
                .done((response) => {
                    $('#modalForm [name=id_outlet]').val(response.id_outlet);
                    $('#modalForm [name=jenis]').val(response.jenis);
                    $('#modalForm [name=nama_paket]').val(response.nama_paket);
                    $('#modalForm [name=harga]').val(response.harga);
                    // console.log(response.name);
                })
                .fail((errors) => {
                    alert('Tidak Dapat Menampilkan Data');
                    return;
                })
        }

        function deleteData(url){
            swal({
                title: "Apa anda yakin menghapus data ini?",
                text: "Jika anda klik OK, maka data akan terhapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $.post(url, {
                    '_token' : $('[name=csrf-token]').attr('content'),
                    '_method' : 'delete'
                })
                .done((response) => {
                    swal({
                    title: "Sukses",
                    text: "Data berhasil dihapus!",
                    icon: "success",
                    });
                })
                .fail((errors) => {
                    swal({
                    title: "Gagal",
                    text: "Data gagal dihapus!",
                    icon: "error",
                    });
                })
                table.ajax.reload();
                }
            });

        }
    </script>
@endpush