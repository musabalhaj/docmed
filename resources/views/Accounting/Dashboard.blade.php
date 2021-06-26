@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>${{$Income}}</h3>
                <span class="widget-title4">{{ trans('sentence.Total Income')}} <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-opencart" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>${{$Expense}}</h3>
                <span class="widget-title4">{{ trans('sentence.Total Expenses')}} <i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <div class="dash-widget">
            <span class="dash-widget-bg4"><i class="fa fa-heart" aria-hidden="true"></i></span>
            <div class="dash-widget-info text-right">
                <h3>${{$Income-$Expense}}</h3>
                <span class="widget-title4">{{ trans('sentence.Net')}}<i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>

<div class="row">  

    <div class="col-md-6 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-shopping-cart"></i> {{ trans('sentence.Newest Expenses')}}     
                <a href="{{route('Expense.index')}}" class="btn btn-primary btn-sm pull-right">
                    {{ trans('sentence.View All')}}
                </a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col">{{ trans('sentence.#ID')}}</th>
                                <th scope="col">{{ trans('sentence.Date')}}</th>
                                <th scope="col">{{ trans('sentence.Amount')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Expenses as $v=>$expense)
                                <tr>
                                    <td>{{$v+1}}</td>
                                    <td>{{Carbon\Carbon::parse($expense->date)->format('j \- F Y')}}</td>
                                    <td>${{$expense->amount}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">
        <div class="card-box">
            <div class="card-block">
                <h4><i class="fa fa-credit-card"></i> {{ trans('sentence.Newest Incomes')}}     
                <a href="{{route('Income.index')}}" class="btn btn-primary btn-sm pull-right">
                    {{ trans('sentence.View All')}}
                </a>
                </h4><hr> 
                <div class="table-responsive">
                    <table class="table table-light table-hover">
                        <thead>
                            <tr class="bg-primary">
                            <th scope="col">{{ trans('sentence.#ID')}}</th>
                            <th scope="col">{{ trans('sentence.Date')}}</th>
                            <th scope="col">{{ trans('sentence.Amount')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($Incomes as $v=>$income)
                            <tr>
                                <td>{{$v+1}}</td>
                                <td>{{Carbon\Carbon::parse($income->date)->format('j \- F Y')}}</td>
                                <td>${{$income->amount}}</td>                   
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
