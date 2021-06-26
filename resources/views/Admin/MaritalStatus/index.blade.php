@extends('layouts.setting_master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/setting')}}">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">Marital Status</li>
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
<div class="card-box">
    <div class="card-block">
        <ul class="nav nav-tabs nav-tabs-top" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                    <i class="fa fa-life-ring"></i> Marital Statuss List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">
                    <i class="fa fa-plus"></i> Add Marital Status
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="table-responsive">
                    <table class="table datatable table-light table-hover table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <td>MaritalStatus</td>                       
                                <td>Action</td>
                            </tr>
                        </thead>
                        @foreach ($MaritalStatus as $MaritalStatus)
                        <tr>
                            <td>{{$MaritalStatus->name}}</td>
                            <td>
                                <a href="{{route('MaritalStatus.edit',$MaritalStatus->id)}}" class="btn btn-success btn-sm float-left mr-2">
                                <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <form method="POST" action="{{route('MaritalStatus.destroy',$MaritalStatus->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm  float-left confirm">
                                    <i class="fa fa-trash"></i> 
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        
            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">

                <form method="post" action="{{route('MaritalStatus.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card ">
                        <div class="card-body">
                            <div class=" custom-form">
                                
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">MaritalStatus<span class="star">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" 
                                        placeholder="Name" required autocomplete="off" value="{{old('name')}}">
                                    </div>
                                </div>
                                            
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" class="form-control btn btn-primary btn-block" value="ADD">
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
