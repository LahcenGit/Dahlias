@extends('layouts.front')

@section('content')

<style>
    .single-courses .courses-content .title a
    {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    }

    .img-one:hover{
    
      opacity: 0.7;
      transition: 1s;
    
    }
    .news{width: 160px}.news-scroll a{text-decoration: none}.dot{height: 6px;width: 6px;margin-left: 3px;margin-right: 3px;margin-top: 2px !important;background-color: #BF9573;border-radius: 50%;display: inline-block}
    .bg-color{background-color: #EDF9F6 !important;}
    .bg-dahlias{background-color: #24413A !important;}

    .cont-top{
        margin-top: 230px;
    }

    .bottom-ads{
        display: none;
    }

    @media screen and (max-width: 480px) {

        .right-ads{
            display: none;
        }
        .cont-top{
             margin-top: 150px;
        }
        .bottom-ads{
          display: block;
        }

    }


</style>


<div class="container cont-top" >

   {{-- <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center breaking-news bg-color">
                    <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-dahlias py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Nouveautés :</span></div>
                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> <a href="#">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </a> <span class="dot"></span> <a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </a> <span class="dot"></span> <a href="#">Duis aute irure dolor in reprehenderit in voluptate velit esse </a>
                    </marquee>
                </div>
            </div>
        </div>
    </div> --}}
    
    <div class="row mt-4">
        <div class="col-md-10">
             <!-- Slider Start -->
            <div id="carouselExampleIndicators" style="border-radius: 30px;" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>

                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('slide-1.jpg')}}" style="border-radius: 20px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="" class="btn btn-primary">Découvrir</a>  </h5>
                    </div>
                </div>

                <div class="carousel-item ">
                    <img src="{{asset('slide-2.jpg')}}" style="border-radius: 20px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="" class="btn btn-primary">J'en profite</a>  </h5>
                    </div>
                </div>
                
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="col-md-2 right-ads">
             <!-- Slider Start -->
                <img  class="img-one " height="450" width="200" style="border-radius: 20px;" src="{{asset('/cuisine-dahlias.jpg')}}"  alt="">
        </div>

        <!-- Slider End -->

        {{--
        <div class="row mt-4">
            <div class="col-lg-4" >
                <img  class="img-one" style="border-radius: 20px;" src="{{asset('/cuisine-dahlias.jpg')}}"  alt="">
            </div>
            <div class="col-lg-4" >
                <img style="border-radius: 20px;" src="{{asset('/cuisine-dahlias.jpg')}}"  alt="">
            </div>
            <div class="col-lg-4" >
                <img style="border-radius: 20px;" src="{{asset('/cuisine-dahlias.jpg')}}"  alt="">
            </div>
        
            
        </div>--}}
    </div>

    <div class="row mt-4 bottom-ads">
        <img  class="img-one" style="border-radius: 20px;" src="{{asset('/cuisine-dahlias-bottom.jpg')}}"  alt="">
    </div>

</div>
  

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
                <form action="{{asset('search')}}" method="GET">
                    @csrf
                    <input type="text" name="keyword" placeholder="Chercher une formation">
                    <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
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

                             
                                @if($course->price == 0)
                                    <div class="courses-price-review">
                                        <div class="courses-price">
                                            <span class="sale-parice">Gratuite</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="courses-price-review">
                                        <div class="courses-price">
                                            <span class="sale-parice">{{$course->price}} Da @if($course->slug)/{{$course->slug}}@endif</span>
                                            @if($course->old_price || $course->old_price != 0)
                                            <span class="old-parice">{{$course->old_price}} Da</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                
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
            <img class="cat-shape-02" style="left: 45% ! important" src="{{asset('front/assets/images/shape/shape-13.svg')}}" alt="Shape">
            <img class="cat-shape-03 animation-round" src="{{asset('front/assets/images/shape/shape-12.png')}}" alt="Shape">

            <div class="row align-items-center">
                <div class="col-md-6">

                    <!-- Section Title Start -->
                    <div class="section-title shape-02">
                        <h5 class="sub-title">Vidéo de présentation </h5>
                        <h2 class="main-title">Présentation de l'Institut<span> DI</span></h2>
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-md-6 mt-3">
                    <iframe width="100%" height="258" src="https://www.youtube.com/embed/kTiERGiY9QA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                    <p>Après la pré-inscription vous devez venir sur place pour confirmer votre inscription.</p>
                </div>
            </div>
            <!-- Single Work End -->

        </div>

    </div>
</div>
<!-- How It Work End -->

<!-- Call to Action Start -->
<div class="section mb-4">
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
                        <h2 class="main-title">Vous pouvez rejoindre Dahlias institute en tant que<span> formateur</span></h2>
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