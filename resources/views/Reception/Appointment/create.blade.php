@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Appointment.index')}}">{{ trans('sentence.Appointment')}}</a></li>
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
<form method="post" action="{{route('Appointment.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-box">
        <div class="card-body">
            <div class="row custom-form">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="name" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Name')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" id="name" 
                        required autocomplete="off" value="{{old('name')}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="address" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Address')}}<span class="star">*</span>
                        </label>                       
                        <input type="text" class="form-control" name="address" id="address" 
                        required autocomplete="off" value="{{old('address')}}">                       
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group row">
                        <label for="email" class="col-sm-6 col-form-label">
                            {{ trans('sentence.E-mail')}}<span class="star">*</span>
                        </label>                        
                        <input type="email" class="form-control" name="email" id="email" 
                        required autocomplete="off" value="{{old('email')}}">                       
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Phone')}}<span class="star">*</span>
                        </label>                       
                        <input type="text" class="form-control" name="phone" id="phone" 
                        required autocomplete="off" maxlength="10" value="{{old('phone')}}">                        
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="date" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Appointment Date')}}<span class="star">*</span>
                        </label>                        
                        <input type="date" class="form-control" name="date" id="date"
                        required autocomplete="off" value="{{old('date')}}">                        
                    </div>
                </div>

                {{--  <div class="col-6">
                    <div class="form-group row">
                        <label for="service_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Services')}}
                        </label>                     
                        <select class="custom-select mr-sm-2" id="service_id" name="service_id">
                            <option></option>
                            @foreach($Services as $Service)
                                <option value="{{$Service->id}}">{{$Service->name}}</option>
                            @endforeach
                        </select>                      
                    </div>
                </div>  --}}

                <div class="col-6">
                    <div class="form-group row">
                        <label for="doctor_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Doctor')}}<span class="star">*</span>
                        </label>                     
                        <select class="custom-select mr-sm-2" id="doctor_id" name="doctor_id">
                            <option></option>
                            @foreach($Doctor as $Doctor)
                                <option value="{{$Doctor->id}}">{{$Doctor->name}}</option>
                            @endforeach
                        </select>                      
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="payment_method_bank" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Payment Method')}}<span class="star">*</span>
                        </label>                     
                        <select required class="custom-select mr-sm-2" id="payment_method_bank" name="payment_method">
                            <option></option>
                            <option value="cash">نقد</option>
                            <option value="bank">بنك</option>
                        </select>                      
                    </div>
                </div>

                <div class="col-6" id="add_fields">
                    <div class="form-group row">
                        <label for="account_num" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Account Number')}}<span class="star">*</span>
                        </label>                        
                        <input type="text" class="form-control" name="account_num" id="account_num"
                        autocomplete="off" value="{{old('account_num')}}">                        
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="note" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Note')}}
                        </label>                        
                        <textarea name="note" id="note" cols="30" rows="10" class="form-control" autocomplete="off" >
                        </textarea>                        
                    </div>
                </div>
                
            </div>

            <div class="col-12">
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label"></label>                    
                    <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">                    
                </div>
            </div>
            
        </div>
    </div>
</form>
@endsection
