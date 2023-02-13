
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- di atas fungsi menghapus data untuk mencari id --}}
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS Libraries -->
{{-- DataTables --}}
  <link rel="stylesheet" href="{{ asset('assets/datatable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/datatable/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/datatable/buttons.bootstrap4.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">

   <!-- Template iziToast -->
 <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/css/iziToast.min.css') }}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('layouts.navbar')
      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('layouts.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  
   {{-- DataTables --}}
   <script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('assets/datatable/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('assets/datatable/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('assets/datatable/responsive.bootstrap4.min.js') }}"></script>

   {{-- SweetAlert --}}
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <!-- JS Izitoast -->
 <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  @stack('script')

  <script>
    @if(session()->has('sukses'))
    iziToast.success({
      title: 'sukses',
      message: '{{session('sukses')}}',
      position: 'topRight'
    });
    @elseif(session()->has('error'))
    iziToast.error({
      title: 'Hello, world!',
      message: '{{session('error')}}',
      position: 'topRight'
    });
    @endif
  </script>
</body>
</html>