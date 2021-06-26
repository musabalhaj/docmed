@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Test.index')}}">{{ trans('sentence.Tests')}}</a></li>
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

<form method="post" action="{{route('Test.store')}}" enctype="multipart/form-data">
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
                    <label for="description" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Description')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <textarea placeholder="Description" name="description" id="description" class="form-control" cols="5" rows="3">{{old('description')}}</textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Price')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" id="price" 
                        required autocomplete="off" value="{{old('price')}}">
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
