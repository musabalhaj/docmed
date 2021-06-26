@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Salary.index')}}">{{ trans('sentence.Salaries')}}</a></li>
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

<form method="post" action="{{route('Salary.update',$Salary)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">

                <div class="form-group row">
                    <label for="user_id" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Employee')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2" id="user_id" name="user_id">
                            @foreach($User as $user)
                                <option value="{{$user->id}}"
                                    @if($user->id == $Salary->user_id)
                                    selected
                                    @endif
                                    >
                                    {{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="salary" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Net Salary')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="salary" id="salary" 
                        required autocomplete="off" value="{{$Salary->salary}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="allowance" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Allowance')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="allowance" id="allowance" 
                        required autocomplete="off" value="{{$Salary->allowance}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="incentive" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Incentive')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="incentive" id="incentive" 
                        required autocomplete="off" value="{{$Salary->incentive}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="deduction" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Deduction')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="deduction" id="deduction" 
                        required autocomplete="off" value="{{$Salary->deduction}}">
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
