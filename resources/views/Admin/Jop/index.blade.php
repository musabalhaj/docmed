@extends('layouts.setting_master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{url('/setting')}}">{{ trans('sentence.Settings')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Jops')}}</li>
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
                    <i class="fa fa-codepen"></i> {{ trans('sentence.Jops List')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">
                    <i class="fa fa-plus"></i> {{ trans('sentence.Add Jop')}}
                </a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
                
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
                <div class="table-responsive">
                    <table class="table datatable table-light table-hover table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <td>{{ trans('sentence.#ID')}}</td>
                                <td>{{ trans('sentence.Jop')}}</td>                       
                                <td>{{ trans('sentence.Employees Count')}}</td>
                                <td>{{ trans('sentence.Activeted')}}</td>                       
                                <td>{{ trans('sentence.Action')}}</td>
                            </tr>
                        </thead>
                        @foreach ($Jops as $v=>$Jop)
                        <tr>
                            <td>{{$v+1}}</td>
                            <td>{{$Jop->name}}</td>
                            <td>{{$Jop->User->count()}}</td>
                            <td>
                                @if ($Jop->status == 0)
                               <a href="{{route('ActiveJop',$Jop->id)}}" class="btn btn-outline-danger btn-sm float-left mr-2">
                                <i class="fa fa-times"></i> {{ trans('sentence.No')}}
                                </a>
                               @else
                               <a href="{{route('InActiveJop',$Jop->id)}}" class="btn btn-outline-success btn-sm float-left mr-2">
                                <i class="fa fa-check"></i> {{ trans('sentence.Yes')}} 
                                </a>
                               @endif
                            </td>
                            <td>
                                <a href="{{route('Jop.edit',$Jop->id)}}" class="btn btn-success btn-sm float-left mr-2">
                                <i class="fa fa-pencil-square-o"></i> 
                                </a>
                                <form method="POST" action="{{route('Jop.destroy',$Jop->id)}}">
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

                <form method="post" action="{{route('Jop.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class=" custom-form">
                                
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">
                                        {{ trans('sentence.Jop')}}<span class="star">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="name" 
                                        placeholder="Name" required autocomplete="off" value="{{old('name')}}">
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
