@extends('layouts.front')
@section('content')
   <!-- Overlay Start -->
   <div class="overlay"></div>
   <!-- Overlay End -->

   <!-- Page Banner Start -->
   <div class="section page-banner">

       <img class="shape-1 animation-round" src="{{asset('front/assets/images/shape/shape-8.png')}}" alt="Shape">

       <img class="shape-2" src="{{asset('front/assets/images/shape/shape-23.png')}}" alt="Shape">

       <div class="container">
           <!-- Page Banner Start -->
           <div class="page-banner-content">
               <ul class="breadcrumb">
                   <li><a href="#">Home</a></li>
                   <li class="active">Contactez-nous</li>
               </ul>
               <h2 class="title">Contactez <span>Nous</span></h2>
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

<!-- Contact Map Start -->
  <div class="section section-padding-02">
    <div class="container">

        <!-- Contact Map Wrapper Start -->
        <div class="contact-map-wrapper">
            <iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13089.409957341593!2d-1.3313094!3d34.8976027!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x711746111ab58aba!2sDahlias%20Institute!5e0!3m2!1sfr!2sdz!4v1644068755876!5m2!1sfr!2sdz"  allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!-- Contact Map Wrapper End -->

    </div>
</div>
<!-- Contact Map End -->

<!-- Contact Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Contact Wrapper Start -->
        <div class="contact-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6">

                    <!-- Contact Info Start -->
                    <div class="contact-info">

                        <img class="shape animation-round" src="{{asset('front/assets/images/shape/shape-12.png')}}" alt="Shape">

                        <!-- Single Contact Info Start -->
                        <div class="single-contact-info">
                            <div class="info-icon">
                                <i class="flaticon-phone-call"></i>
                            </div>
                            <div class="info-content">
                                <h6 class="title">Téléphone N.</h6>
                                <p>0553 00 73 64</p>
                            </div>
                        </div>
                        <!-- Single Contact Info End -->
                        <!-- Single Contact Info Start -->
                  
                        <!-- Single Contact Info End -->
                        <!-- Single Contact Info Start -->
                        <div class="single-contact-info">
                            <div class="info-icon">
                                <i class="flaticon-pin"></i>
                            </div>
                            <div class="info-content">
                                <h6 class="title">Adresse.</h6>
                                <p>1026 Les Dahlias, Kiffan Tlemcen, Algérie</p>
                            </div>
                        </div>
                        <!-- Single Contact Info End -->
                    </div>
                    <!-- Contact Info End -->

                </div>
                <div class="col-lg-6">

                    <!-- Contact Form Start -->
                    <div class="contact-form">
                        <h3 class="title">Prenez contact <span>avec nous</span></h3>

                        <div class="form-wrapper">
                            <form id="contact-form" action="{{asset('/contact')}}" method="POST">
                                @csrf
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="text" id="name" name="name" placeholder="Nom complet">
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="text" id="phone" name="phone" placeholder="N. téléphone">
                                </div>
                                <div class="single-form">
                                    <input type="email" id="email" name="email" placeholder="Email">
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <input type="text" id="subject" name="subject" placeholder="Sujet">
                                </div>
                                <!-- Single Form End -->
                                <!-- Single Form Start -->
                                <div class="single-form">
                                    <textarea name="message" id="message" placeholder="Message"></textarea>
                                </div>
                                <!-- Single Form End -->
                                <p class="form-message"></p>
                                <!-- Single Form Start -->

                                <div id="show_contact_msg" >

                                </div>

                                
                                <div class="single-form">
                                    <button class="btn btn-primary btn-hover-dark w-100">Envoyer le Message <i class="flaticon-right"></i></button>
                                </div>
                                <!-- Single Form End -->
                            </form>
                        </div>
                    </div>
                    <!-- Contact Form End -->

                </div>
            </div>
        </div>
        <!-- Contact Wrapper End -->

    </div>
</div>
<!-- Contact End -->

    
@endsection

@push('contact-scripts')
<script>
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $("#contact-form").on("submit", function (e)
    {
        $('#show_contact_msg').html('<div >En cours....</div>');
        var name = $('#name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var subject = $('#subject').val();
        var message = $('#message').val();
        var formURL = $(this).attr("action");
        var data = {
            name: name,
            email: email,
            phone: phone,
            subject: subject,
            message: message
        };
        $.ajax(
                {
                    url: formURL,
                    type: "POST",
                    data: data,
                    success: function (res) {
                        if (res === '1') {
                            $('#show_contact_msg').html('<div class="alert alert-success mt-2" id="form-success" role="alert"> Votre messgae à été bien envoyer !</div>');
                        }

                     
                    }
                });
        e.preventDefault();
    });

</script>
    
@endpush



