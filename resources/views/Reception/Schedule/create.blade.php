@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Schedule.index')}}">{{ trans('sentence.Schedules')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Add')}}</li>
        </ol>
    </nav>
</h6>

@if($errors->any())
    <div class="alert alert-danger">
      <ul class="list-group">
        @foreach($errors->all() as $error)
          <li class="list-gorup-item">
            {{ trans(''.$error.'')}}
          </li>
        @endforeach
      </ul>
    </div>
@endif

<form method="post" action="{{route('Schedule.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">
                
                <div class="form-group row">
                    <label for="doctor_id" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Doctor')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2 m" id="doctor_id" name="doctor_id" >
                            <option></option>
                            @foreach($Doctor as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                 </div>
                
                <div class="form-group row multipleSelect ">
                    <label for="days" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Available Days')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select required multiple class="form-control multiple" id="days[]" name="days[]">
                            <option value="السبت">السبت</option>
                            <option value="الأحد">الأحد</option>
                            <option value="الإثنين">الإثنين</option>
                            <option value="التلاثاء">التلاثاء</option>
                            <option value="الأربعاء">الأربعاء</option>
                            <option value="الخميس">الخميس</option>
                            <option value="الجمعة">الجمعة</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="start_at" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Start At')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control datetimepicker" name="start_at" id="datetimepicker"
                        required autocomplete="off" value="{{old('start_at')}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="end_at" class="col-sm-2 col-form-label">
                        {{ trans('sentence.End At')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="end_at" id="datetimepicker4"
                        required autocomplete="off" value="{{old('end_at')}}">
                    </div>
                </div>
                            
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</form>
@endsection
