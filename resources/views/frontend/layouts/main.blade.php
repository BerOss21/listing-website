<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>Listings</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/summernote.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/izitoast/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    <script src="{{asset('admin/assets/modules/sweetalert/sweetalert.min.js')}}"></script>

    @stack('head')
    <!-- <link rel="stylesheet" href="{{asset('frontend/assets/css/rtl.css')}}"> -->
</head>

<body>

    <!--==========================
        TOPBAR PART START
    ===========================-->
    <section id="wsus__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-7 d-none d-md-block">
                    <ul class="wsus__topbar_left">
                        <li><a href="mailto:support@websolutionus.com"><i class="fal fa-envelope"></i>
                                support@websolutionus.com</a></li>
                        <li><a href="callto:+6958474522655"><i class="fal fa-phone-alt"></i>+6958474522655</a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-md-5">
                    <div class="wsus__topbar_right">
                        @auth
                            <div class="text-white align-self-center">
                                Hello {{auth()->user()->firstname}}
                            </div>
                            <a href="{{route('dashboard')}}"><i class="far fa-user"></i></a>
                            <a href="" id="user-logout-link"><i class="far fa-sign-out-alt"></i>Logout</a>
                            <form id="user-logout-form" action="{{route('logout')}}" method="post">
                                  @csrf
                            </form>
                          
                        @else
                            <a href="{{route('login')}}"><i class="fas fa-user"></i> Login</a>
                        @endauth
                    </div>
                    <div class="wsus__topbar_right ">
                       
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        TOPBAR PART END
    ===========================-->


    <!--==========================
        MENU PART START
    ===========================-->
    @include('frontend.layouts.partials.navbar')
    <!--==========================
        MENU PART END
    ===========================-->

    @yield('content')

    <!--==========================
        FOOTER PART START
    ===========================-->
    @include('frontend.layouts.partials.footer')
    <!--==========================
        FOOTER PART END
    ===========================-->


    <!--=============SCROLL BTN==============-->
    <div class="scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--=============SCROLL BTN==============-->

    <!--jquery library js-->
    <script src="{{asset('frontend/assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('frontend/assets/js/Font-Awesome.js')}}"></script>
    <!--slick js-->
    <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
    <!--venobox js-->
    <script src="{{asset('frontend/assets/js/venobox.min.js')}}"></script>
    <!--counter js-->
    <script src="{{asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countup.min.js')}}"></script>
    <!--nice select js-->
    <script src="{{asset('frontend/assets/js/select2.min.js')}}"></script>
    <!--isotope js-->
    <script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
    <!--summer_note js-->
    <script src="{{asset('frontend/assets/js/summernote.min.js')}}"></script>
    <!--select js-->
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    <script src="{{asset('admin/assets/modules/izitoast/js/iziToast.min.js')}}"></script>

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

    <script>
        $("#user-logout-link").on('click',function(e){
            e.preventDefault();
            $('#user-logout-form').submit();
        })
    </script>

    @stack('js')
</body>

</html>