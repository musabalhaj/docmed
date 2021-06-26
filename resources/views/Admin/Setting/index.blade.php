@extends('layouts.setting_master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Settings')}}</li>
        </ol>
    </nav>
</h6>

<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg1"><i class="fa fa-building" aria-hidden="true"></i></span>
            <a href="{{route('Department.index')}}">
                <div class="dash-widget-info text-right">
                    <h3>{{$Department->count()}}</h3>
                    <span class="widget-title1">{{ trans('sentence.Departments')}} <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg2"><i class="fa fa-codepen"></i></span>
            <a href="{{route('Jop.index')}}">
                <div class="dash-widget-info text-right">
                    <h3>{{$Jop->count()}}</h3>
                    <span class="widget-title2">{{ trans('sentence.Jops')}} <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg3"><i class="fa fa-flask" aria-hidden="true"></i></span>
            <a href="{{route('Test.index')}}">
                <div class="dash-widget-info text-right">
                    <h3>{{$Tests->count()}}</h3>
                    <span class="widget-title3">{{ trans('sentence.Tests')}} <i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-building"></i>{{ trans('sentence.Departments')}}   
                <a href="{{route('Department.index')}}" class="btn btn-primary btn-sm pull-right">{{ trans('sentence.View All')}}</a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                    <thead>
                    <tr class="bg-primary">
                    <th scope="col">{{ trans('sentence.Name')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($Department as $v=>$Dept)
                    @if($v <= 3)
                    <tr> <td>{{$Dept->name}}</td> </tr>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-codepen"></i>{{ trans('sentence.Jops')}}    
                <a href="{{route('Jop.index')}}" class="btn btn-primary btn-sm pull-right">{{ trans('sentence.View All')}}</a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                    <thead>
                    <tr class="bg-primary">
                    <th scope="col">{{ trans('sentence.Name')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($Jop as $v=>$jop)
                    @if($v <= 3)
                    <tr> <td>{{$jop->name}}</td> </tr>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-flask"></i> {{ trans('sentence.Tests')}}   
                <a href="{{route('Test.index')}}" class="btn btn-primary btn-sm pull-right">{{ trans('sentence.View All')}}</a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                    <thead>
                    <tr class="bg-primary">
                    <th scope="col">{{ trans('sentence.Name')}}</th>
                    <th scope="col">{{ trans('sentence.Price')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($Tests as $v=>$Test)
                    @if($v <= 3)
                    <tr> 
                        <td>{{$Test->name}}</td> 
                        <td>${{$Test->price}}</td> 
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
