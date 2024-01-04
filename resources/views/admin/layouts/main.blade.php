<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Listing</title>

    <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/modules/izitoast/css/iziToast.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/modules/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/jquery-selectric/selectric.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">

    @stack('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css">
    
    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">

    <meta name="csrf_token" content="{{csrf_token()}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
           

            @include('admin.layouts.partials.nav')
            @include('admin.layouts.partials.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        @yield('header')
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{ date('y')}} <div class="bullet"></div> BerDev </a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <script src="{{asset('admin/assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/popper.js')}}"></script>
    <script src="{{asset('admin/assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/stisla.js')}}"></script>

     
    <script src="{{asset('admin/assets/modules/summernote/summernote-bs4.js')}}"></script>
    <script src="{{asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('admin/assets/modules/izitoast/js/iziToast.min.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('admin/assets/modules/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{asset('admin/assets/js/page/modules-sweetalert.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>

    <script>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                iziToast.error({
                    title: '',
                    message: "{{$error}}",
                    position: 'topRight'
                });
            @endforeach
        @endif
    </script>

    @stack('js')
</body>
</html>