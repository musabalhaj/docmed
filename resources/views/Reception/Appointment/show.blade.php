@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Appointment.index')}}">{{ trans('sentence.Appointments')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Appointment Informations')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box profile-header">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-view">
                    <a href="{{route('Appointment.edit',$Appointment->id)}}" class="btn btn-success pull-right">
                        <i class="fa fa-edit"></i> {{ trans('sentence.Edit Information')}}
                    </a>
                <h4 class="page-title">{{ trans('sentence.Appointment Informations')}}</h4><hr>
                <div class="profile-basic">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="profile-info-left">
                                <h3 class="user-name m-t-0 mb-0">{{ trans('sentence.Name')}}: {{$Appointment->name}}</h3><hr>
                                <div class="staff-id">{{ trans('sentence.Address')}} :{{$Appointment->address}}</div><hr>
                                <div class="staff-id">{{ trans('sentence.Appointment Date')}} :
                                    {{Carbon\Carbon::parse($Appointment->date)->toFormattedDateString()}}
                                </div><hr>
                                <div class="staff-id">{{ trans('sentence.Doctor')}} :
                                    @foreach ($Doctor as $Doc)
                                        @if ($Doc->id == $Appointment->doctor_id)
                                            {{$Doc->name}}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <ul class="personal-info">
                                <li>
                                    <span class="title">{{ trans('sentence.Phone')}}:</span>
                                    <span class="text">{{$Appointment->phone}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.E-mail')}}:</span>
                                    <span class="text">{{$Appointment->email}}</span>
                                </li><hr>
                                <li>
                                    <span class="title">{{ trans('sentence.Note')}}:</span>
                                    @if (empty($Appointment->note))
                                        There Is No Note !
                                    @else
                                        <span class="text">{{$Appointment->note}}</span>
                                    @endif
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
