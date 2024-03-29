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
                <li class="active">Recherche</li>
            </ul>
            <h2 class="title">Resultat pour : "{{$keyword}}"</h2>
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
<div class="section section-padding">
    <div class="container">


        <!-- Courses Category Wrapper Start  -->
        <div class="courses-category-wrapper">
            <div class="courses-search">
                <form action="{{asset('search')}}" method="GET">
                    @csrf
                    <input type="text" name="keyword" placeholder="Essayer de nouveau">
                    <button type="submit"><i class="flaticon-magnifying-glass"></i></button>
                </form>
            </div>

            <ul class="category-menu">
                <li><a class="active" style="width: auto!important" href="#">'{{$courses->count()}}' Cour(s) trouvé(s)</a></li>
            </ul>
        </div>
        <!-- Courses Category Wrapper End  -->

        <!-- Courses Wrapper Start  -->
        <div class="courses-wrapper-02">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-md-6">
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
                                    <span> <i class="icofont-clock-time"></i> {{$course->duration}} h</span>
                                    <span> <i class="icofont-read-book"></i> {{$course->nbr_student}} apprenants </span>
                                </div>

                            </div>
                        </div>
                        <!-- Single Courses End -->
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Courses Wrapper End  -->

    </div>
</div>
<!-- Courses End -->

    
@endsection