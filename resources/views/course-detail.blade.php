@extends('layouts.front')
@section('content')

<style>
    .price-detail{
        font-size: 15px;
    }
    .old-price-detail{
        font-size: 19px;
        text-decoration: line-through;
    }
</style>

<div class="section page-banner">

    <img class="shape-1 animation-round" src="{{asset('front/assets/images/shape/shape-8.png')}}" alt="Shape">

    <img class="shape-2" src="{{asset('front/assets/images/shape/shape-23.png')}}" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Accueil</a></li>
                <li class="active">{{$course->category->name}}</li>
            </ul>
            <h2 class="title"> <span>{{$course->name}}</span></h2>
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

<!-- Courses Start -->
<div class="section section-padding mt-n10">
    <div class="container">
        <div class="row gx-10">
            <div class="col-lg-8">

                <!-- Courses Details Start -->
                <div class="courses-details">

                    <div class="courses-details-images">
                        @foreach ($course->images as $img)
                        <img src="{{asset('storage/'.$img->lien)}}" alt="Courses Details">
                        @endforeach
                        <span class="tags">{{$course->category->name}}</span>
                    </div>

                    <h2 class="title">{{$course->name}}</h2>


                    <!-- Courses Details Tab Start -->
                    <div class="courses-details-tab">

                        <!-- Details Tab Menu Start -->
                        <div class="details-tab-menu">
                            <ul class="nav justify-content-center">
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                @if($course->check == 'oui')
                                <li><button data-bs-toggle="tab" data-bs-target="#instructors">Formateur</button></li>
                                @endif
                                <li><button data-bs-toggle="tab" data-bs-target="#reviews">Commentaires</button></li>
                            </ul>
                        </div>
                        <!-- Details Tab Menu End -->

                        <!-- Details Tab Content Start -->
                        <div class="details-tab-content">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="description">

                                    <!-- Tab Description Start -->
                                    <div class="tab-description">
                                        <div class="description-wrapper">
                                            <h3 class="tab-title mb-4">Description:</h3>
                                            {!! $course->description !!}
                                        </div>
                                       
                                        
                                    </div>
                                    <!-- Tab Description End -->

                                </div>
                                <div class="tab-pane fade" id="instructors">

                                    <!-- Tab Instructors Start -->
                                      <div class="tab-instructors">

                                        @foreach ($course->instructors as $item)

                                        <div class="row">
                                            <div class="col-md-12 col-6">
                                                <!-- Single Team Start -->
                                                <div class="single-team">
                                                    <div class="team-thumb">
                                                        <img src="{{asset('front/assets/images/author/pic1.jpg')}}" alt="Author">
                                                    </div>
                                                    <div class="team-content">
                                                        <h4 class="name">{{$item->name }}</h4>
                                                        <span class="designation">{{$item->function }}</span>
                                                    </div>
                                                </div>
                                                <!-- Single Team End -->
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- Tab Instructors End -->

                                </div>
                            {{--  <div class="tab-pane fade" id="reviews">

                                    <!-- Tab Reviews Start -->
                                    <div class="tab-reviews">
                                        <h3 class="tab-title">Student Reviews:</h3>

                                        <div class="reviews-wrapper reviews-active">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">

                                                    <!-- Single Reviews Start -->
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="{{asset('front/assets/images/author/author-06.jpg')}}" alt="Author">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Sara Alexander</h4>
                                                                <span class="designation">Product Designer, USA</span>
                                                                <span class="rating-star">
                                                                        <span class="rating-bar" style="width: 100%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                    </div>
                                                    <!-- Single Reviews End -->

                                                    <!-- Single Reviews Start -->
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="assets/images/author/author-07.jpg" alt="Author">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Karol Bachman</h4>
                                                                <span class="designation">Product Designer, USA</span>
                                                                <span class="rating-star">
                                                                        <span class="rating-bar" style="width: 100%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                    </div>
                                                    <!-- Single Reviews End -->

                                                    <!-- Single Reviews Start -->
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="assets/images/author/author-03.jpg" alt="Author">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">Gertude Culbertson</h4>
                                                                <span class="designation">Product Designer, USA</span>
                                                                <span class="rating-star">
                                                                        <span class="rating-bar" style="width: 100%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley of type and scrambled to make type specimen book has survived not five centuries but also the leap into electronic type and book.</p>
                                                    </div>
                                                    <!-- Single Reviews End -->

                                                </div>
                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>

                                        <div class="reviews-btn">
                                            <button type="button" class="btn btn-primary btn-hover-dark" data-bs-toggle="modal" data-bs-target="#reviewsModal">Write A Review</button>
                                        </div>

                                        <!-- Reviews Form Modal Start -->
                                        <div class="modal fade" id="reviewsModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add a Review</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <!-- Reviews Form Start -->
                                                    <div class="modal-body reviews-form">
                                                        <form action="#">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <input type="text" placeholder="Enter your name">
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <input type="text" placeholder="Enter your Email">
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!-- Single Form Start -->
                                                                    <div class="reviews-rating">
                                                                        <label>Rating</label>
                                                                        <ul id="rating" class="rating">
                                                                            <li class="star" title='Poor' data-value='1'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='2'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='3'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='4'><i class="icofont-star"></i></li>
                                                                            <li class="star" title='Poor' data-value='5'><i class="icofont-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <textarea placeholder="Write your comments here"></textarea>
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <!-- Single Form Start -->
                                                                    <div class="single-form">
                                                                        <button class="btn btn-primary btn-hover-dark">Submit Review</button>
                                                                    </div>
                                                                    <!-- Single Form End -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- Reviews Form End -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Reviews Form Modal End -->

                                    </div>
                                    <!-- Tab Reviews End -->
                                     
                                </div>   --}}  
                            </div>
                        </div>
                        <!-- Details Tab Content End -->

                    </div>
                    <!-- Courses Details Tab End -->

                </div>
                <!-- Courses Details End -->

            </div>
            <div class="col-lg-4">
                <!-- Courses Details Sidebar Start -->
                <div class="sidebar">

                    <!-- Sidebar Widget Information Start -->
                    <div class="sidebar-widget widget-information">
                        @if($course->price == 0)

                        <div class="info-price">
                            <span class="price">Gratuite </span>
                        </div>
                        @else
                        <div class="info-price">
                            <span class="price">{{ $course->price }}DA <span>
                                @if($course->id != 87)
                                <span class="price-detail">/2h</span>
                                @endif
                        </div>
                        <div class="info-price">
                            @if($course->old_price == Null)
                            <span class="old-price-detail">750DA</span>
                            @else
                            <span class="old-price-detail">{{$course->old_price}} DA</span>
                            @endif
                        </div>
                        @endif
                        <div class="info-list">
                            <ul>
                                {{--<li><i class="icofont-man-in-glasses"></i> <strong>Formateur</strong> <span>{{$course->instructor->name}}</span></li>--}} 
                                 <li><i class="icofont-clock-time"></i> <strong>Durée</strong> <span>{{$course->duration}} heures</span></li>
                                 
                                <li><i class="icofont-bars"></i> <strong>Niveau</strong> 
                                     @if($course->level == 'Debutant' )
                                     <span>
                                      Débutant
                                    </span>
                                    @elseif($course->level == 'Intermediare')
                                    <span>
                                     Intermédiaire
                                   </span>
                                   @else
                                   <span>
                                    Avancé
                                   </span>
                                   @endif
                                </li>

                                <li>
                                     <i class="icofont-book-alt"></i> <strong>Langue</strong> 
                                     @foreach ($course->languages as $item)
                                     <span >{{$item->language }} </span> <span> &nbsp;</span>
                                     @endforeach
                                
                                </li>
                                @if($course->filiere!= Null)
                                <li>
                                    <i class="icofont-book-alt"></i> <strong>Filière</strong> 
                                   
                                    <span >{{$course->filiere }} </span> 
                                    
                               
                               </li>
                               @endif
                                @if($course->certificate != 'Indisponible')
                                 <li><i class="icofont-certificate-alt-1"></i> <strong>Type certificat</strong>
                                    @if($course->certificate == 'Diplome')
                                    <span>Diplôme</span>
                                    @else
                                    <span>{{$course->certificate}}</span>
                                    @endif
                                </li>
                                    
                                 
                                @endif
                                @if($course->start_date != Null && $course->end_date != NULL)
                                <li><i class="icofont-calendar"></i> <strong>Date Début</strong>
                                   <span>{{$course->start_date}}</span>
                                </li>
                                <li><i class="icofont-calendar"></i> <strong>Date Fin</strong>
                                    <span>{{$course->end_date}}</span>
                                 </li>
                               @endif
                             </ul>
                        </div>
                        <div class="info-btn">
                            <a href="{{url('register-course/'.$course->id)}}" class="btn btn-primary btn-hover-dark">S'inscrire</a>
                        </div>
                    </div>
                    <!-- Sidebar Widget Information End -->

                    <!-- Sidebar Widget Share Start -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Suivez-nous :</h4>

                        <ul class="social">
                            <li><a href="https://www.facebook.com/dahliasinstitute"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/dahliasinstitute/"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- Sidebar Widget Share End -->

                </div>
                <!-- Courses Details Sidebar End -->
            </div>
        </div>
    </div>
</div>
<!-- Courses End -->

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