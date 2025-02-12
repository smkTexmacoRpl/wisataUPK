<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}"> --}}


    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">


    @yield('styles')
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/st.min.css') }}">

    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('layouts.partial.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            @include('layouts.partial.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> @yield('title') </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">@yield('route')</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('layouts.partial.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>


    @yield('scripts')
    < !--endinject-->

        <script src="../../assets/js/off-canvas.js"></script>
        <script src="../../assets/js/misc.js"></script>

</body>

</html>
