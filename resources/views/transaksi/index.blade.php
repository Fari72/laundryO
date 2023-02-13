@extends('layouts.app')

@section('title')
    Transaksi
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Transaksi</h1>
    </div>

    <div class="section-body">
        <div class="row">

            {{-- Data Transaksi --}}
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    {{-- Judul --}}
                    <div class="card-header">
                        <div class="col-12 col-md-10 col-lg-10">
                            <h4>Data Transaksi</h4>
                        </div>
                        <div class="col-12 col-md-2 col-lg-2">
                            <button type="button" onclick="addForm('{{ route('transaksi.store') }}')" class="btn btn-primary shadow-sm rounded-pill">
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
                                    <td scope="col">Kode</td>
                                    <td scope="col">Member</td>                                   
                                    <td scope="col">Tanggal pesan</td>                                   
                                    <td scope="col">Batas Waktu</td>                                   
                                    <td scope="col">Tanggal Bayar</td>                                   
                                    <td scope="col">Biaya Tambahan</td>                                   
                                    <td scope="col">Diskon</td>                                   
                                    <td scope="col">Status</td>                                   
                                    <td scope="col">Dibayar</td>                                   
                                    <td scope="col">User</td>                                   
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

@include('transaksi.form')

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
                    url: '{{ route('transaksi.data') }}'
                },
                columns: [
                    {data: 'DT_RowIndex'},
                    {data: 'id_outlet'},
                    {data: 'kode_invoice'},
                    {data: 'id_member'},
                    {data: 'tgl'},
                    {data: 'batas_waktu'},
                    {data: 'tgl_bayar'},
                    {data: 'biaya_tambahan'},
                    {data: 'diskon'},
                    {data: 'status'},
                    {data: 'dibayar'},
                    {data: 'id_user'},
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
            $('#modalForm .modal-title').text('Tambah Data transaksi');
            $('#modalForm form')[0].reset();

            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('post');
        }

        function editData(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data transaksi');
            
            $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('put');
            $.get (url)
                .done((response) => {
                    $('#modalForm [name=id_outlet]').val(response.id_outlet);
                    $('#modalForm [name=kode_invoice]').val(response.kode_invoice);
                    $('#modalForm [name=id_member]').val(response.id_member);
                    $('#modalForm [name=tgl]').val(response.tgl);
                    $('#modalForm [name=batas_waktu]').val(response.batas_waktu);
                    $('#modalForm [name=tgl_bayar]').val(response.tgl_bayar);
                    $('#modalForm [name=biaya_tambahan]').val(response.biaya_tambahan);
                    $('#modalForm [name=diskon]').val(response.diskon);
                    $('#modalForm [name=status]').val(response.status);
                    $('#modalForm [name=dibayar]').val(response.dibayar);
                    $('#modalForm [name=id_user]').val(response.id_user);
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