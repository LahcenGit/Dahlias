@extends('layouts.front')
@section('content')
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
                                <li><a href="{{asset('category-courses/'.$categorie->id)}}">{{$categorie->name}}</a></li>
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
                        <li><a class="sign-up" href="{{asset('/login')}}">Connexion</a></li>
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
                    <li><a href="{{asset('category-courses/'.$categorie->id)}}">{{$categorie->name}}</a></li>
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
    

<div class="section page-banner">

    <img class="shape-1 animation-round" src="{{'front/assets/images/shape/shape-8.png'}}" alt="Shape">

    <img class="shape-2" src="{{asset('front/assets/images/shape/shape-23.png')}}" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">404 Error</li>
            </ul>
            <h2 class="title">Page  <span>non trouvée</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

    <!-- Shape Icon Box Start -->
    <div class="shape-icon-box">

        <img class="icon-shape-1 animation-left" src="{{asset('front/assets/images/shape/shape-5.png')}}" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-badge"></i>
            </div>
        </div>

        <img class="icon-shape-2" src="{{asset('front/assets/images/shape/shape-6.png')}}" alt="Shape">

    </div>
    <!-- Shape Icon Box End -->

    <img class="shape-3" src="{{asset('front/assets/images/shape/shape-24.png')}}" alt="Shape">

    <img class="shape-author" src="{{asset('front/assets/images/author/author-11.jpg')}}" alt="Shape">

</div>
<!-- Page Banner End -->

<!-- Error Start -->
<div class="section section-padding mt-n10">
    <div class="container">

        <!-- Error Wrapper Start -->
        <div class="error-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Error Images Start -->
                    <div class="error-images">
                        <img src="{{asset('front/assets/images/error.png')}}" alt="Error">
                    </div>
                    <!-- Error Images End -->
                </div>
                <div class="col-lg-6">
                    <!-- Error Content Start -->
                    <div class="error-content">
                        <h5 class="sub-title">Cette page est introuvable.</h5>
                        <h2 class="main-title">Nous sommes désolés pour l'erreur. <span>  Nous ne pouvons pas trouver cette</span> page.</h2>
                        
                        <a href="/" class="btn btn-primary btn-hover-dark">Retourner à l'accueil</a>
                    </div>
                    <!-- Error Content End -->
                </div>
            </div>
        </div>
        <!-- Error Wrapper End -->

    </div>
</div>
<!-- Error End -->

<!-- Download App Start -->
<div class="section section-padding download-section">

    <div class="app-shape-1"></div>
    <div class="app-shape-2"></div>
    <div class="app-shape-3"></div>
    <div class="app-shape-4"></div>

    <div class="container">

        <!-- Download App Wrapper Start -->
        <div class="download-app-wrapper mt-n6">

            <!-- Section Title Start -->
            <div class="section-title section-title-white">
                <h5 class="sub-title">Besoin de plus d'information?</h5>
                <h2 class="main-title">N'hésitez pas à nous contacter</h2>
            </div>
            <!-- Section Title End -->

            <img class="shape-1 animation-right" src="{{asset('front/assets/images/shape/shape-14.png')}}" alt="Shape">

            <!-- Download App Button End -->
            <div class="download-app-btn">
                <ul class="app-btn">
                    <li style="color: white"> <i class="fas fa-phone-volume fa-5x"></i></li>
                    <li ><h3 style="color: #aa896b"> (213) 0553 007 364</h3></li>
                </ul>
            </div>
            <!-- Download App Button End -->

        </div>
        <!-- Download App Wrapper End -->

    </div>
</div>

@endsection