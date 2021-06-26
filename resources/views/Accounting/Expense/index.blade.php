@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Expenses List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Expense.create')}}" class="btn btn-primary btn-sm pull-right">
        <i class="fa fa-plus"></i> {{ trans('sentence.New Expense')}}
        </a>
        <h4>{{ trans('sentence.Expenses List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Date')}}</th>
                        <th>{{ trans('sentence.Amount')}}</th>
                        <th>{{ trans('sentence.Description')}}</th>
                        <th>{{ trans('sentence.Cat')}}</th>
                        <th>{{ trans('sentence.Payment Method')}}</th>
                        <th>{{ trans('sentence.Supplier')}}</th>                        
                        @if (auth()->user()->role == 1)
                        <th>{{ trans('sentence.Added By')}}</th>
                        @endif
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Expenses as $v=>$Expense)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{Carbon\Carbon::parse($Expense->date)->format('j \- F Y')}}</td>
                    <td>${{$Expense->amount}}</td>
                    @if (empty($Expense->description))
                        <td>{{ trans('sentence.Not Available')}}</td>
                    @else
                    <td>{{$Expense->description}}</td>
                    @endif
                    <td>
                        @foreach ($Cats as $Cat)
                            @if ($Cat->id == $Expense->cat_id)
                                {{$Cat->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($PaymentMethod as $Method)
                            @if ($Method->id == $Expense->payment_method_id)
                                {{$Method->name}}
                            @endif
                        @endforeach
                    </td>
                    @if (empty($Expense->supplier_id))
                        <td>{{ trans('sentence.Not Available')}}</td>
                    @else
                    <td>{{$Expense->Supplier->name}}</td>
                    @endif
                    @if (auth()->user()->role == 1)
                    <td>
                        @foreach ($User as $user)
                            @if ($user->id == $Expense->added_by)
                                {{$user->name}}
                            @endif
                        @endforeach
                    </td>
                    @endif                    
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Expense.edit',$Expense->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Expense.destroy',$Expense->id)}}">
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
