@extends('layouts.master')

@section('content')
<div class="card-box">
    <div class="card-block">
        <h4>{{ trans('sentence.Today Appointments List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="datatable table table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Note')}}</th>
                        <th>{{ trans('sentence.Tests')}}</th>
                        <th>{{ trans('sentence.Tests Result')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Appointments as $v=>$Appointment)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{$Appointment->name}}</td>                
                    <td>
                        @if (empty($Appointment->note))
                        {{ trans('sentence.Not Available')}}
                        @endif
                        {{$Appointment->note}}
                    </td>
                    <td>
                        @php
                        $TestInfo = DB::table('test_infos')->where('appointment_id',$Appointment->id)->get();
                        @endphp
                        @if (empty($TestInfo))
                            {{ trans('sentence.Not Available')}}
                        @endif
                        @foreach ($TestInfo as $info)
                            @foreach ($Tests as $test)
                                @if ($test->id == $info->test_id)
                                        {{$test->name}}<br>
                                @endif
                            @endforeach 
                        @endforeach
                    </td>
                    <td>
                      @php
                        $TestResult = DB::table('test_infos')->where('appointment_id',$Appointment->id)->get();
                      @endphp
                      @if (empty($TestInfo))
                        {{ trans('sentence.Not Available')}}
                      @endif
                      @foreach ($TestResult as $result)
                        @foreach ($Tests as $test)
                            @if ($test->id == $result->test_id)
                                {{$result->result}}<br>
                            @endif
                        @endforeach 
                      @endforeach
                    </td>                
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('AppointmentTest',$Appointment->id)}}">
                                    {{ trans('sentence.Transfer To Lab')}}
                                </a>
                                <a class="dropdown-item" href="{{route('AppointmentDiagnos',$Appointment->id)}}">
                                  {{ trans('sentence.Transfer To Accountant')}}
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
