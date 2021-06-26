@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Cat.index')}}">{{ trans('sentence.Cat')}}</a></li>
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

<form method="post" action="{{route('Cat.update',$Cat)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">
                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Name')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" 
                        required autocomplete="off" value="{{ $Cat->name }}">
                    </div>
                </div>
                 
                <div class="form-group row">
                    <label for="type" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Type')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">                     
                    <select required class="form-control" id="type" name="type">
                        <option></option>
                        <option value="1">{{ trans('sentence.Income')}}</option>
                        <option value="0">{{ trans('sentence.Expense')}}</option>
                    </select> 
                    </div>                     
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="form-control btn btn-success btn-block" value="{{ trans('sentence.UPDATE')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
