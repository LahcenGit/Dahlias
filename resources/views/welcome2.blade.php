@extends('layouts.front')

@section('content')


  <!-- Slider Start -->
<div class="section slider-section">

    <!-- Slider Shape Start -->
    <div class="slider-shape">
        <img class="shape-1 animation-round" src="{{asset('front/assets/images/shape/shape-8.png')}}" alt="Shape">
    </div>
    <!-- Slider Shape End -->

    <div class="container">

        <!-- Slider Content Start -->
        <div class="slider-content">
            <h4 class="sub-title">Institut de formation pluridisciplinaire</h4>
            <h2 class="main-title">Aussi bien en sciences et techniques appliquées qu’en culture et arts</h2>
            <p>Dahlias Institute est dédié aux apprenants de tout âge, tous niveaux et domaines .</p>
           {{--<a class="btn btn-primary btn-hover-dark" href="#">Découvrir</a>--}} 


        </div>
        <!-- Slider Content End -->

    </div>

    <!-- Slider Courses Box Start -->
    <div class="slider-courses-box">

        <img class="shape-1 animation-left" src="{{asset('front/assets/images/shape/shape-5.png')}}" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-open-book"></i>
                <span class="count">+ 50</span>
                <p>Formations</p>
            </div>
        </div>

        <img class="shape-2" src="{{asset('front/assets/images/shape/shape-6.png')}}" alt="Shape">

    </div>
    <!-- Slider Courses Box End -->

    <!-- Slider Rating Box Start -->
    <div class="slider-rating-box">

       {{--<div class="box-rating">
            <div class="box-wrapper">
                <span class="count">4.8 <i class="flaticon-star"></i></span>
                <p>Avis (30)</p>
            </div>
        </div>--}} 

        <img class="shape animation-up" src="{{asset('front/assets/images/shape/shape-7.png')}}" alt="Shape">

    </div>
    <!-- Slider Rating Box End -->

    <!-- Slider Images Start -->
    <div class="slider-images">
        <div class="images">
            <img src="{{asset('front/assets/images/slider/slider-1.png')}}" alt="Slider">
        </div>
    </div>
    <!-- Slider Images End -->

    <!-- Slider Video Start -->
    <div class="slider-video">
        <img class="shape-1" src="{{asset('front/assets/images/shape/shape-9.png')}}" alt="Shape">

        <div class="video-play">
            <img src="{{asset('front/assets/images/shape/shape-10.png')}}" alt="Shape">
            <a href="https://www.youtube.com/watch?v=BRvyWfuxGuU" class="play video-popup"><i class="flaticon-play"></i></a>
        </div>
    </div>
    <!-- Slider Video End -->

</div>
<!-- Slider End -->

<!-- All Courses Start -->
<div class="section section-padding-02">
    <div class="container">

        <!-- All Courses Top Start -->
        <div class="courses-top">

            <!-- Section Title Start -->
            <div class="section-title shape-01">
                <h2 class="main-title"><span>Nouvelles</span> Formations </h2>
            </div>
            <!-- Section Title End -->

            <!-- Courses Search Start -->
            <div class="courses-search">
                <form action="#">
                    <input type="text" placeholder="Chercher une formation">
                    <button><i class="flaticon-magnifying-glass"></i></button>
                </form>
            </div>
            <!-- Courses Search End -->

        </div>
        <!-- All Courses Top End -->

               
                <div class="owl-carousel">
                    @foreach ($courses as $course)
                    <div>
                        <!-- Single Courses Start -->
                        <div class="single-courses">
                            <div class="courses-images">
                                @foreach ($course->images as $img)
                                <a href="{{asset('course-detail/'.$course->id)}}"><img src="{{asset('storage/'.$img->lien)}}" alt="Courses"></a>
                                @endforeach
                            </div>
                            <div class="courses-content">
                                

                                <h4 class="title"><a href="{{asset('course-detail/'.$course->id)}}">{{$course->name}}</a></h4>
                                <div class="courses-meta">
                                    <span> <i class="icofont-clock-time"></i>{{$course->duration}} h</span>
                                    <span> <i class="icofont-read-book"></i> {{$course->nbr_student}} apprenants </span>
                                </div>
                                <div class="courses-price-review">
                                    <div class="courses-price">
                                        <span class="sale-parice">{{$course->price}} Da/séance</span>
                                        <span class="old-parice">750 Da</span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                     
                    </div>
                    @endforeach
                  
                </div>


    </div>
</div>
<!-- All Courses End -->

<!-- Call to Action Start -->
<div class="section section-padding-02">
    <div class="container">

        <!-- Call to Action Wrapper Start -->
        <div class="call-to-action-wrapper">

            <img class="cat-shape-01 animation-round" src="{{asset('front/assets/images/shape/shape-12.png')}}" alt="Shape">
            <img class="cat-shape-02" src="{{asset('front/assets/images/shape/shape-13.svg')}}" alt="Shape">
            <img class="cat-shape-03 animation-round" src="{{asset('front/assets/images/shape/shape-12.png')}}" alt="Shape">

            <div class="row align-items-center">
                <div class="col-md-6">

                    <!-- Section Title Start -->
                    <div class="section-title shape-02">
                        <h5 class="sub-title">Devenir formateur</h5>
                        <h2 class="main-title">Vous pouvez rejoindre Dahlias intitute en tant que<span> formateur</span></h2>
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-md-6">
                    <div class="call-to-action-btn">
                        <a class="btn btn-primary btn-hover-dark" href="{{asset('/contact')}}">Contactez-nous</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action Wrapper End -->

    </div>
</div>
<!-- Call to Action End -->

<!-- How It Work End -->
<div class="section section-padding mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Plus de 50+ Formations</h5>
            <h2 class="main-title">Comment ça  <span> marche?</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- How it Work Wrapper Start -->
        <div class="how-it-work-wrapper">

            <!-- Single Work Start -->
            <div class="single-work">
                <img class="shape-1" src="{{asset('front/assets/images/shape/shape-15.png')}}" alt="Shape">

                <div class="work-icon">
                    <i class="flaticon-transparency"></i>
                </div>
                <div class="work-content">
                    <h3 class="title">Trouver votre formation</h3>
                    <p>Choisissez une formation parmi nos différentes formations </p>
                </div>
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="work-arrow">
                <img class="arrow" src="{{asset('front/assets/images/shape/shape-17.png')}}" alt="Shape">
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="single-work">
                <img class="shape-2" src="{{asset('front/assets/images/shape/shape-15.png')}}" alt="Shape">

                <div class="work-icon">
                    <i class="flaticon-forms"></i>
                </div>
                <div class="work-content">
                    <h3 class="title">Inscrivez-vous</h3>
                    <p>Remplir le formulaire de préinscription de votre formation.</p>
                </div>
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="work-arrow">
                <img class="arrow" src="{{asset('front/assets/images/shape/shape-17.png')}}" alt="Shape">
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="single-work">
                <img class="shape-3" src="{{asset('front/assets/images/shape/shape-16.png')}}" alt="Shape">

                <div class="work-icon">
                    <i class="flaticon-badge"></i>
                </div>
                <div class="work-content">
                    <h3 class="title">Venir à l’institut</h3>
                    <p>Aprés la confirmation vous pouvez venir pour compléter votre inscription.</p>
                </div>
            </div>
            <!-- Single Work End -->

        </div>

    </div>
</div>
<!-- How It Work End -->

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
                <h5 class="sub-title">Besoin de plus d'informations?</h5>
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

<!-- Testimonial End -->
<div class="section section-padding-02 mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Témoignage d'étudiant</h5>
            <h2 class="main-title">Commentaires des <span> étudiants</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- Testimonial Wrapper End -->
        <div class="testimonial-wrapper testimonial-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                  

                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial swiper-slide">
                        <div class="testimonial-author">
                            <div class="author-thumb">
                                <img src="{{asset('profile-vide.jpg')}}" alt="Author">

                                <i class="icofont-quote-left"></i>
                            </div>

                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                            </span>
                        </div>
                        <div class="testimonial-content">
                            <p>Hey,hope you are all doing fine! 
                                I just wanted to wish you luck and success, because what you have done is really amazing also when you opened the door for us to have sessions and to learn more i really enjoyed time being there! and i hope others will have the chance too to discover your Wonderful programs and your institut and to get more help best of luck dahlias institute.</p>
                            <h4 class="name">Chaimaa Aissi</h4>
                            <span class="designation">Etudiante</span>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->

                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial swiper-slide">
                        <div class="testimonial-author">
                            <div class="author-thumb">
                                <img src="{{asset('profile-vide.jpg')}}" alt="Author">

                                <i class="icofont-quote-left"></i>
                            </div>

                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                            </span>
                        </div>
                        <div class="testimonial-content">
                            <p>Good evening, I am Hassimi Guindo from AIESEC in Tlemcen. I'm in charge of the Marketing team in our project Dzair School Winter Edition. We want to thank you so much for today's session at your institute. I would like to share with you some pictures and videos that we took during the session. I will send you another email with the videos attached. Thank you once again.</p>
                            <h4 class="name"> Hassimi Guindo</h4>
                            <span class="designation">AIESEC in Tlemcen</span>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                    <!-- Single Testimonial Start -->
                    <div class="single-testimonial swiper-slide">
                        <div class="testimonial-author">
                            <div class="author-thumb">
                                <img src="{{asset('profile-vide.jpg')}}" alt="Author">

                                <i class="icofont-quote-left"></i>
                            </div>

                            <span class="rating-star">
                                    <span class="rating-bar" style="width: 80%;"></span>
                            </span>
                        </div>
                        <div class="testimonial-content">
                            <p>  I highly recommend ''LES DAHLIAS INSTITUTE'' to everyone interested in a very flexible and informative learning experience.
                                without forgetting to mention that the institute provides a safe, professional, and friendly learning environment.
                                   so, if you planning to take extra courses. I suggest you join this excellent institute and best of luck everyone! </p>
                            <h4 class="name"> Sara Belmokhtar</h4>
                            <span class="designation">Etudiante</span>
                        </div>
                    </div>
                    <!-- Single Testimonial End -->
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- Testimonial Wrapper End -->

    </div>
</div>
<!-- Testimonial End -->


    </div>
</div>
<!-- Blog End -->

@endsection