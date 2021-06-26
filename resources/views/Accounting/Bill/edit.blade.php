@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Bill.index')}}">{{ trans('sentence.Bills')}}</a></li>
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
<form name="add_name" id="add_name" method="post" action="{{route('Bill.update',$Bill)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class="row custom-form">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="bill_date" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Bill Date')}}<span class="star">*</span>
                        </label>
                        <input type="date" class="form-control" name="bill_date" id="bill_date" 
                        required  value="{{$Bill->bill_date}}">
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group row">
                        <label for="due_date" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Due Date')}}<span class="star">*</span>
                        </label>
                        <input type="date" class="form-control" name="due_date" id="due_date" 
                        required  value="{{$Bill->due_date}}">
                    </div>
                </div>

                <div class="col-12 bill">
                    <div class="form-group row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ trans('sentence.Item Name')}}</th>
                                        <th>{{ trans('sentence.Quantity')}}</th>
                                        <th>{{ trans('sentence.Price')}}</th>
                                        <th>{{ trans('sentence.Amount')}}</th>
                                        <th><a href="#" class="addRow"><i class="fa fa-plus"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($BillInfo as $info)
                                    <tr>
                                    <td><input type="text" name="item_name[]" class="form-control" required="" value="{{$info->item}}"></td>  
                                    <td><input type="text" name="quantity[]" class="form-control quantity" required="" value="{{$info->quantity}}"></td>
                                    <td><input type="text" name="price[]" class="form-control price" value="{{$info->price}}"></td>
                                    <td><input type="text" name="amount[]" class="form-control amount" disabled value="{{$info->amount}}"></td>
                                    <td><a href="#" class="btn btn-danger remove"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="border: none"></td>
                                        <td style="border: none"></td>
                                        <td>{{ trans('sentence.Total Amount')}}</td>
                                        <td>
                                            <b class="total">@php 
                                            $amount = DB::table('bill_infos')->where('bill_id',$Bill->bill_id)->get()->sum('amount');
                                            @endphp
                                            {{$amount}}.00 SDG
                                            </b> 
                                        </td>
                                    </tr>
                                </tfoot>
                            </table> 
                        </div>
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
                                <option value="{{$Cat->id}}"
                                    @if($Cat->id == $Bill->cat_id)
                                        selected
                                    @endif
                                >
                                    {{$Cat->name}}
                                </option>
                            @endforeach
                        </select>  
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="form-group row">
                        <label for="supplier_id" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Supplier')}}
                        </label>
                        <select class="custom-select mr-sm-2" id="supplier_id" name="supplier_id">
                            <option></option>
                            @foreach($Supplier as $Supp)
                                <option value="{{$Supp->id}}"
                                    @if($Supp->id == $Bill->supplier_id)
                                        selected
                                    @endif
                                >
                                    {{$Supp->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="note" class="col-sm-6 col-form-label">
                            {{ trans('sentence.Note')}}
                        </label>
                    <textarea class="form-control" name="note" id="note" cols="30" rows="5">{{$Bill->note}}</textarea>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-6 col-form-label"></label>            
                        <input type="submit" name="submit" id="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.UPDATE')}}">            
                    </div>
                </div>

            </div>
        </div>
    </div> 
</form>
@endsection
