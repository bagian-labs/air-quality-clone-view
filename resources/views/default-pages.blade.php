<!doctype html>
<html lang="en">
<!-- JavaScript Bundle with Popper -->
<meta name="csrf-token"
      content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

{{-- Integrated Mapbox Files  --}}

<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css'
      rel='stylesheet' />


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js"
        integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous">

<link href="https://api.fontshare.com/v2/css?f[]=epilogue@400,701,300,800,200,201,501,600,601,100,801,700&f[]=author@400,500,200,600,300&f[]=satoshi@700,500,300,400&display=swap"
      rel="stylesheet">
<link rel="icon"
      type="image/icon"
      href="{{ asset('asset/favicon/favicon.ico') }}">

<link rel="stylesheet"
      href="{{ asset('asset/css/index-styles.css') }}">
@stack('style')

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <title>Air Quality</title>
    <script src="https://kit.fontawesome.com/b87f3ad2d2.js"
            crossorigin="anonymous"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/regular.min.css"
          integrity="sha512-k2UAKyvfA7Xd/6FrOv5SG4Qr9h4p2oaeshXF99WO3zIpCsgTJ3YZELDK0gHdlJE5ls+Mbd5HL50b458z3meB/Q=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer" />

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
            integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
</head>

<body>
    {{-- Wrapper Component --}}
    <div class="wrapper__container">
        {{-- Side Navbar --}}
        @include('sidebar.sidebar-pages')
        {{-- End Sidebar Navbar --}}
        {{-- Wrapper Content --}}
        <div class="wrapper__content">
            @yield('content')
        </div>
        {{-- Wrapper Content --}}
        {{-- Side Navbar --}}
    </div>
    {{-- End Wrapper Component --}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <!-- Load the `mapbox-gl-geocoder` plugin. -->
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    @stack('script')

</body>


</html>
