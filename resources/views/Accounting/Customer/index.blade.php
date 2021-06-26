@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Customer')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <div class="table-responsive">
            <table class="datatable table table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Date')}}</th>
                        <th>{{ trans('sentence.Bill')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Appointments as $v=>$Appointment)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{$Appointment->name}}</td>                
                    <td>{{Carbon\Carbon::parse($Appointment->date)->toFormattedDateString()}}</td>
                    <td><a target="_blank" href="{{route('PatientBill',$Appointment->id)}}">{{ trans('sentence.Bill')}}-{{$v+1}}</a></td>                  
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Customer.show',$Appointment->id)}}">
                                    {{ trans('sentence.Payment')}}
                                </a>
                            </div>
                        </div>
                    </td>                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
