@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Cats')}}</li>
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
<div class="card-box">
    <div class="card-block">
        <ul class="nav nav-tabs nav-tabs-top" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fa fa-suitcase"></i> {{ trans('sentence.Cats List')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">
                    <i class="fa fa-plus"></i> {{ trans('sentence.Add Cat')}}
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="table-responsive">
                    <table class="table datatable table-light table-hover">
                        <thead>
                            <tr class="bg-primary">
                                <td>{{ trans('sentence.#ID')}}</td>                        
                                <td>{{ trans('sentence.Name')}}</td>                        
                                <td>{{ trans('sentence.Type')}}</td>                        
                                <td>{{ trans('sentence.Action')}}</td>
                            </tr>
                        </thead>
                        @foreach ($Cat as $v=>$Cat)
                        <tr>
                            <td>{{$v+1}}</td>
                            <td>{{$Cat->name}}</td>
                            <td>
                                @if ($Cat->type == 0)
                                {{ trans('sentence.Expenses')}}
                                @else
                                {{ trans('sentence.Income')}}
                                @endif
                            </td>
                            <td>
                            @if ($Cat->id > 4)
                                
                                <a href="{{route('Cat.edit',$Cat->id)}}" class="btn btn-success btn-sm float-left mr-2">
                                    <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <form method="POST" action="{{route('Cat.destroy',$Cat->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm  float-left confirm">
                                        <i class="fa fa-trash"></i> 
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        
            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
                <form method="post" action="{{route('Cat.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
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
                                        <input type="submit" class="form-control btn btn-primary btn-block" value="{{ trans('sentence.ADD')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
