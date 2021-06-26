@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Supplier.index')}}">{{ trans('sentence.Suppliers')}}</a></li>
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
<form method="post" action="{{route('Supplier.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">
                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Name')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" 
                        required autocomplete="off" value="{{old('name')}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">
                        {{ trans('sentence.E-mail')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email" 
                        required autocomplete="off" value="{{old('email')}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Address')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" id="address" 
                        required autocomplete="off" value="{{old('address')}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Phone')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" id="phone" 
                        required autocomplete="off" maxlength="10" value="{{old('phone')}}">
                    </div>
                </div>
                            
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</form>
@endsection
