@extends('layouts.app')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{asset('images/1.png')}});">
                <span class="login100-form-title-1">
                    Login
                </span>
            </div>

            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="E-mali is required">
                    <span class="label-input100">{{ trans('sentence.E-mail')}}</span>
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">{{ trans('sentence.Password')}}</span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <span class="focus-input100"></span>
                </div>

                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            {{ trans('sentence.Remember me')}}
                        </label>
                    </div>

                    {{--  <div>
                        @if (Route::has('password.request'))
                            <a class="txt1" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>  --}}
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ trans('sentence.Login')}} 
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
