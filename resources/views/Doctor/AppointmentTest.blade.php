@extends('layouts.master')

@section('content')
<div class="card-box">
    <div class="card-block">
        <h4 class="text-center">{{ trans('sentence.Tests')}}</h4>
        <hr>
        <form method="post" action="{{route('AppointmentStoreTest')}}" enctype="multipart/form-data">
          @csrf
          <input type="text" value="{{$appointment_id->id}}" hidden name="appointment_id" id="appointment_id">
          <div class="col-12">
              <div class="form-group row multipleSelect">
                
                <select required multiple class="custom-select col-12 mr-sm-2 multiple" id="test_id[]" name="test_id[]">
                    <option></option>
                    @foreach($Tests as $test)
                        <option value="{{$test->id}}">{{$test->name}}</option>
                    @endforeach
                </select>  
              </div>
            </div>
              <div class="col-12">
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-6 col-form-label"></label>               
                  <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">                    
                </div>
              </div>
        </form>
    </div>
</div>
@endsection
