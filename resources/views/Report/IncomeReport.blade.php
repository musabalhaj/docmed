@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Income Report')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <form method="get" action="{{route('IncomeReport')}}" enctype="multipart/form-data">
            <div class="custom-form search">
                <div class="form-group">
                        <label for="to">{{ trans('sentence.Cat')}}</label>
                        <select name="cat_id" id="cat_id">
                            <option value="empty"></option>
                            @foreach ($Cats as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>

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
            <table class="table table-light table-bordered table-hover">
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
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Incomes))
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
                            </tr>
                        @endforeach  
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
