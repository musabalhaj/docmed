@extends('layouts.frontend')

@section('content')
<!doctype html>
<html class="no-js" lang="zxx">
    <style> * { font-family: 'Segoe UI Semibold', sans-serif !important; } </style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ trans('sentence.Abdel Moneim Medical Center')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <div class="top-right links">
                                    <a href="{{ url('/') }}">{{ trans('sentence.Home')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul class="nav user-menu float-right">              
                                    <li class="nav-item dropdown has-arrow">
                                        <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                                            {{ trans('frontend.Language')}}
                                        </a>
                                        <div class="dropdown-menu" style="margin-left:0px !important" >
                                            <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>
                    
                                            <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                                        </div>
                                    </li>
                                </ul>
                                <ul>
                                    <li><a href="mailto:abdelmoniem@gmail.com" class="boxed-btn3-info">abdelmoniem@gmail.com</a></li>
                                    <li><a href="tel:+249-1176-82813" class="boxed-btn3-info">+249-1176-82813</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{asset('img/logo.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a href="{{route('MakeAppointment')}}">{{ trans('frontend.Make an Appointment')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="{{asset('img/about/1.png')}}" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="{{asset('img/about/2.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2 style="font-size: 27px !important;">{{ trans('frontend.Welcome to Abdel Moneim Medical Center')}}</h2>
                        <h3>{{ trans('frontend.Best Care For Your Good Health')}}<br></h3>
                        <p style="font-size: 23px !important;">
                        {{ trans('frontend.For Every Disease Known to cause there is a cure and reassurance is half medicine. you can find here whenever you need to guarantee an Appointment with one of our certified doctors with details on opening times and even booking rates Book and rest assured!')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->

    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>{{ trans('frontend.Our Departments')}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    $Departments = DB::table('departments')->where('status',1)->get();
                @endphp
                @foreach ($Departments as $v=>$Department)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department">
                            <div class="department_thumb">
                                <img src="{{asset('img/department')}}/{{$v+1}}.jpg" alt="{{asset('img/department/70.jpg')}}">
                            </div>
                            <div class="department_content text-center">
                                <h3>{{$Department->name}}</h3>
                            </div>
                        </div>
                    </div>   
                @endforeach
            </div>
        </div>
    </div>
    <!-- offers_area_end -->


    <!-- business_expert_area_start  -->
    <div class="business_expert_area" dir="rtl">
        <div class="business_tabs_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                            aria-selected="true">{{ trans('frontend.Excellent Services')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                            aria-selected="false">{{ trans('frontend.Qualified Doctors')}}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                            aria-selected="false">{{ trans('sentence.Tests')}}</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="Schedule-tab" data-toggle="tab" href="#Schedule" role="tab" aria-controls="Schedule"
                            aria-selected="false">{{ trans('sentence.Doctors Schedule')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="border_bottom">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info table-responsive">
                                    <div class="icon">
                                        {{--  <i class="flaticon-first-aid-kit"></i>  --}}
                                    </div>
                                    @php
                                        $Services = DB::table('services')->where('status',1)->get();
                                    @endphp
                                    <h3>{{ trans('sentence.Services List')}}</h3>
                                    <p>
                                        <table class="table datatable table-light table-hover custom-table">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th>{{ trans('sentence.Name')}}</th>
                                                    <th>{{ trans('sentence.Price')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Services as $Service)
                                                    <tr>
                                                        <td>{{$Service->name}}</td>
                                                        <td>$ {{$Service->price}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="{{asset('img/department/40.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div class="icon">
                                        {{--  <i class="flaticon-first-aid-kit"></i>  --}}
                                    </div>
                                    <p>
                                    @php
                                        $Doctors = DB::table('users')->where('role',2)->get();
                                    @endphp
                                    @php
                                        $Department = DB::table('departments')->get();
                                    @endphp
                                    <h3>{{ trans('sentence.Doctors List')}}</h3>
                                    <p>
                                        <table class="table datatable table-light table-hover custom-table">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th>{{ trans('sentence.Name')}}</th>
                                                    <th>{{ trans('sentence.Department')}}</th>
                                                    <th>{{ trans('sentence.Appointment Price')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Doctors as $Doctor)
                                                    <tr>
                                                        <td>{{$Doctor->name}}</td>
                                                        <td>
                                                            @foreach ($Department as $dept)
                                                                @if ($dept->id == $Doctor->department_id)
                                                                    {{$dept->name}}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>${{$Doctor->doctor_price}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="{{asset('img/department/120.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div class="icon">
                                        {{--  <i class="flaticon-first-aid-kit"></i>  --}}
                                    </div>
                                    <p>
                                        @php
                                            $Tests = DB::table('tests')->where('status',1)->get();
                                        @endphp
                                    <h3>{{ trans('sentence.Tests List')}}</h3>
                                    <p>
                                        <table class="table datatable table-light table-hover custom-table">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th>{{ trans('sentence.Name')}}</th>
                                                    <th>{{ trans('sentence.Description')}}</th>
                                                    <th>{{ trans('sentence.Price')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Tests as $Test)
                                                    <tr>
                                                        <td>{{$Test->name}}</td>
                                                        <td>{{$Test->description}}</td>
                                                        <td>${{$Test->price}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="{{asset('img/department/50.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Schedule" role="tabpanel" aria-labelledby="Schedule-tab">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6">
                                <div class="business_info">
                                    <div class="icon">
                                        {{--  <i class="flaticon-first-aid-kit"></i>  --}}
                                    </div>
                                    <p>
                                        @php
                                            $Schedules = DB::table('schedules')->where('status',1)->get();
                                        @endphp
                                    <h3>{{ trans('sentence.Schedules List')}}</h3>
                                    <p>
                                        <table class="table datatable table-light table-hover custom-table">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th>{{ trans('sentence.Doctor')}}</th>
                                                    <th>{{ trans('sentence.Available Days')}}</th>
                                                    <th>{{ trans('sentence.Start At')}}</th>
                                                    <th>{{ trans('sentence.End At')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Schedules as $Schedule)
                                                    <tr>
                                                        <td>@foreach ($Doctors as $Doc)
                                                            @if ($Doc->id == $Schedule->doctor_id)
                                                                {{$Doc->name}}
                                                            @endif
                                                        @endforeach
                                                        </td>
                                                        <td>
                                                            @if (!$Schedule->days == 0)
                                                                @foreach (json_decode($Schedule->days) as $day)
                                                                    {{$day.','}}
                                                                @endforeach    
                                                            @endif                        
                                                        </td>
                                                        <td>{{$Schedule->start_at}}</td>
                                                        <td>{{$Schedule->end_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="business_thumb">
                                    <img src="{{asset('img/department/60.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- business_expert_area_end  -->


    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="conatiner-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_1 overlay_skyblue">
                        <div class="info_button mr-5">
                            <a href="tel:+249-1176-82813" class="boxed-btn3-white">+249-1176-82813</a>
                        </div><br>
                        <div class="info" >
                            <h3 >{{ trans('frontend.For Any Emergency Contact')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="single_emergency d-flex align-items-center justify-content-center emergency_bg_2 overlay_skyblue">
                        
                        <div class="info_button mr-5">
                            <a href="{{route('MakeAppointment')}}" class="boxed-btn3-white">{{ trans('frontend.Make an Appointment')}}</a>
                        </div>
                        <div class="info">
                            <h3>{{ trans('frontend.Make an Online Appointment')}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->

    <!-- JS here -->
    <script src="{{ asset('frontend/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/ajax-form.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/scrollIt.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/nice-select.min.js') }}"></script>
    <script src="j{{ asset('frontend/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/gijgo.min.js') }}"></script>
    <!--contact js-->
    <script src="{{ asset('frontend/js/contact.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/mail-script.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
@endsection