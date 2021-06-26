@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
        <div class="dash-widget">
            <span class="dash-widget-bg3"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3><i class="fa fa-check" aria-hidden="true"></i> {{ $DoneAppointment->count()}}</h3>
                <span class="widget-title3">{{ trans('sentence.Done Appointments')}}</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3><i class="fa fa-check" aria-hidden="true"></i> {{ $Appointments->count()}}</h3>
                <span class="widget-title4">{{ trans('sentence.Pending Appointments')}}</span>
            </div>
        </div>
    </div>
    
</div>

<div class="card-box">
    <div class="card-block">
        <h4><i class="fa fa-calendar"></i> {{ trans('sentence.Today Appointments')}}
        <a href="{{route('Appointment.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus" ></i> {{ trans('sentence.Add Appointment')}}</a>
        </h4><hr>
        <div class="table-responsive">
            <table class="datatable table table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Doctor')}}</th>
                        <th>{{ trans('sentence.Services')}}</th>
                        <th>{{ trans('sentence.Status')}}</th>
                        <th>{{ trans('sentence.Appointment Date')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Appointments as $v=>$Appointment)
                <tr>
                    <td>{{$v+1}}</td>
                    <td><a href="{{route('Appointment.show',$Appointment->id)}}">{{$Appointment->name}}</a></td>                
                    <td>
                        @if (!empty($Appointment->doctor_id))
                        @foreach ($Doctor as $Doc)
                            @if ($Appointment->doctor_id == $Doc->id)
                                {{$Doc->name}}
                            @endif
                        @endforeach
                        @else
                        {{ trans('sentence.Not Available')}}
                        @endif
                    </td>
                    <td>
                        @foreach ($ServiceInfo as $Info)
                            @if ($Appointment->id == $Info->appointment_id)
                                @foreach ($Service as $ser)
                                    @if ($ser->id == $Info->service_id)
                                        @if (!empty($Info->service_id))
                                            {{$ser->name}}
                                        @else
                                            {{ trans('sentence.Not Available')}}
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if ($Appointment->status == 0)
                        <span class="badge badge-danger">{{ trans('sentence.Pending')}}</span>
                        @elseif ($Appointment->status == 1)
                        <span class="badge badge-primary">{{ trans('sentence.With Doctor')}}</span>
                        @elseif ($Appointment->status == 2)
                        <span class="badge badge-info">{{ trans('sentence.With Laborotrist')}}</span>
                        @elseif ($Appointment->status == 3)
                        <span class="badge badge-info">{{ trans('sentence.With Accountant')}}</span>
                        @elseif ($Appointment->status == 4)
                        <span class="badge badge-info">{{ trans('sentence.With Pharmacist')}}</span>
                        @elseif ($Appointment->status == 5)
                        <span class="badge badge-success">{{ trans('sentence.Done')}}</span>
                        @endif
                    </td> 
                    <td>{{Carbon\Carbon::parse($Appointment->date)->toFormattedDateString()}}</td>                 
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if ($Appointment->status == 0)
                                <a class="dropdown-item" href="{{route('ActiveAppointment',$Appointment->id)}}">
                                    @if (!empty($Appointment->doctor_id))
                                        <i class="fa fa-check"></i>{{ trans('sentence.Refer To Doctor')}}
                                    @else 
                                        <i class="fa fa-check"></i>{{ trans('sentence.Transfer')}}
                                    @endif
                                </a>
                                @endif
                                {{--  <a class="dropdown-item" href="{{route('Appointment.edit',$Appointment->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>  --}}
                                <form method="POST" action="{{route('Appointment.destroy',$Appointment->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item confirm">
                                       <i class="fa fa-trash m-r-5"></i> {{ trans('sentence.Delete')}}
                                    </button>
                                </form>
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
