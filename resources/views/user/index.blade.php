@extends('layouts.app')

@section('title', 'User')

@section('content')
  <div class="section-header">
    <h1>User</h1>

    <div class="section-header-breadcrumb">
      <div class="breadcrump-item {{ active('user') }}">
        User
      </div>
    </div>
  </div>

  <div class="section-body">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Role</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($user as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  @if($item->role == 'admin')
                    <span class="badge badge-danger">{{ $item->role }}</span>                    
                  @else
                    <span class="badge badge-success">{{ $item->role }}</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection