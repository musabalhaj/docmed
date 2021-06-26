@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Profit Report')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <form method="get" action="{{route('IncomeExpenseReport')}}" enctype="multipart/form-data">
            <div class="custom-form search">
                <div class="form-group">

                        <label for="search">{{ trans('sentence.From')}}</label>
                        <input type="date" class="custom-form" name="search" id="search" 
                        required autocomplete="off" value="{{old('search')}}">

                        <label for="to">{{ trans('sentence.To')}}</label>
                        <input type="date" class="custom-form" name="to" id="to" 
                        required autocomplete="off" value="{{old('to')}}">
                        
                        <input type="submit" class=" btn btn-primary" 
                        value="{{ trans('sentence.Search')}}">
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-light table-bordered">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Date')}}</th>
                        <th>{{ trans('sentence.Cat')}}</th>
                        <th>{{ trans('sentence.Amount')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Expenses))
                        @foreach ($Expenses as$Expense)
                            <tr>
                                <td>{{$v++}}</td>
                                <td>{{Carbon\Carbon::parse($Expense->date)->format('j \- F Y')}}</td>
                                <td>
                                    @foreach ($Cats as $Cat)
                                        @if ($Cat->id == $Expense->cat_id)
                                            {{$Cat->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>${{$Expense->amount}}</td>                                      
                            </tr>
                        @endforeach  
                    @endif
                    @if (!empty($Incomes))
                        @foreach ($Incomes as $Income)
                            <tr>
                                <td>{{$v++}}</td>
                                <td>{{Carbon\Carbon::parse($Income->date)->format('j \- F Y')}}</td>
                                <td>
                                    @foreach ($Cats as $Cat)
                                        @if ($Cat->id == $Income->cat_id)
                                            {{$Cat->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>${{$Income->amount}}</td>                                      
                            </tr>
                        @endforeach  
                    @endif
                    <tr>
                        @if (!empty($Expenses))
                        @if (!empty($Incomes))
                        <td style="border: none"></td>
                        <td style="border: none"></td>
                        <td style="font-size: 27px !important;">{{ trans('sentence.Total')}}</td>
                        <td style="font-size: 27px !important;">${{$SumIncome-$SumExpense}}</td>
                        @endif
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
