@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Items List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Item.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i> {{ trans('sentence.New Item')}}
        </a>
        <h4>{{ trans('sentence.Items List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover custom-table">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Items Name')}}</th>
                        <th>{{ trans('sentence.Item Description')}}</th>
                        <th>{{ trans('sentence.Item Price')}}</th>
                        <th>{{ trans('sentence.Item qty')}}</th>
                        <th>{{ trans('sentence.Category')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Item as $v=>$Item)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{$Item->name}}</td>
                    <td>{{$Item->description}}</td>
                    <td>${{$Item->price}}</td>
                    <td>{{$Item->qty}}</td>
                    <td>{{$Item->Category->name}}</td>                    
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{route('Item.edit',$Item->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i>{{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Item.destroy',$Item->id)}}">
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
