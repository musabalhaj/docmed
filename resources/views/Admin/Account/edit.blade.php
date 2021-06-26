@extends('layouts.master')
   
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Account.index')}}">{{ trans('sentence.Account')}}</a></li>
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

<form method="post" action="{{route('Account.update',$Account)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">
                
                <div class="form-group row">
                    <label for="name" class="col-sm-6 col-form-label">
                        {{ trans('sentence.Customer Name')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" 
                        required autocomplete="off" value="{{ $Account->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bank_id" class="col-sm-6 col-form-label">
                        {{ trans('sentence.Bank')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2" id="bank_id" name="bank_id">
                            @foreach($Banks as $Bank)
                                <option value="{{$Bank->id}}"
                                    @if($Bank->id == $Account->bank_id)
                                    selected
                                    @endif
                                    >
                                    {{$Bank->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="branch_id" class="col-sm-6 col-form-label">
                        {{ trans('sentence.Branch')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2" id="branch_id" name="branch_id">
                            @foreach($Branches as $Branch)
                                <option value="{{$Branch->id}}"
                                    @if($Branch->id == $Account->branch_id)
                                    selected
                                    @endif
                                    >
                                    {{$Branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="account_num" class="col-sm-6 col-form-label">
                        {{ trans('sentence.Account Number')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="account_num" id="account_num" 
                        required autocomplete="off" value="{{ $Account->account_num }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="amount" class="col-sm-6 col-form-label">
                        {{ trans('sentence.Amount')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="amount" id="amount" 
                        required autocomplete="off" value="{{ $Account->amount }}">
                    </div>
                </div>
                            
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="form-control btn btn-success btn-block" value="{{ trans('sentence.UPDATE')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
