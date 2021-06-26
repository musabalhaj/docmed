@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Expense.index')}}">{{ trans('sentence.Expenses')}}</a></li>
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

<form method="post" action="{{route('Expense.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card card-box">
        <div class="card-body">
            <div class="row custom-form">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="date" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Date')}}<span class="star">*</span>
                        </label>
                        <input type="date" class="form-control" name="date" id="date" 
                        required  value="{{old('date')}}">
                    </div>
                </div>
        
                <div class="col-6">
                    <div class="form-group row">
                        <label for="amount" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Amount')}}<span class="star">*</span>
                        </label>
                        <input type="text" class="form-control" name="amount" id="amount" 
                        required autocomplete="off" value="{{old('amount')}}">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group row">
                        <label for="payment_method_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Payment Method')}}<span class="star">*</span>
                        </label>
                        <select class="custom-select mr-sm-2" id="payment_method_id" name="payment_method_id">
                            <option></option>
                            @foreach($PaymentMethod as $PaymentMethod)
                                <option value="{{$PaymentMethod->id}}">{{$PaymentMethod->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group row">
                        <label for="cat_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Cats')}}<span class="star">*</span>
                        </label>
                        <select class="custom-select mr-sm-2" id="cat_id" name="cat_id">
                            <option></option>
                            @foreach($Cats as $Cat)
                                <option value="{{$Cat->id}}">{{$Cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="form-group row">
                        <label for="supplier_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Supplier')}}
                        </label>
                        <select class="custom-select mr-sm-2" id="supplier_id" name="supplier_id">
                            <option></option>
                            @foreach($Supplier as $Supp)
                                <option value="{{$Supp->id}}">{{$Supp->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="description" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Description')}}
                        </label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{old('description')}}</textarea>
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
