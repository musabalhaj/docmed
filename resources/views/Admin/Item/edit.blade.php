@extends('layouts.master')

@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('Item.index')}}">{{ trans('sentence.Items')}}</a></li>
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

<form method="post" action="{{route('Item.update',$Item)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card card-box">
        <div class="card-body">
            <div class=" custom-form">
                
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Items Name')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" 
                        required autocomplete="off" value="{{$Item->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Item Description')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <textarea placeholder="Description" name="description" id="description" class="form-control" cols="5" rows="3">{{$Item->description}}
                        </textarea>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Item Price')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" id="price" 
                        required autocomplete="off" maxlength="10" value="{{$Item->price}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="qty" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Item qty')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="qty" id="qty" required autocomplete="off"
                        maxlength="100" value="{{$Item->qty}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">
                        {{ trans('sentence.Category')}}<span class="star">*</span>
                    </label>
                    <div class="col-sm-10">
                        <select class="custom-select mr-sm-2" id="category_id" name="category_id">
                            @foreach($Category as $Cat)
                                <option value="{{$Cat->id}}"
                                    @if($Cat->id == $Item->category_id)
                                    selected
                                    @endif
                                    >
                                    {{$Cat->name}}</option>
                            @endforeach
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
