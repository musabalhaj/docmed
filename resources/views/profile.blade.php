@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Profile')}}</li>
        </ol>
    </nav>
</h6>
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
<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <h4 class="page-title">{{ trans('sentence.Profile')}}</h4><hr>
                <div class="profile-img-wrap">
                    <div class="profile-img">
                        <img class="avatar" src="{{asset('images/icon.png')}}" alt="">
                    </div>
                </div>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                                <h3 class="user-name m-t-0 mb-0">
                                    {{ trans('sentence.Name')}} :{{auth()->user()->name}}
                                </h3><hr>
                                <div class="staff-id">
                                    {{ trans('sentence.Address')}} :{{auth()->user()->address}}
                                </div><hr>
                                <div class="staff-id">
                                    {{ trans('sentence.Marital Status')}} :
                                    @foreach ($MaritalStatus as $Marital)
                                        @if ($Marital->id == auth()->user()->maritalstatus_id )
                                            {{$Marital->name}}
                                        @endif
                                    @endforeach
                                </div><hr>
                                <div class="staff-id">
                                    {{ trans('sentence.Blood Group')}} :
                                    @foreach ($BloodSymbol as $Blood)
                                        @if ($Blood->id == auth()->user()->bloodsymbol_id )
                                            {{$Blood->name}}
                                        @endif
                                    @endforeach
                                </div><hr>
                                <div class="staff-id">
                                    {{ trans('sentence.Gender')}} :
                                    @foreach ($Gender as $gender)
                                        @if ($gender->id == auth()->user()->gender_id )
                                            {{$gender->name}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">{{ trans('sentence.Phone')}}:</span>
                                    <span class="text">+249{{auth()->user()->phone}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.E-mail')}}:</span>
                                    <span class="text">{{auth()->user()->email}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.Identity Type')}}:</span>
                                    <span class="text">{{auth()->user()->identity_type}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.Identity Number')}}:</span>
                                    <span class="text">{{auth()->user()->identity_number}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>
@endsection
