@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Salaries List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Salary.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i>{{ trans('sentence.New Salary')}}
        </a>
        <h4>{{ trans('sentence.Salaries List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover custom-table">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Employee')}}</th>
                        <th>{{ trans('sentence.Net Salary')}}</th>
                        <th>{{ trans('sentence.Allowance')}}</th>
                        <th>{{ trans('sentence.Incentive')}}</th>
                        <th>{{ trans('sentence.Deduction')}}</th>
                        <th>{{ trans('sentence.Total Salary')}}</th>                        
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Salary as $v=>$Salary)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{$Salary->User->name}}</td>
                    <td><span class="badge badge-dark">${{$Salary->salary}}</span></td>
                    <td><span class="badge badge-primary">${{$Salary->allowance}}</span></td>
                    <td><span class="badge badge-primary">${{$Salary->incentive}}</span></td>
                    <td><span class="badge badge-danger">${{$Salary->deduction}}</span></td>
                    <td><span class="badge badge-success">${{$Salary->total_salary}}</span></td>               
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Salary.edit',$Salary->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i>{{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Salary.destroy',$Salary->id)}}">
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
