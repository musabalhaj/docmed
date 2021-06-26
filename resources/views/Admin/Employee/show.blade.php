@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Employee.index')}}">{{ trans('sentence.Employees')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Profile')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                <a href="{{route('Employee.edit',$Employee->id)}}" class="btn btn-success pull-right">
                    <i class="fa fa-edit"></i>{{ trans('sentence.Edit Information')}}
                </a>
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
                                <h3 class="user-name m-t-0 mb-0">{{ trans('sentence.Name')}} :{{$Employee->name}}</h3><hr>
                                <small class="text-muted">{{ trans('sentence.Jop')}} :{{$Employee->Jop->name}}</small><hr>
                                <div class="staff-id">{{ trans('sentence.Address')}} :{{$Employee->address}}</div><hr>
                                <div class="staff-id">{{ trans('sentence.Marital Status')}} :{{$Employee->MaritalStatus->name}}</div><hr>
                                <div class="staff-id">{{ trans('sentence.Blood Group')}} :{{$Employee->BloodSymbol->name}}</div>
                                <div class="staff-id">.</div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">{{ trans('sentence.Phone')}}:</span>
                                    <span class="text">+249{{$Employee->phone}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.E-mail')}}:</span>
                                    <span class="text">{{$Employee->email}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.Identity Type')}}:</span>
                                    <span class="text">{{$Employee->identity_type}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.Identity Number')}}:</span>
                                    <span class="text">{{$Employee->identity_number}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.Gender')}}:</span>
                                    <span class="text">{{$Employee->Gender->name}}</span>
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
