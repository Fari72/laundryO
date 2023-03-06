@extends('layouts.app')

@section('title', 'User')

@section('content')
  <div class="card">
    <h1>User</h1>
    
    <div class="section-header-breadcrumb">
      <div class="breadcrump-item {{ active('user') }}">
      </div>
    </div>
  </div>
  <div class="section-body">
    <div class="card">
      <div class="col-2 col-md-2 col-lg-12">
        {{-- <button type="button" onclick="addForm('{{ route('user.store') }}')" class="btn btn-primary shadow-sm rounded-pill">
                <i class="fa fa-plus"></i> Tambah
        </button> --}}
    </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
              {{-- <th>Aksi</th> --}}
            </tr>
          </thead>

          <tbody>
            @foreach ($user as $user)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if($user->role == 'admin')
                    <span class="badge badge-danger">{{ $user->role }}</span>                    
                  @elseif($user->role == 'kasir')
                    <span class="badge badge-success">{{ $user->role }}</span>
                  @elseif($user->role == 'owner')
                  <span class="badge badge-warning">{{ $user->role }}</span>
                  @else
                  <span class="badge badge-white">{{ $user->role }}</span>
                  @endif
                </td>
                <td></td>
              </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </div>
@endsection

{{-- @push('script')
    <script>
        // Data Tables
        let table;

        $(function() {
            table = $('.table').DataTable({
                proccesing: true,
                autowidth: false,
                ajax: {
                    url: '{{ route('user.data') }}'
                },
                columns: [
                    {data: 'name'}
                    {data: 'email'}
                    // {data: 'aksi'}
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
            $('#modalForm .modal-title').text('Tambah Data User');
            $('#modalForm form')[0].reset();

            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('post');
        }

        function editData(url){
            $('#modalForm').modal('show');
            $('#modalForm .modal-title').text('Edit Data User');
            
            $('#modalForm form')[0].reset();
            $('#modalForm form').attr('action', url);
            $('#modalForm [name=_method]').val('put');
            $.get (url)
                .done((response) => {
                    $('#modalForm [name=name]').val(response.name);
                    $('#modalForm [name=email]').val(response.email);
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
@endpush --}}