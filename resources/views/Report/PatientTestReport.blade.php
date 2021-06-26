@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Patients Tests Report')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <form method="get" action="{{route('PatientTestReport')}}" enctype="multipart/form-data">
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
                        <th>{{ trans('sentence.Tests')}}</th>
                        <th>{{ trans('sentence.Tests Result')}}</th>
                        <th>{{ trans('sentence.Date')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Patients))
                    @foreach ($Patients as $v=>$Patient)
                    <tr>
                        <td>{{$v+1}}</td>
                        <td>{{$Patient->name}}</td>                
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
                        <td>{{Carbon\Carbon::parse($Patient->date)->toFormattedDateString()}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
