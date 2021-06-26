@extends('layouts.master')

@section('content')
<div class="card-box">
    <div class="card-block">
        <h4 class="text-center">{{ trans('sentence.Diagnos And Tretment')}}</h4>
        <hr>
        <form method="post" action="{{route('AppointmentStoreDiagnos')}}" enctype="multipart/form-data">
          <input type="text" value="{{$Appointment_id->id}}" hidden name="appointment_id" id="appointment_id">
          @csrf
          <div class="row custom-form">
          <div class="col-12">
            <div class="form-group row">
                <label for="doctor_diagnos" class="col-sm-6 col-form-label">
                    {{ trans('sentence.Diagnos')}}
                </label>
            <textarea class="form-control" name="doctor_diagnos" id="doctor_diagnos" cols="30" rows="5">{{old('doctor_diagnos')}}</textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group row">
                <label for="tretment" class="col-sm-6 col-form-label">
                    {{ trans('sentence.Tretment')}}
                </label>
            <textarea class="form-control" name="tretment" id="tretment" cols="30" rows="5">{{old('tretment')}}</textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-6 col-form-label"></label>               
              <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">                    
            </div>
          </div>
        </form>
        <hr>
    </div>
</div>
</div>

{{--  @if(!empty($Appointments))
<!-- Modal add_dignose_tretment -->
<form method="post" action="{{route('Diagnos')}}" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="add_dignose_tretment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ trans('sentence.Diagnos And Tretment')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if (!empty($Appointment->id))      
          <input type="text" value="{{$Appointment->id}}" hidden name="appointment_id" id="appointment_id">
          @endif
            <div class="col-12">
              <div class="form-group row">
                  <label for="doctor_diagnos" class="col-sm-6 col-form-label">
                      {{ trans('sentence.Diagnos')}}
                  </label>
              <textarea required class="form-control" name="doctor_diagnos" id="doctor_diagnos" cols="30" rows="5">{{old('doctor_diagnos')}}</textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group row">
                  <label for="tretment" class="col-sm-6 col-form-label">
                      {{ trans('sentence.Tretment')}}
                  </label>
              <textarea required class="form-control" name="tretment" id="tretment" cols="30" rows="5">{{old('tretment')}}</textarea>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="submit" id="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">            
        </div>
      </div>
    </div>
  </div>
</form>
@endif  --}}
@endsection
