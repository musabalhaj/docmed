@extends('layouts.setting_master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/setting')}}">Settings</a></li>
            <li class="breadcrumb-item"><a href="{{route('MaritalStatus.index')}}">Marital Status</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</h6>
@if($errors->any())
    <div class="alert alert-danger">
      <ul class="list-group">
        @foreach($errors->all() as $error)
          <li class="list-gorup-item">
           {{$error}}
          </li>
        @endforeach
      </ul>
    </div>
@endif

<form method="post" action="{{route('MaritalStatus.update',$MaritalStatus)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">
                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Marital Status<span class="star">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" 
                        placeholder="Name" required autocomplete="off" value="{{ $MaritalStatus->name }}">
                    </div>
                </div>
                            
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="form-control btn btn-success btn-block" value="UPDATE">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
