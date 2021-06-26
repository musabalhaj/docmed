@extends('layouts.user')

@section('content')
<div class="card-box col-sm-12">
    <div class="card-block">
        <h4>{{ trans('sentence.Patients List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="datatable table table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Diagnos')}}</th>
                        <th>{{ trans('sentence.Tretment')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Appointments as $v=>$Appointment)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{$Appointment->name}}</td>                
                    @php
                      $Diagnos = DB::table('diagnos')->where('appointment_id',$Appointment->id)->get();
                    @endphp
                    @foreach ($Diagnos as $diagnos)
                    <td>
                        {{$diagnos->diagnos}}
                    </td>                
                    <td>
                        {{$diagnos->tretment}}
                    </td>                
                    @endforeach
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('AppointmentTretment',$Appointment->id)}}">
                                    {{ trans('sentence.Done')}}
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
