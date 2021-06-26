@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Employee.index')}}">{{ trans('sentence.Employees')}}</a></li>
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
<form method="post" action="{{route('Employee.store')}}" enctype="multipart/form-data">
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
                        required  value="{{old('email')}}">
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
                        <label for="identity_type" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Identity Type')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="identity_type" id="identity_type"
                        required autocomplete="off" value={{old('identity_type')}}>
                    </div>
                </div>
  
                <div class="col-6">
                    <div class="form-group row">
                        <label for="identity_number" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Identity Number')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="identity_number" id="identity_number"
                        required autocomplete="off" maxlength="20" value={{old('identity_number')}}>
                    </div>
                </div>

                <div class="col-6">
                        <div class="form-group row">
                            <label for="maritalstatus_id" class="col-sm-6 col-form-label">
                                {{ trans('sentence.Marital Status')}}<span class="star">*</span>
                            </label>
                            <select class="custom-select mr-sm-2" id="maritalstatus_id" name="maritalstatus_id">
                                <option></option>
                                @foreach($MaritalStatus as $MaritalStatus)
                                    <option value="{{$MaritalStatus->id}}">{{$MaritalStatus->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="bloodsymbol_id" class="col-sm-6 col-form-label">
                                {{ trans('sentence.Blood Group')}}<span class="star">*</span>
                            </label>
                            <select class="custom-select mr-sm-2" id="bloodsymbol_id" name="bloodsymbol_id">
                                <option></option>
                                @foreach($BloodSymbol as $BloodSymbol)
                                    <option value="{{$BloodSymbol->id}}">{{$BloodSymbol->name}}</option>
                                @endforeach
                            </select>
                         </div>
                    </div>
    
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="gender_id" class="col-sm-6 col-form-label">
                                {{ trans('sentence.Gender')}}<span class="star">*</span>
                            </label>
                            <select class="custom-select mr-sm-2" id="gender_id" name="gender_id">
                                <option></option>
                                @foreach($Genderes as $Gender)
                                    <option value="{{$Gender->id}}">{{$Gender->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="jop_id" class="col-sm-6 col-form-label">
                                {{ trans('sentence.Jop')}}<span class="star">*</span>
                            </label>
                            <select class="custom-select mr-sm-2" id="jop_id" name="jop_id">
                                <option></option>
                                @foreach($Jop as $jop)
                                    <option value="{{$jop->id}}">{{$jop->name}}</option>
                                @endforeach
                            </select>
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
    </div>
</form>
@endsection
