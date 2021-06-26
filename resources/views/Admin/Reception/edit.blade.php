@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Reception.index')}}">{{ trans('sentence.Receptionist')}}</a></li>
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
<form method="post" action="{{route('Reception.update',$Reception)}}" enctype="multipart/form-data">
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
                        required autocomplete="off" value="{{$Reception->name}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="address" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Address')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="address" id="address" 
                        required autocomplete="off" value="{{$Reception->address}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="identity_type" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Identity Type')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="identity_type" id="identity_type"
                        required autocomplete="off" value="{{$Reception->identity_type}}">
                    </div>
                </div>
  
                <div class="col-6">
                    <div class="form-group row">
                        <label for="identity_number" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Identity Number')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="identity_number" id="identity_number"
                        required autocomplete="off" maxlength="20" value="{{$Reception->identity_number}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="email" class="col-sm-6 col-form-label">
                            {{ trans('sentence.E-mail')}}<span class="star">*</span>
                        </label>
                        <input type="email" class="form-control" name="email" id="email" 
                        required autocomplete="off" value="{{$Reception->email}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="phone" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Phone')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="phone" id="phone" 
                        required autocomplete="off" maxlength="10" value="0{{$Reception->phone}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group row">
                        <label for="maritalstatus_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Marital Status')}}<span class="star">*</span>
                        </label>
                        <select class="custom-select mr-sm-2" id="maritalstatus_id" name="maritalstatus_id">
                            @foreach($MaritalStatus as $MaritalStatus)
                                <option value="{{$MaritalStatus->id}}"
                                    @if($MaritalStatus->id == $Reception->maritalstatus_id)
                                    selected
                                    @endif
                                    >
                                    {{$MaritalStatus->name}}</option>
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
                            @foreach($BloodSymbol as $BloodSymbol)
                                <option value="{{$BloodSymbol->id}}"
                                    @if($BloodSymbol->id == $Reception->bloodsymbol_id)
                                    selected
                                    @endif
                                    >
                                    {{$BloodSymbol->name}}</option>
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
                            @foreach($Genderes as $Gender)
                                <option value="{{$Gender->id}}"
                                    @if($Gender->id == $Reception->gender_id)
                                    selected
                                    @endif
                                    >
                                    {{$Gender->name}}</option>
                            @endforeach
                        </select>
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
