@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Appointment List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Appointment.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i>{{ trans('sentence.New Appointment')}}
        </a>
        <h4>{{ trans('sentence.Appointment List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table  class="datatable table table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Doctor')}}</th>
                        <th>{{ trans('sentence.Appointment Date')}}</th>
                        <th>{{ trans('sentence.Status')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody id="auto">
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
                    <td>{{Carbon\Carbon::parse($Appointment->date)->toFormattedDateString()}}</td>                 
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
                                <a class="dropdown-item" href="{{route('Appointment.edit',$Appointment->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i>{{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Appointment.destroy',$Appointment->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item confirm">
                                       <i class="fa fa-trash m-r-5"></i>{{ trans('sentence.Delete')}}
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
