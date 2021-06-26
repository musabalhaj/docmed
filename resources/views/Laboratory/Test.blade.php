@extends('layouts.user')

@section('content')
<div class="card card-box">
  <div class="card-body">
      <div class="custom-form">
        <h4>{{ trans('sentence.Tests Result')}}</h4>
        <hr>
        <form method="post" action="{{route('AppointmentStoreTestResult')}}" enctype="multipart/form-data">
          @csrf
          <input type="text" value="{{$appointment_id->id}}" hidden name="appointment_id" id="appointment_id">
          @php
            $TestInfo = DB::table('test_infos')->where('appointment_id',$appointment_id->id)->get();
          @endphp
          @foreach ($TestInfo as $info)
            @foreach ($Tests as $test)
              @if ($test->id == $info->test_id)
              <input type="text" name="test_id[]" id="test_id[]" hidden value="{{$info->test_id}}">
                <div class="form-group row">
                    <label for="result" class="col-sm-2 col-form-label">
                      {{$test->name}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="result[]" id="result[]" 
                        required autocomplete="off" value="{{old('Result')}}">
                    </div>
                </div>
              @endif
            @endforeach 
          @endforeach   
          <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                  <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">
              </div>
          </div>      
        </form>
      </div>
    </div>
</div>
@endsection
