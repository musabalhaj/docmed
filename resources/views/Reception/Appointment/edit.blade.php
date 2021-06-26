@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Appointment.index')}}">{{ trans('sentence.Appointment')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Edit')}}</li>
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
<form method="post" action="{{route('Appointment.update',$Appointment)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class="row custom-form">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="name" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Name')}}<span class="star">*</span>
                        </label>
                            <input type="text" class="form-control" name="name" id="name" 
                            required autocomplete="off" value="{{$Appointment->name}}">
                        </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="address" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Address')}}<span class="star">*</span>
                        </label>
                            <input type="text" class="form-control" name="address" id="address" 
                            required autocomplete="off" value="{{$Appointment->address}}">
                        </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="email" class="col-sm-6 col-form-label">
                            {{ trans('sentence.E-mail')}}<span class="star">*</span>
                        </label>
                            <input type="email" class="form-control" name="email" id="email" 
                            required autocomplete="off" value="{{$Appointment->email}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Phone')}}<span class="star">*</span>
                        </label>
                            <input type="text" class="form-control" name="phone" id="phone" 
                            required autocomplete="off" maxlength="10" value="0{{$Appointment->phone}}">
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group row">
                        <label for="date" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Appointment Date')}}<span class="star">*</span>
                        </label>
                            <input type="date" class="form-control" name="date" id="date" 
                            required autocomplete="off" value="{{$Appointment->date}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="doctor_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Doctor')}}<span class="star">*</span>
                        </label>
                        <select class="custom-select mr-sm-2" id="doctor_id" name="doctor_id">
                            @foreach($Doctor as $Doc)
                                <option value="{{$Doc->id}}"
                                @if($Doc->id == $Appointment->doctor_id)
                                    selected
                                @endif
                                >
                                {{$Doc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                
                <div class="col-12">
                    <div class="form-group row">
                        <label for="note" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Note')}}
                        </label>                        
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control" placeholder="Message" autocomplete="off" >{{$Appointment->note}}
                        </textarea>                        
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label"></label>
                        <input type="submit" class="form-control btn btn-success btn-block" value="{{ trans('sentence.UPDATE')}}">
                </div>
            </div>
            
        </div>
    </div>
</form>
@endsection
