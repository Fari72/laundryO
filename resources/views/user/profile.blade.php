@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <div class="section-header">
    <div class="card">
      <h1>Profile</h1>
    </div>
    {{-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
      <div class="breadcrumb-item">Profile</div>
    </div> --}}
  </div>

  <div class="section-body">
    <h2 class="section-title">{{ auth()->user()->name }}</h2>
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">                     
            <img alt="image" src="{{asset('public/profile' . '/' . Auth()->user()->avatar)}}" class="rounded-circle profile-widget-picture">
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name">{{ auth()->user()->name }} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
              Hi!
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form action="{{route('user.update', Auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">                               
                  <div class="form-group col-md-12 col-12">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth()->user()->name }}">
                    <div class="invalid-feedback">
                      Please fill in the first name
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth()->user()->email }}">
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                    <div class="tampil-gambar">
                      <img src="{{asset('public/profile' . '/' . Auth()->user()->avatar)}}" width="200px" height="200px">
                    </div>
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection