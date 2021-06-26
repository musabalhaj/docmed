@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Accountant List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Accounting.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i> {{ trans('sentence.New Accountant')}}
        </a>
        <h4>{{ trans('sentence.Accountant List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Address')}}</th>
                        <th>{{ trans('sentence.E-mail')}}</th>
                        <th>{{ trans('sentence.Phone')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Accountings as $v=>$Accounting)
                <tr>
                    <td>{{$v+1}}</td>
                    <td><a href="{{route('Accounting.show',$Accounting->id)}}">{{$Accounting->name}}</a></td>
                    <td>{{$Accounting->address}}</td>
                    <td>{{$Accounting->email}}</td>
                    <td>+249{{$Accounting->phone}}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Accounting.edit',$Accounting->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Accounting.destroy',$Accounting->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item confirm">
                                       <i class="fa fa-trash m-r-5"></i> {{ trans('sentence.Delete')}}
                                    </button>
                                </form>                               
                            </div>
                        </div>
                    </td>                    
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
