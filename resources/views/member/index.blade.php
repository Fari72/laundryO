@extends('layouts.app')

@section('title')
    Member
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Member</h1>
    </div>

    <div class="section-body">
        <div class="row">

            {{-- Data Member --}}
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    {{-- Judul --}}
                    <div class="card-header">
                        <div class="col-12 col-md-10 col-lg-10">
                            <h4>Data Member</h4>
                        </div>
                        <div class="col-12 col-md-2 col-lg-2">
                            <button type="button" onclick="addForm('{{ route('member.store') }}')" class="btn btn-primary shadow-sm rounded-pill">
                                    <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>

                    {{-- Tabel --}}
                    <div class="card-body">
                        <table class="table table-striped text-nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td scope="col" style="width: 50px;">No</td>
                                    <td scope="col">Nama</td>
                                    <td scope="col">Alamat</td>
                                    <td scope="col">Jenis Kelamin</td>
                                    <td scope="col">No. Telepon</td>
                                    <td scope="col" style="width: 120px;">Aksi</td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@include('member.form')

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
            url: '{{ route('member.data') }}'
        },
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'nama'},
            {data: 'alamat'},
            {data: 'jenis_kelamin'},
            {data: 'tlp'},
            {data: 'aksi'},
        ]
    });
})
$('#modalForm').on('submit', function(e){
        if(! e.preventDefault()){
            $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
            .done((response) => {
                $('#modalForm form')[0].reset();
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
        $('#modalForm .modal-title').text('Tambah Data Member');
        
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
        $('#modalForm [alamat=_method]').val('post');
        $('#modalForm [jenis_kelamin=_method]').val('post');
        $('#modalForm [tlp=_method]').val('post');
    }
    function editData(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data Member');
        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method]').val('put');
        $('#modalForm [alamat=_method]').val('put');
        $('#modalForm [jenis_kelamin=_method]').val('put');
        $('#modalForm [tlp=_method]').val('put');
        $.get (url)
            .done((response) => {
                $('#modalForm [name=nama]').val(response.nama);
                $('#modalForm [name=alamat]').val(response.alamat);
                $('#modalForm [name=jenis_kelamin]').val(response.jenis_kelamin);
                $('#modalForm [name=tlp]').val(response.tlp);
                // console.log(response.nama);
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