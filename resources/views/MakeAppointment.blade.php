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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
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
                                <a href="{{ url('/') }}">{{ trans('sentence.Home')}}</a>
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
        </div>
    </header>
    <!-- header-end -->

<div class="container welcome_docmed_area white-popup-block" dir="auto">
    <form method="post" action="{{route('MakeAppointmentStore')}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-box col-sm-12" style="margin-top: -90px;">
        <div class="card-body">
            <div class="row custom-form">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="name" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Name')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" id="name" 
                        required autocomplete="off" value="{{old('name')}}">
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="address" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Address')}}<span class="star">*</span>
                        </label>                       
                        <input type="text" class="form-control" name="address" id="address" 
                        required autocomplete="off" value="{{old('address')}}">                       
                    </div>
                </div>
                
                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="email" class="col-sm-6 col-form-label">
                            {{ trans('sentence.E-mail')}}<span class="star">*</span>
                        </label>                        
                        <input type="email" class="form-control" name="email" id="email" 
                        required autocomplete="off" value="{{old('email')}}">                       
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Phone')}}<span class="star">*</span>
                        </label>                       
                        <input type="text" class="form-control" name="phone" id="phone" 
                        required autocomplete="off" maxlength="10" value="{{old('phone')}}">                        
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="date" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Appointment Date')}}<span class="star">*</span>
                        </label>                        
                        <input type="date" class="form-control" name="date" id="date"
                        required autocomplete="off" value="{{old('date')}}">                        
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="form-group row">
                        <label for="doctor_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Doctor')}}<span class="star">*</span>
                        </label>                     
                        <select class="custom-select mr-sm-2" id="doctor_id" name="doctor_id">
                            <option></option>
                            @foreach($Doctor as $Doctor)
                                <option value="{{$Doctor->id}}">{{$Doctor->name}}</option>
                            @endforeach
                        </select>                      
                    </div>
                </div>

                <div class="col-md-6 col-sm-6" id="add_fields">
                    <div class="form-group row">
                        <label for="account_num" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Account Number')}}<span class="star">*</span>
                        </label>                        
                        <input type="text" class="form-control" name="account_num" id="account_num"
                        autocomplete="off" 
                        value="{{old('account_num')}}">                        
                    </div>
                </div>

                <div class="col-md-6 col-sm-6" id="add_fields">
                    <div class="form-group row">
                        <label for="password" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Password')}}<span class="star">*</span>
                        </label>                        
                        <input type="password" class="form-control" name="password" id="password"
                        autocomplete="off" 
                        value="{{old('password')}}">                        
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="note" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Note')}}
                        </label>                        
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control" autocomplete="off" >
                        </textarea>                        
                    </div>
                </div>
                
            </div>

            <div class="col-12">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label"></label>                    
                    <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('frontend.Booking')}}">                    
                </div>
            </div>
            
        </div>
    </div>
    </form>
</div>
@if($errors->any())
    <div class="alert alert-danger">
      <ul class="list-group">
        @foreach($errors->all() as $error)
          <li class="list-gorup-item">
           {{$error}}
          </li>
        @endforeach
      </ul>
    </div>
@endif
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