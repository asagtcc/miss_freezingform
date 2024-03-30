<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

        <link href="https://code.jquery.com/ui/1.13.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
        
        @if (Request::path() =='/')
            <title>Membership Freezing</title>
        @else
            <title>@yield('title')</title>
        @endif

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav-icon.jpg') }}">
        {{--  Additional CSS Files  --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/templatemo-training-studio.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/datepicker3.css') }}">

        <style>
            .alert-danger {
                height: fit-content;
                margin-top: -30px;
            }
        </style>

        {{--  Toast  --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    </head>

    <body>

        {{-- ***** Preloader Start ***** --}}
        <div id="js-preloader" class="js-preloader">
            <div class="preloader-inner">
                <span class="dot"></span>
                <div class="dots">
                <span></span>
                <span></span>
                <span></span>
                </div>
            </div>
        </div>
        {{-- ***** Preloader End ***** --}}


        {{-- ***** Header Area Start ***** --}}
        <header class="header-area header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="main-nav">
                            {{--  <!-- ***** Logo Start ***** -->  --}}
                            <a href="{{ url('/') }}" class="logo">
                                {{--  MP<em> health club</em>  --}}
                                <img src="{{ asset('assets/images/misslogo.png') }}">
                            </a>
                            {{--  ***** Logo End *****  --}}
                            {{--  ***** Menu Start *****  --}}
                            <ul class="nav">
                                <li class="scroll-to-section"><a href="{{ url('/') }}" class="{{ Request::path() =='/' ? 'active' : '' }}">Home</a></li>
                                <li class="scroll-to-section"><a href="{{ url('/hessahalmubarak') }}" class="{{ Request::is('hessahalmubarak') ? 'active' : '' }}">Hessah Al-Mubarak</a></li>
                                <li class="scroll-to-section"><a href="{{ url('/sabahalsaelm') }}" class="{{ Request::is('sabahalsaelm') ? 'active' : '' }}">Sabah Al-Salem</a></li>
                                <li class="scroll-to-section"><a href="{{ url('/mangaf') }}" class="{{ Request::is('mangaf') ? 'active' : '' }}">Mangaf</a></li>
                            </ul>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            {{--  <!-- ***** Menu End ***** -->  --}}
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        {{-- ***** Header Area End ***** --}}

        {{-- ***** Main Banner Area Start ***** --}}
        <div class="main-banner" id="top">
            <div class="video-overlay header-text">
                {{--  <div class="logo">
                    <img src="{{ asset('assets/images/logo.jpg') }}">
                </div>  --}}
                <div class="caption">
                    <h6>work harder, get stronger</h6>
                    <h2>easy with our <em>gym</em></h2>
                </div>
            </div>
        </div>
        {{-- ***** Main Banner Area End ***** --}}

        <section class="section" id="contact-us">
            @yield('content')
        </section>

        {{-- ***** Footer Start ***** --}}
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; 2024 Miss Platinum

                        - Designed by <a rel="nofollow" href="" class="tm-text-link" target="_parent">Oncall</a></p>

                    </div>
                </div>
            </div>
        </footer>

        {{--  <!-- jQuery -->  --}}
        {{--  <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>  --}}

        {{--  <!-- Bootstrap -->  --}}
        <script src="{{ asset('assets/js/popper.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

        {{--  <!-- Plugins -->  --}}
        <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
        <script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
        <script src="{{ asset('assets/js/mixitup.js') }}"></script>
        <script src="{{ asset('assets/js/accordions.js') }}"></script>
        {{--  <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>  --}}

        {{--  <!-- Global Init -->  --}}
        <script src="{{ asset('assets/js/custom.js') }}"></script>


        @if (Session::has('success'))
            <script>
                toastr.options =
                {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "8000",
                    "extendedTimeOut": "5000",
                }
                toastr.success("{{ session('success') }}");
            </script>
        @endif
    </body>
</html>
