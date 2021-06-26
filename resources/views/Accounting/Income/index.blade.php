@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Incomes List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Income.create')}}" class="btn btn-primary btn-sm pull-right">
        <i class="fa fa-plus"></i> {{ trans('sentence.New Income')}}
        </a>
        <h4>{{ trans('sentence.Incomes List')}}</h4>
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
                        @if (auth()->user()->role == 1)
                        <th>{{ trans('sentence.Added By')}}</th>
                        @endif
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Incomes as $v=>$Income)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{Carbon\Carbon::parse($Income->date)->format('j \- F Y')}}</td>
                    <td>${{$Income->amount}}</td>
                    @if (empty($Income->description))
                        <td>{{ trans('sentence.Not Available')}}</td>
                    @else
                    <td>{{$Income->description}}</td>
                    @endif
                    <td>
                        @foreach ($Cats as $Cat)
                            @if ($Cat->id == $Income->cat_id)
                                {{$Cat->name}}
                            @endif
                        @endforeach
                    </td>
                                    
                    @if (auth()->user()->role == 1)
                    <td>
                        @foreach ($User as $user)
                            @if ($user->id == $Income->added_by)
                                {{$user->name}}
                            @endif
                        @endforeach
                    </td>
                    @endif                    
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Income.edit',$Income->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Income.destroy',$Income->id)}}">
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
