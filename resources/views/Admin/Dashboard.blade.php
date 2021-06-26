@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
        <div class="dash-widget">
            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
            <a href="{{route('Doctor.index')}}">
                <div class="dash-widget-info text-right">
                    <h3>{{$Doctor->count()}}</h3>
                    <span class="widget-title1">{{ trans('sentence.Doctors')}} <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
        <div class="dash-widget">
            <span class="dash-widget-bg3"><i class="fa fa-users" aria-hidden="true"></i></span>
            <a href="{{route('Employee.index')}}">
                <div class="dash-widget-info text-right">
                    <h3>{{$Employee->count()}}</h3>
                    <span class="widget-title3">{{ trans('sentence.Employees')}} <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </a>
        </div>
    </div>
    
</div>

<div class="row"> 
    <div class="col-md-6 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-server"></i> {{ trans('sentence.Newest Services')}}     
                <a href="{{route('Service.index')}}" class="btn btn-primary btn-sm pull-right">{{ trans('sentence.View All')}}</a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                    <thead>
                    <tr class="bg-primary">
                    <th scope="col">{{ trans('sentence.Name')}}</th>
                    <th scope="col">{{ trans('sentence.Price')}}</th>
                    <th scope="col">{{ trans('sentence.Activeted')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($Services as $Service)
                    <tr>
                        <td>{{$Service->name}}</td>
                        <td>${{$Service->price}}</td>
                        <td>
                            @if ($Service->status == 0)
                            <span class="badge badge-danger">{{ trans('sentence.No')}}</span>
                            @else
                            <span class="badge badge-success">{{ trans('sentence.Yes')}}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-calendar"></i> {{ trans('sentence.Newest Appointments')}}     
                <a href="{{route('Appointment.index')}}" class="btn btn-primary btn-sm pull-right">{{ trans('sentence.View All')}}</a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                    <thead>
                    <tr class="bg-primary">
                    <th scope="col">{{ trans('sentence.Name')}}</th>
                    <th scope="col">{{ trans('sentence.Date')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($Appointment as $Appointment)
                    <tr>
                    <td><a href="{{route('Appointment.show',$Appointment->id)}}">{{$Appointment->name}}</a></td>
                    <td>{{Carbon\Carbon::parse($Appointment->date)->toFormattedDateString()}}</td>
                   
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
