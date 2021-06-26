<div class="content" style="padding: 0 20px; display: contents !important">
  <div class="container">       
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
</div>
      @yield('content')
</div>
