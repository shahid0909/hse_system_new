<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>TECHnSAFETY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="TECHnSAFETY"/>
    <meta
            name="keywords"
            content="Application, Clean, Saas, Dashboard, Bootstrap4"
    />
    <meta content="Reflex IT" name="author"/>
    <!-- favicon -->
    <link rel="shortcut icon" href="frontend/images/favicon.ico"/>
    <!-- WOW Animation -->
    <link href="frontend/css/animate.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap css -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Slick Slider -->
    <link href="frontend/css/slick.css" rel="stylesheet" type="text/css"/>
    <!-- Icons -->
    <link
            href="frontend/css/materialdesignicons.min.css"
            rel="stylesheet"
            type="text/css"
    />
    <link href="{{asset('frontend/css/line-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('frontend/css/fontawesome.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Main css File -->
    <link
            href="{{asset('frontend/css/style.css')}}"
            rel="stylesheet"
            type="text/css"
            id="theme-default"
    />
    <link
            href="{{asset('frontend/css/rtl-style.css')}}"
            rel="stylesheet"
            type="text/css"
            id="rtl-theme-default"
            disabled="disabled"
    />
    <link
            href="{{asset('frontend/css/colors/default-color.css')}}"
            rel="stylesheet"
            type="text/css"
            id="theme-color"
    />
</head>
<body>
<!-- box-wrapper -->
<div class="box-wrapper" id="app">

    <!-- Start Nav Bar -->
    @include('web.include.navbar')
    <!-- End Nav Bar -->

    <!-- Start Main Wrapper -->
    @yield('content')
    <!-- End Main Wrapper -->

    <!-- Start Main Footer -->
   @include('web.include.footer')
    <!-- End Main Footer -->

</div>
<!-- box-wrapper -->

<div class="overlay overlay-search">
    <div class="close-search">
        <span class="lines"></span>
    </div>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <input
                        type="search"
                        class="form-control"
                        name="SearchInput"
                        placeholder="Search…"
                />
                <button type="submit" class="search-submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<!--search-form-->

<!-- javascript -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery-migrate.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('frontend/js/scrollspy.min.js')}}"></script>
<script src="{{asset('frontend/js/appear.js')}}"></script>
<!-- WOW Animation -->
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<!-- Slick Slider -->
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!-- Main Js -->
<script src="{{asset('frontend/js/dcode.js')}}"></script>
<script type="text/javascript">
    setTimeout(function () {
        jQuery(".item.step-1").addClass("active");
    }, 3000);
</script>
</body>
</html>