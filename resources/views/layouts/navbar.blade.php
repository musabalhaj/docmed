@php $locale = session()->get('locale'); @endphp
@if (Auth()->user()->role== 1) {{--  if user admin  --}}
@if (str_replace('_', '-', app()->getLocale()) == 'en')
<div class="header">
    <div class="header-left">
        <a href="{{ url('/home') }}" class="logo">
            <img src="{{asset('images/icon.png')}}" width="50" height="50" alt=""> <span>{{ trans('sentence.Abdel Moneim Medical Center')}}</span>
        </a>
    </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
              
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{asset('images/user.png')}}" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/profile') }}">{{ trans('sentence.My Profile')}}</a>

                    <a class="dropdown-item" href="{{ url('/setting') }}">{{ trans('sentence.Settings')}}</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form-1').submit();">
                                                    {{ trans('sentence.Logout') }}
                    </a>
                    <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

            <ul class="nav user-menu float-right">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>

          <div class="dropdown mobile-user-menu float-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('profile') }}">{{ trans('sentence.My Profile')}}</a>
                  <a class="dropdown-item" href="{{ url('/setting') }}">{{ trans('sentence.Settings')}}</a>
                  <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                 
                  <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form-2').submit();">
                            {{ trans('sentence.Logout')}}
                </a>
                <form id="logout-form-2" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>

              <ul class="nav user-menu float-right">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>
          </div>

</div>
@elseif (str_replace('_', '-', app()->getLocale()) == 'ar')  
<div class="header">
    <div class="header-right">
        <a href="{{ url('/home') }}" class="logo">
            <img src="{{asset('images/icon.png')}}" width="50" height="50" alt=""> <span>{{ trans('sentence.Abdel Moneim Medical Center')}}</span>
        </a>
    </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-left">
              
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{asset('images/user.png')}}" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/profile') }}">{{ trans('sentence.My Profile')}}</a>

                    <a class="dropdown-item" href="{{ url('/setting') }}">{{ trans('sentence.Settings')}}</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form-1').submit();">
                                                    {{ trans('sentence.Logout') }}
                    </a>
                    <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

            <ul class="nav user-menu float-left">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>

          <div class="dropdown mobile-user-menu float-left">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-left">
                  <a class="dropdown-item" href="{{ route('profile') }}">{{ trans('sentence.My Profile')}}</a>
                  <a class="dropdown-item" href="{{ url('/setting') }}">{{ trans('sentence.Settings')}}</a>
                  <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                 
                  <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form-2').submit();">
                            {{ trans('sentence.Logout')}}
                </a>
                <form id="logout-form-2" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>

              <ul class="nav user-menu float-left">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>
          </div>
</div>  
@endif

@else {{--  if user not admin  --}}
@if (str_replace('_', '-', app()->getLocale()) == 'en')
<div class="header">
    <div class="header-left">
        <a href="{{ url('/home') }}" class="logo">
            <img src="{{asset('images/icon.png')}}" width="50" height="50" alt=""> <span>{{ trans('sentence.Abdel Moneim Medical Center')}}</span>
        </a>
    </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
              
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{asset('images/user.png')}}" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/profile') }}">{{ trans('sentence.My Profile')}}</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form-1').submit();">
                                                    {{ trans('sentence.Logout') }}
                    </a>
                    <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

            <ul class="nav user-menu float-right">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>

          <div class="dropdown mobile-user-menu float-right">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('profile') }}">{{ trans('sentence.My Profile')}}</a>
                  <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                 
                  <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form-2').submit();">
                            {{ trans('sentence.Logout')}}
                </a>
                <form id="logout-form-2" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>

              <ul class="nav user-menu float-right">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>
          </div>

</div>
@elseif (str_replace('_', '-', app()->getLocale()) == 'ar')  
<div class="header">
    <div class="header-right">
        <a href="{{ url('/home') }}" class="logo">
            <img src="{{asset('images/icon.png')}}" width="50" height="50" alt=""> <span>{{ trans('sentence.Abdel Moneim Medical Center')}}</span>
        </a>
    </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-left">
              
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="{{asset('images/user.png')}}" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/profile') }}">{{ trans('sentence.My Profile')}}</a>
                    
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form-1').submit();">
                                                    {{ trans('sentence.Logout') }}
                    </a>
                    <form id="logout-form-1" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

            <ul class="nav user-menu float-left">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>

          <div class="dropdown mobile-user-menu float-left">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu dropdown-menu-left">
                  <a class="dropdown-item" href="{{ route('profile') }}">{{ trans('sentence.My Profile')}}</a>
                  <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>
                  <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                 
                  <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form-2').submit();">
                            {{ trans('sentence.Logout')}}
                </a>
                <form id="logout-form-2" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>

              <ul class="nav user-menu float-left">              
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('lang/ar')}}">العربية</a>

                        <a class="dropdown-item" href="{{url('lang/en')}}">English</a>
                    </div>
                </li>
            </ul>
          </div>
</div>  
@endif
@endif