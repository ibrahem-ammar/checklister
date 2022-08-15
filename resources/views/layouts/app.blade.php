<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Vendors styles-->
  <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('coreui/css/vendors/simplebar.css') }}">
  <!-- Main styles for this application-->
  <link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">
  @stack('styles')

</head>

<body>
  @include('layouts.partials.sidebar')

  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    @include('layouts.partials.header')

    <div class="body flex-grow-1 px-3">
      <div class="container-fluid">
        <div class="fade-in">

          @yield('content')
        </div>
      </div>
    </div>

    @include('layouts.partials.footer')

  </div>

  <!-- CoreUI and necessary plugins-->
  <script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
  <script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>

  @stack('scripts')

</body>

</html>