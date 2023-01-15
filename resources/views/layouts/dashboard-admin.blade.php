<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dahlias </title>


	<link href="{{asset('Dashboard/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('icon.png')}}">
    <link href="{{asset('Dashboard/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('Dashboard/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('Dashboard/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <link href="{{asset('Dashboard/css/style.css')}}" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
	<link href="{{asset('Dashboard/vendor/summernote/summernote.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{asset('Dashboard/uploader/pe-icon-7-stroke.css')}}">
	<link rel="stylesheet" href="{{asset('Dashboard/uploader/drop_uploader.css')}}">

	
</head>



<style>
	.email-left-box .intro-title {
    background:#EDF9F9;
 
	}
	.btn-primary{
		background-color:#2B4942;
		border-color:#2B4942;
	}

	.light.btn-primary {
    background-color: #EDF9F9;
    border-color: #EDF9F9;
    color: #2B4942;
	}
	.light.btn-primary:hover {
	background-color: #EDF9F9;
    border-color: #EDF9F9;
    color: #2B4942;
	}

	

	.light.btn-primary:hover {
    background-color: #2B4942;
    border-color: #2B4942;
    color: #ffff;
	}

	.bg-primary{
		background-color:#2B4942 !important;
	}
	.page-titles h4{
		color: #2B4942;
	}
	[data-headerbg="color_1"] .nav-header .hamburger.is-active .line, [data-headerbg="color_1"] .nav-header .hamburger .line{
		background:#2B4942 !important;
	}

	.total-order {
      background-color: Black; 
      font-family: 'Orbitron', sans-serif;
      font-size:25px; 
      color:#2B4942; 
      font-weight : bold;
	  pointer-events: none;
	  height: 50px;
    }
	
</style>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">




        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background-color: #2b4942">
            <a href="{{asset('/dashboard-admin')}}" class="brand-logo">
                <img class="logo-abbr" src="{{asset('Dashboard/images/logo-white.png')}}" alt="">
                <img class="logo-compact" src="{{asset('Dashboard/images/logo-text-white.png')}}" alt="">
                <img class="brand-title" src="{{asset('Dashboard/images/logo-text-white.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
        
         <!--**********************************
			
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path></svg>
                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"></path></svg>
                                </a>
							</li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
										<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
										<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
									</svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3" style="height:380px;">
										<ul class="timeline">
											this feature will be available soon :)		
										</ul>
									</div>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{asset('Dashboard/images/profile/pic1.jpg')}}" width="20" alt=""/>
									<div class="header-info">
										<span>Bonjour, <strong>{{Auth::user()->name}}</strong></span>
										<small>Admin Profile</small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
										 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                                    </a>
                                </div>
                            </li>
							<li class="nav-item right-sidebar">
                                <a class="nav-link bell ai-icon" href="#">
                                    <svg id="icon-menu" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                </a>
							</li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
         <!--**********************************
            
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    
						
						<li class="nav-label first">Main Menu</li>
						<li><a href="{{url('/dashboard-admin')}}" class="ai-icon" aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="17" y="4" width="3" height="13" rx="1.5"/>
                                    <rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
                                    <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                    <rect fill="#000000" opacity="0.3" x="7" y="11" width="3" height="6" rx="1.5"/>
                                </g>
                            </svg>
							<span class="nav-text">Dashboard</span>
						</a></li>

                    
                   
                    <li class="nav-label">Categories</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"/>
								<path d="M1.5,5 L4.5,5 C5.32842712,5 6,5.67157288 6,6.5 L6,17.5 C6,18.3284271 5.32842712,19 4.5,19 L1.5,19 C0.671572875,19 1.01453063e-16,18.3284271 0,17.5 L0,6.5 C-1.01453063e-16,5.67157288 0.671572875,5 1.5,5 Z M18.5,5 L22.5,5 C23.3284271,5 24,5.67157288 24,6.5 L24,17.5 C24,18.3284271 23.3284271,19 22.5,19 L18.5,19 C17.6715729,19 17,18.3284271 17,17.5 L17,6.5 C17,5.67157288 17.6715729,5 18.5,5 Z" fill="#000000"/>
								<rect fill="#000000" opacity="0.3" x="8" y="5" width="7" height="14" rx="1.5"/>
							</g>
						</svg>
							<span class="nav-text">Categories</span>
						</a>
                        <ul aria-expanded="false">
                          
                            
                                <ul aria-expanded="false">
                                    <li><a href="{{url('/dashboard-admin/category/create')}}">Ajouter</a></li>
                                    <li><a href="{{url('/dashboard-admin/category')}}">liste des categories</a></li>
                                    
                                </ul>
                            </li>
                            
							
                        </ul>
                    </li>

                    <li class="nav-label">Formateurs</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
							<span class="nav-text">Formateurs</span>
						</a>
                        <ul aria-expanded="false">
                          
                            
                                <ul aria-expanded="false">
                                    <li><a href="{{url('/dashboard-admin/instructors/create')}}">Ajouter</a></li>
                                    <li><a href="{{url('/dashboard-admin/instructors')}}">liste des formateurs</a></li>
                                    
                                </ul>
                            </li>
                            
							
                        </ul>
                    </li>
                    <li class="nav-label">Etudiants</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
							<span class="nav-text">Etudiants</span>
						</a>
                        <ul aria-expanded="false">
                            <ul aria-expanded="false">
                                    <li><a href="{{url('/dashboard-admin/students/create')}}">Ajouter</a></li>
                                    <li><a href="{{url('/dashboard-admin/students')}}">liste des etudiants</a></li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                  <li class="nav-label">Formations</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                       
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
							<span class="nav-text">Formations</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/dashboard-admin/courses/create')}}">Ajouter</a></li>
							<li><a href="{{url('/dashboard-admin/courses')}}">Liste des formations</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Editions</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                       
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
							<span class="nav-text">Editions</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{url('/dashboard-admin/editions/create')}}">Ajouter</a></li>
							<li><a href="{{url('/dashboard-admin/editions')}}">Editions</a></li>
                        </ul>
                    </li>
                   <li>
                       
                    <li class="nav-label">Inscriptions</li>
                   </li>
                    <li><a href="{{url('dashboard-admin/registrations')}}" class="ai-icon" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                            </g>
                        </svg>
						<span class="nav-text">Liste des prés inscriptions</span>
					</a></li>
                    <li class="nav-label">Inscriptions Finales</li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                                <span class="nav-text">Inscriptiosn finales</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{url('/dashboard-admin/final-registrations/create')}}">Ajouter</a></li>
                                <li><a href="{{url('/dashboard-admin/final-registrations')}}">Liste des inscriptions finales</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Versement</li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                                <span class="nav-text">Versement</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{url('/dashboard-admin/payments/create')}}">Ajouter</a></li>
                                <li><a href="{{url('/dashboard-admin/payments')}}">Liste des versements</a></li>
                            </ul>
                        </li>

                        <li class="nav-label">L'assiduité</li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                                <span class="nav-text">L'assiduité</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{url('dashboard-admin/add-presence-step-one')}}">Ajouter</a></li>
                                <li><a href="{{url('/dashboard-admin/sessions')}}">Liste des séances</a></li>
                            </ul>
                        </li>

                         <li class="nav-label">Employés</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                                <span class="nav-text">Employés</span>
                            </a>
                            <ul aria-expanded="false">
                                <ul aria-expanded="false">
                                        <li><a href="{{url('/dashboard-admin/workers/create')}}">Ajouter</a></li>
                                        <li><a href="{{url('/dashboard-admin/workers')}}">liste des employés</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-label">Versements des salaires</li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                                <span class="nav-text">Versements des salaires</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{url('dashboard-admin/salaries/create')}}">Ajouter</a></li>
                                <li><a href="{{url('/dashboard-admin/salaries')}}">Liste des versements</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Fournisseurs</li>
                        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                                <span class="nav-text">Fournisseurs</span>
                            </a>
                            <ul aria-expanded="false">
                                <ul aria-expanded="false">
                                        <li><a href="{{url('/dashboard-admin/vendors/create')}}">Ajouter</a></li>
                                        <li><a href="{{url('/dashboard-admin/vendors')}}">liste des fournisseurs</a></li>
                                        
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-label">Charges</li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                                <span class="nav-text">Charges</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{url('dashboard-admin/loads/create')}}">Ajouter</a></li>
                                <li><a href="{{url('/dashboard-admin/loads')}}">Liste des charges</a></li>
                            </ul>
                        </li>
                       
                        <li class="nav-label">Emailing</li>
                            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <rect fill="#000000" opacity="0.3" x="4" y="4" width="8" height="16"/>
                                    <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                                <span class="nav-text">Emailing</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{url('dashboard-admin/export-email')}}">Exporter</a></li>
                                
                            </ul>
                        </li>
                    

					<li class="nav-label">Setting</li>
                    <li><a href="#" class="ai-icon" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                            </g>
                        </svg>
						<span class="nav-text">Setting</span>
					</a></li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


        @yield('content')

 		<!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="#" target="_blank">DI <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg> Dev team</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>

     <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('Dashboard/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('Dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('Dashboard/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('Dashboard/js/custom.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('Dashboard/vendor/apexchart/apexchart.js')}}"></script>
	
    <!-- Vectormap -->
	<!-- Chart piety plugin files -->
    <script src="{{asset('Dashboard/vendor/peity/jquery.peity.min.js')}}"></script>
	
    <!-- Chartist -->
    <script src="{{asset('Dashboard/vendor/chartist/js/chartist.min.js')}}"></script>

	<!-- Datatable -->
	<script src="{{asset('Dashboard/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('Dashboard/js/plugins-init/datatables.init.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('Dashboard/js/dashboard/dashboard-1.js')}}"></script>

	<!-- bootstrap-input-spinner -->
	<script src="{{asset('Dashboard/js/bootstrap-input-spinner.js')}}"></script>

	<!-- jquery-number -->
	<script src="{{asset('Dashboard/js/jquery.number.min.js')}}"></script>

	<!-- Svganimation scripts -->
	<script src="{{asset('Dashboard/vendor/svganimation/vivus.min.js')}}"></script>
    <script src="{{asset('Dashboard/vendor/svganimation/svg.animation.js')}}"></script>
	<script src="{{asset('Dashboard/vendor/summernote/js/summernote.min.js')}}"></script>
    <!-- Summernote init -->
    <script src="{{asset('Dashboard/js/plugins-init/summernote-init.js')}}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{{asset('/print/printThis.js')}}"></script>
    <script src="{{asset('Dashboard/uploader/drop_uploader.js')}}"></script>

	<script>


	(function($) {
		"use strict"

		var direction =  getUrlParams('dir');
		if(direction != 'rtl')
		{direction = 'ltr'; }
		
		new dezSettings({
			typography: "roboto",
			version: "light",
			layout: "vertical",
			headerBg: "color_1",
			navheaderBg: "color_3",
			sidebarBg: "color_1",
			sidebarStyle: "full",
			sidebarPosition: "fixed",
			headerPosition: "fixed",
			containerLayout: "wide",
			direction: direction
		}); 

	})(jQuery);	
	</script>



<script>
	
    $(document).ready(function(){
    $('input[type=file]').drop_uploader({
        uploader_text: 'Drop files to upload, or',
        browse_text: 'Browse',
        only_one_error_text: 'Only one file allowed',
        not_allowed_error_text: 'File type is not allowed',
        big_file_before_error_text: 'Files, bigger than',
        big_file_after_error_text: 'is not allowed',
        allowed_before_error_text: 'Only',
        allowed_after_error_text: 'files allowed',
        browse_css_class: 'button button-primary',
        browse_css_selector: 'file_browse',
        uploader_icon: '',
        file_icon: '',
        progress_color: '#4a90e2',
        time_show_errors: 5,
        layout: 'thumbnails',
        method: 'normal',
        chunk_size: 1000000, 
        concurrent_uploads: 5, 
        show_percentage: true, 
        existing_files: false,
        existing_files_removable: true,
        send_existing_files: false,
        url: 'ajax_upload.php',
        delete_url: 'ajax_delete.php',
    });
});
	
    </script>



@stack('modal-add-registration-scripts')
@stack('form-scripts')
@stack('select-instructor-scripts')
@stack('modal-add-final-registration-scripts')
@stack('submite-registration-scripts')
@stack('select-edition-scripts')
@stack('calculat-amount-scripts')
@stack('get-edition-scripts')
@stack('select-student-scripts')
@stack('list-student-scripts')
@stack('show-input-add-student-scripts')
@stack('select-status-scripts')
@stack('export-email-scripts')
@stack('select-course-payment-scripts')
</body>
</html>