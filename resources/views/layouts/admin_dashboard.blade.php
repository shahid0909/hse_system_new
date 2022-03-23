<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from www.pixelwibes.com/template/ebazar/html/dist/ui-elements/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jan 2022 09:39:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/dataTables.bootstrap5.min.css') }}"/>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/ebazar.style.min.css') }}">


</head>
<body>
<div id="app">
    <div id="ebazar-layout" class="theme-blue">

        <!-- seidebar -->
        @include('dashboards.admins.include.sidebar')

        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
        @include('dashboards.admins.include.navbar')
        <!-- main body area -->
            @yield('content')

        </div>

    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Plugin Js -->
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('assets/js/template.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="{{ mix('/js/app.js') }}"></script>

</body>

<!-- Mirrored from www.pixelwibes.com/template/ebazar/html/dist/ui-elements/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jan 2022 09:39:59 GMT -->
</html>
