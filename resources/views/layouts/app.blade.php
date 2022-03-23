<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<!-- Mirrored from www.pixelwibes.com/template/ebazar/html/dist/ui-elements/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jan 2022 09:39:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link
        rel="stylesheet"
        href="{{ asset('assets/plugin/datatables/dataTables.bootstrap5.min.css') }}"
    />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/pickers/daterange/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/datetime/tempusdominus-bootstrap-4.min.css')}}" />
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/ebazar.style.min.css') }}">

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    @yield('style')
</head>
<body>
<div id="ebazar-layout" class="theme-blue">

    <!-- main body area -->
    @yield('content')

</div>

<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="{{asset('assets/datetime/2.24.0-moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/datetime/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/daterange/moment.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
<!-- Plugin Js -->
<script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('assets/js/template.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function()
    {
        $(".select2").select2({
            placeholder: 'select..',
            allowClear: true
        });
    });

</script>
@yield('script')
</body>

<!-- Mirrored from www.pixelwibes.com/template/ebazar/html/dist/ui-elements/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 04 Jan 2022 09:39:59 GMT -->
</html>
