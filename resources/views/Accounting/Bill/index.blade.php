@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Bills List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Bill.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i> {{ trans('sentence.New Bill')}}
        </a>
        <h4>{{ trans('sentence.Bills List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>{{ trans('sentence.Bill ID')}}</th>
                        <th>{{ trans('sentence.Supplier')}}</th>
                        <th>{{ trans('sentence.Amount')}}</th>
                        <th>{{ trans('sentence.Bill Date')}}</th>
                        <th>{{ trans('sentence.Due Date')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Bills as $v=>$Bill)
                <tr>
                    <td><a target="_blank" href="{{route('Bill.show',$Bill->id)}}">{{ trans('sentence.BILL-')}}{{$v+1}}</a></td>
                    <td>{{$Bill->Supplier->name}}</td>
                    <td>
                        @php 
                            $amount = DB::table('bill_infos')->where('bill_id',$Bill->bill_id)->get()->sum('amount');
                        @endphp
                        ${{$amount}}
                    </td>                  
                    <td>{{Carbon\Carbon::parse($Bill->bill_date)->format('j \- F Y')}}</td>
                    <td>{{Carbon\Carbon::parse($Bill->due_date)->format('j \- F Y')}}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Bill.edit',$Bill->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Bill.destroy',$Bill->id)}}">
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
