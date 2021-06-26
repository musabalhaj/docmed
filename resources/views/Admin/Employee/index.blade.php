@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Employees List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Employee.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i> {{ trans('sentence.New Employee')}}
        </a>
        <h4>{{ trans('sentence.Employees List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover custom-table">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Address')}}</th>
                        <th>{{ trans('sentence.E-mail')}}</th>
                        <th>{{ trans('sentence.Phone')}}</th>
                        <th>{{ trans('sentence.Jop')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Employees as $v=>$Employee)
                <tr>
                    <td>{{$v+1}}</td>
                    <td><a href="{{route('Employee.show',$Employee->id)}}">{{$Employee->name}}</a></td>
                    <td>{{$Employee->address}}</td>
                    <td>{{$Employee->email}}</td>
                    <td>+249{{$Employee->phone}}</td>
                    <td>
                    @foreach ($Jop as $jop)
                        @if ($jop->id == $Employee->jop_id)
                            {{$jop->name}}
                        @endif
                    @endforeach
                    </td>                    
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Employee.edit',$Employee->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i>{{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Employee.destroy',$Employee->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item confirm">
                                        <i class="fa fa-trash m-r-5"></i>{{ trans('sentence.Delete')}}
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
