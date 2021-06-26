@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Patients Report')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <form method="get" action="{{route('PatientReport')}}" enctype="multipart/form-data">
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
            <table class="table  table-light table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Patient Name')}}</th>
                        <th>{{ trans('sentence.Doctor')}}</th>
                        {{--  <th>{{ trans('sentence.Services')}}</th>  --}}
                        <th>{{ trans('sentence.Tests')}}</th>
                        <th>{{ trans('sentence.Tests Result')}}</th>
                        <th>{{ trans('sentence.Diagnos')}}</th>
                        <th>{{ trans('sentence.Tretment')}}</th>
                        <th>{{ trans('sentence.Appointment Date')}}</th>
                        @if (auth()->user()->role == 1)
                        <th>{{ trans('sentence.Bill')}}</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Patients))
                    @foreach ($Patients as $v=>$Patient)
                    <tr>
                        <td>{{$v+1}}</td>
                        <td>{{$Patient->name}}</td>                
                        <td>
                            @foreach ($Doctor as $Doc)
                                @if ($Patient->doctor_id == $Doc->id)
                                    @if(!empty($Doc->name))
                                        {{$Doc->name}}
                                    @else
                                        {{ trans('sentence.Not Available')}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        {{--  <td>
                            @foreach ($ServiceInfo as $Service)
                                @if ($Patient->id == $Service->appointment_id)
                                    @foreach ($Services as $Ser)
                                    @if ($Ser->id == $Service->service_id)
                                       @if(!empty($ServiceInfo))
                                            {{$Ser->name}}<br>
                                        @else
                                            {{ trans('sentence.Not Available')}}
                                        @endif
                                    @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>  --}}
                        <td>
                            @foreach ($TestInfo as $Test)
                                @if ($Patient->id == $Test->appointment_id)
                                    @foreach ($Tests as $Tst)
                                    @if ($Tst->id == $Test->test_id)
                                       @if(!empty($Tst->name))
                                            {{$Tst->name}}<br>
                                        @else
                                            {{ trans('sentence.Not Available')}}
                                        @endif
                                    @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($TestInfo as $Test)
                                @if ($Patient->id == $Test->appointment_id)
                                    @if(!empty($Test->result))
                                        {{$Test->result}}<br>
                                    @else
                                        {{ trans('sentence.Not Available')}}
                                    @endif     
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($Diagnos as $diagnos)
                                @if ($Patient->id == $diagnos->appointment_id)
                                    @if(!empty($diagnos->diagnos))
                                        {{$diagnos->diagnos}}
                                    @else
                                        {{ trans('sentence.Not Available')}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($Diagnos as $diagnos)
                                @if ($Patient->id == $diagnos->appointment_id)
                                    @if(!empty($diagnos->tretment))
                                        {{$diagnos->tretment}}
                                    @else
                                        {{ trans('sentence.Not Available')}}
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td>{{Carbon\Carbon::parse($Patient->date)->toFormattedDateString()}}</td>
                        @if (auth()->user()->role == 1)
                        <td><a target="_blank" href="{{route('PatientBill',$Patient->id)}}">{{ trans('sentence.Bill')}}-{{$v+1}}</a></td>                                      
                        @endif
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
