@extends('layouts.front')

@section('content')
 
<!-- Page Banner Start -->
<div class="section page-banner">

    <img class="shape-1 animation-round" src="{{asset('front/assets/images/shape/shape-8.png')}}" alt="Shape">

    <img class="shape-2" src="{{asset('front/assets/images/shape/shape-23.png')}}" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li class="active">Inscription</li>
            </ul>
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

<!-- Register & Login Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Register & Login Wrapper Start -->
        <div class="register-login-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6">

                    <!-- Register & Login Images Start -->
                    <div class="register-login-images">
                        <div class="shape-1">
                            <img src="{{asset('front/assets/images/shape/shape-26.png')}}" alt="Shape">
                        </div>


                        <div class="images">
                            <img src="{{asset('front/assets/images/register-login.png')}}" alt="Register Login">
                        </div>
                    </div>
                    <!-- Register & Login Images End -->

                </div>
                <div class="col-lg-6">

                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Parfait ! {{$name}}</h4>
                        <p>Nous avons bien reçu votre préinscription</p>
                        <hr>
                        <p class="mb-0">Nous vous contacterons dans les plus brefs délais</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- Register & Login Wrapper End -->

    </div>
</div>
<!-- Register & Login End -->

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
            <h2 class="main-title">N'hésitez pas à nous contacter </h2>
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
<!-- Download App End -->
@endsection