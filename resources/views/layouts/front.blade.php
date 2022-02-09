<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dahlias Institute - Never stop learning</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('icon.png')}}">

    <!-- CSS
	============================================ -->

      <link rel="stylesheet" href="{{asset('front/assets/owl/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/owl/css/owl.theme.default.min.css')}}">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/icofont.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/font-awesome.min.css')}}">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/apexcharts.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/plugins/jqvmap.min.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">

  
   
   

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<style>
    .header-top{
       background-color: #2b4942 !important;
    }
    .owl-nav{
        text-align: center;
    }
    .owl-carousel .owl-nav button.owl-prev, .owl-carousel .owl-nav button.owl-next, .owl-carousel button.owl-dot {
        height:40px;
        width: 40px;
        color: azure;
        background-color: #aa896b;
        margin: 5px;
    }
    .owl-dots{
        display: none;
    }

    .owl-nav button.owl-prev:hover{
    color: #2b4942;
    border: solid 1px;
    border-color: #2b4942;
    background-color: #f4f4f4;
    }

    .owl-nav button.owl-next:hover{
        color: #2b4942;
        border: solid 1px;
    border-color: #2b4942;
    background-color: #f4f4f4;

    }
</style>

<body>

    <div class="main-wrapper">
        
        
<!-- Header Section Start -->
<div class="header-section">

    <!-- Header Top Start -->
    <div class="header-top d-none d-lg-block">
        <div class="container">

            <!-- Header Top Wrapper Start -->
            <div class="header-top-wrapper">

                <!-- Header Top Left Start -->
                <div class="header-top-left">
                    <p>Never Stop <a href="#" style="color: #aa896b">Learning.</a></p>
                </div>
                <!-- Header Top Left End -->

                <!-- Header Top Medal Start -->
                <div class="header-top-medal">
                    <div class="top-info">
                        <p><i style="color: #aa896b" class="flaticon-phone-call"></i> (213) 0553 007 364</p>
                        <p><i style="color: #aa896b" class="flaticon-email"></i> contact@dahliasinstitute.com</p>
                    </div>
                </div>
                <!-- Header Top Medal End -->

                <!-- Header Top Right Start -->
                <div class="header-top-right">
                    <ul class="social">
                        <li><a href="https://www.facebook.com/dahliasinstitute"><i class="flaticon-facebook"></i></a></li>
                        <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                    </ul>
                </div>
                <!-- Header Top Right End -->

            </div>
            <!-- Header Top Wrapper End -->

        </div>
    </div>
    <!-- Header Top End -->

    <!-- Header Main Start -->
    <div class="header-main">
        <div class="container">

            <!-- Header Main Start -->
            <div class="header-main-wrapper">

                <!-- Header Logo Start -->
                <div class="header-logo">
                    <a href="{{asset('/')}}"><img src="{{asset('front/assets/images/logo.png')}}" alt="Logo"></a>
                </div>
                <!-- Header Logo End -->

                <!-- Header Menu Start -->
                <div class="header-menu d-none d-lg-block">
                    <ul class="nav-menu">
                        <li><a href="{{asset('/')}}">Accueil</a></li>
                        <li>
                            <a href="#">ٌRubriques</a>
                            <ul class="sub-menu">
                                @foreach ($categories as $categorie)
                                    @if( $categorie->parent_id == NULL)
                                        <li>
                                            <a href="{{asset('category-courses/'.$categorie->id)}}">{{$categorie->name}}</a>
                                        
                                        @if( count($categorie->childCategories) != 0)
                                        <ul class="sub-menu">
                                            @foreach ($categorie->childCategories as $item)
                                                    <li><a href="{{asset('category-courses/'.$item->id)}}">{{$item->name}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        </li>
                                    
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="#">A propos</a>
                        </li>
                        <li><a href="{{asset('/contact')}}">Contact</a></li>
                    </ul>

                </div>
                <!-- Header Menu End -->

                <!-- Header Sing In & Up Start -->
                <div class="header-sign-in-up d-none d-lg-block">
                    <ul>
                        @auth
                        <li><a class="sign-up" href="{{asset('/dashboard-admin')}}">Dashboard</a></li>
                        @else
                        <li><a class="sign-up" href="{{asset('/login')}}">Connexion</a></li>
                        @endauth
                        
                    </ul>
                </div>
                <!-- Header Sing In & Up End -->

                <!-- Header Mobile Toggle Start -->
                <div class="header-toggle d-lg-none">
                    <a class="menu-toggle" href="javascript:void(0)">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <!-- Header Mobile Toggle End -->

            </div>
            <!-- Header Main End -->

        </div>
    </div>
    <!-- Header Main End -->

</div>
<!-- Header Section End -->

<!-- Mobile Menu Start -->
<div class="mobile-menu">

    <!-- Menu Close Start -->
    <a class="menu-close" href="javascript:void(0)">
        <i class="icofont-close-line"></i>
    </a>
    <!-- Menu Close End -->

    <!-- Mobile Top Medal Start -->
    <div class="mobile-top">
        <p><i class="flaticon-phone-call"></i> (213) 0553 007 364</p>
        <p><i class="flaticon-email"></i>contact@dahliasinstitute.com</p>
    </div>
    <!-- Mobile Top Medal End -->

    <!-- Mobile Sing In & Up Start -->
    <div class="mobile-sign-in-up">
        <ul>
            <li><a class="sign-Up" href="{{asset('/login')}}">Connexion</a></li>
        </ul>
    </div>
    <!-- Mobile Sing In & Up End -->

    <!-- Mobile Menu Start -->
    <div class="mobile-menu-items">
        <ul class="nav-menu">
            <li><a href="{{asset('/')}}">Accueil</a></li>
            <li>
                <a href="#">Rubriques</a>
                <ul class="sub-menu">
                    @foreach ($categories as $categorie)
                        @if( $categorie->parent_id == NULL)
                            <li>
                                <a href="{{asset('category-courses/'.$categorie->id)}}">{{$categorie->name}}</a>
                            
                            @if( count($categorie->childCategories) != 0)
                            <ul class="sub-menu">
                                @foreach ($categorie->childCategories as $item)
                                        <li><a href="{{asset('category-courses/'.$item->id)}}">{{$item->name}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                            </li>
                        
                        @endif
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="#">A propos </a>
              
            </li>
            
            <li><a href="{{asset('/contact')}}">Contact</a></li>
        </ul>

    </div>
    <!-- Mobile Menu End -->

    <!-- Mobile Menu End -->
    <div class="mobile-social">
        <ul class="social">
            <li><a href="#"><i class="flaticon-facebook"></i></a></li>
            <li><a href="#"><i class="flaticon-instagram"></i></a></li>
        </ul>
    </div>
    <!-- Mobile Menu End -->

</div>
<!-- Mobile Menu End -->

<!-- Overlay Start -->
<div class="overlay"></div>
<!-- Overlay End -->

        

        

      
        @yield('content')

        <!-- Footer Start  -->
        <div class="section footer-section mt-4">

            <!-- Footer Widget Section Start -->
            <div class="footer-widget-section">

                <img class="shape-1 animation-down" src="{{asset('front/assets/images/shape/shape-21.png')}}" alt="Shape">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 order-md-1 order-lg-1">

                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <div class="widget-logo">
                                    <a href="#"><img src="{{asset('front/assets/images/logo.png')}}" alt="Logo"></a>
                                </div>

                                <div class="widget-address">
                                    <h4 class="footer-widget-title"> Algerie, Tlemcen</h4>
                                    <p>1026 Les Dahlias, Kiffan Tlemcen, Algérie</p>
                                </div>

                                <ul class="widget-info">
                                    <li>
                                        <p> <i class="flaticon-email"></i> <span style="margin-left: 5px;">contact@dahliasinstitute.com </span> </p>
                                    </li>
                                    <li>
                                        <p> <i class="flaticon-phone-call "></i> <span style="margin-left: 5px;">(213) 0553 007 364</span>  </p>
                                    </li>
                                </ul>

                                <ul class="widget-social">
                                    <li><a href="https://www.facebook.com/dahliasinstitute"><i class="flaticon-facebook"></i></a></li>
                                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                        <div class="col-lg-6 order-md-3 order-lg-2">

                            <!-- Footer Widget Link Start -->
                            <div class="footer-widget-link">

                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget-title">Rubriques</h4>

                                    <ul class="widget-link">
                                        <li><a href="#">Informatique </a></li>
                                        <li><a href="#">Young Developer </a></li>
                                        <li><a href="#">3D Arts </a></li>
                                        <li><a href="#">Energie Créative</a></li>
                                        <li><a href="#">Langues </a></li>
                                    </ul>

                                </div>
                                <!-- Footer Widget End -->

                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget-title">Liens rapides</h4>

                                    <ul class="widget-link">
                                        <li><a href="#">Formations </a></li>
                                        <li><a href="#">A propos de nous</a></li>
                                        <li><a href="#">Contactez-nous</a></li>
                                    </ul>

                                </div>
                                <!-- Footer Widget End -->

                            </div>
                            <!-- Footer Widget Link End -->

                        </div>
                        <div class="col-lg-3 col-md-6 order-md-2 order-lg-3">

                            <!-- Footer Widget Start -->
                            <div class="footer-widget">
                                <h4 class="footer-widget-title">S'abonner</h4>

                                <div class="widget-subscribe">
                                    <p>N'hésitez pas à vous inscrire à notre newsletter</p>

                                    <div class="widget-form">
                                        <form action="#">
                                            <input type="text" placeholder="Email here">
                                            <button class="btn btn-primary btn-hover-dark">Je m'inscris</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Footer Widget End -->

                        </div>
                    </div>
                </div>

                <img class="shape-2 animation-left" src="{{asset('front/assets/images/shape/shape-22.png')}}" alt="Shape">

            </div>
            <!-- Footer Widget Section End -->

            <!-- Footer Copyright Start -->
            <div class="footer-copyright">
                <div class="container">

                    <!-- Footer Copyright Start -->
                    <div class="copyright-wrapper">
                      
                        <div class="copyright-text">
                            <p>&copy; 2022 <span style="color: #aa896b"> Dahlias institute </span> </p>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->

                </div>
            </div>
            <!-- Footer Copyright End -->

        </div>
        <!-- Footer End -->

        <!--Back To Start-->
        <a href="#" class="back-to-top">
            <i class="icofont-simple-up"></i>
        </a>
        <!--Back To End-->

    </div>





   


    <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{asset('front/assets/js/vendor/modernizr-3.11.2.min.js')}}" ></script>
    <script src="{{asset('front/assets/js/vendor/jquery-3.5.1.min.js')}}"></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('front/assets/js/plugins/popper.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/bootstrap.min.js')}}"></script>

    <script src="{{asset('front/assets/owl/js/owl.carousel.js')}}"></script>

    <script>
                $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:false
                }
            }
        })
    </script>

    <!-- Plugins JS -->
    <script src="{{asset('front/assets/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/video-playlist.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front/assets/js/plugins/ajax-contact.js')}}"></script>

    <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
    <!-- <script src="assets/js/plugins.min.js"></script> -->


    <!-- Main JS -->
    <script src="{{asset('front/assets/js/main.js')}}"></script>

    @stack('contact-scripts')


</body>

</html>