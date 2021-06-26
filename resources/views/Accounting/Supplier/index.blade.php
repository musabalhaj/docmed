@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Suppliers List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Supplier.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i>{{ trans('sentence.New Supplier')}}
        </a>
        <h4>{{ trans('sentence.Suppliers List')}}</h4>
        <hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.E-mail')}}</th>
                        <th>{{ trans('sentence.Address')}}</th>
                        <th>{{ trans('sentence.Phone')}}</th>
                        <th>{{ trans('sentence.Activeted')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Suppliers as $v=>$Supplier)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>{{$Supplier->name}}</td>
                    <td>{{$Supplier->email}}</td>
                    <td>{{$Supplier->address}}</td>
                    <td>+249{{$Supplier->phone}}</td>
                    <td>
                        @if ($Supplier->status == 0)
                        <span class="badge badge-danger">{{ trans('sentence.No')}}</span>
                        @else
                        <span class="badge badge-success">{{ trans('sentence.Yes')}}</span>
                        @endif
                    </td>                    
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if ($Supplier->status == 0)
                               <a class="dropdown-item" href="{{route('ActiveSupplier',$Supplier->id)}}">
                                <i class="fa fa-check"></i> {{ trans('sentence.Active')}}
                               </a>
                               @else
                               <a class="dropdown-item" href="{{route('InActiveSupplier',$Supplier->id)}}">
                                <i class="fa fa-times"></i> {{ trans('sentence.InActive')}}
                               </a> 
                               @endif
                                <a class="dropdown-item" href="{{route('Supplier.edit',$Supplier->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Supplier.destroy',$Supplier->id)}}">
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
