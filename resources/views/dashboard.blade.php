@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="section-header">
    <h1>Dashboard</h1>
  </div> 

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-user"></i>
        </div>

        <div class="card-wrap">
            <div class="card-header">
              Total User
            </div>

            <div class="card-body">
              {{ $user->count() }}
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fa-solid fa-cash-register"></i>
        </div>

        <div class="card-wrap">
            <div class="card-header">
              Total Transaksi
            </div>

            <div class="card-body">
              {{ $transaksi->count(); }}
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="fa-solid fa-scroll"></i>
        </div>

        <div class="card-wrap">
            <div class="card-header">
              Total Laporan
            </div>

            <div class="card-body">
              {{ $detail_transaksi->count(); }}
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fa-solid fa-box"></i>
        </div>

        <div class="card-wrap">
            <div class="card-header">
              Total Paket
            </div>

            <div class="card-body">
              {{ $paket->count(); }}
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fa-solid fa-users"></i>
        </div>

        <div class="card-wrap">
            <div class="card-header">
              Total Member
            </div>

            <div class="card-body">
              {{ $member->count(); }}
            </div>
          </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fa-solid fa-users"></i>
        </div>

        <div class="card-wrap">
            <div class="card-header">
              Total Outlet
            </div>

            <div class="card-body">
              {{ $outlet->count(); }}
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection