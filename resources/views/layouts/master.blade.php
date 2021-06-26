@include('layouts.header')
<body>
  <div id="app"> 
    @include('layouts.navbar')        
    @auth
    <div class="main-wrapper">
      <div class="page-wrapper">
        <div class="content">
      @include('layouts.sidebar')

      @if (session()->has('success'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            <i class="fa fa-check fa-lg"></i>  {{ trans('sentence.'.session()->get('success').'')}}  
        </div>    
      @endif
      @if (session()->has('error'))
          <div class="alert alert-danger  alert-dismissible fade show " role="alert">
            {{ trans('sentence.'.session()->get('error').'')}}  <i class="fa fa-thumbs-down fa-lg"></i>
          </div>    
      @endif
        @yield('content')
      
  
        @else
        @yield('content')
     @endauth
    </div>
      </div>
  </div>
  </div>
</body>
@include('layouts.footer')

