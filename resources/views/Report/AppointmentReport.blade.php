@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Appointments Report')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <form method="get" action="{{route('AppointmentReport')}}" enctype="multipart/form-data">
            <div class="custom-form search">
                <div class="form-group">
                        <label for="search">{{ trans('sentence.From')}}</label>
                        <input type="date" class="custom-form" name="search" id="search" 
                        required autocomplete="off" value="{{old('search')}}">

                        <label for="to">{{ trans('sentence.To')}}</label>
                        <input type="date" class="custom-form" name="to" id="to" 
                        required autocomplete="off" value="{{old('to')}}">

                        <input type="submit" class=" btn btn-primary" 
                        value="{{ trans('sentence.Search')}}">
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-light table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Doctor')}}</th>
                        <th>{{ trans('sentence.Appointment Date')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Appointments))
                    @foreach ($Appointments as $v=>$Appointment)
                    <tr>
                        <td>{{$v+1}}</td>
                        <td><a href="{{route('Appointment.show',$Appointment->id)}}">{{$Appointment->name}}</a></td>                
                        <td>
                            @foreach ($Doctor as $Doc)
                                @if ($Appointment->doctor_id == $Doc->id)
                                    {{$Doc->name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{Carbon\Carbon::parse($Appointment->date)->toFormattedDateString()}}</td>                                      
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
