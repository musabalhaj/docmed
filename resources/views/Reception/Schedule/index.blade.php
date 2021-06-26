@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Schedules List')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <a href="{{route('Schedule.create')}}" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i>{{ trans('sentence.New Schedule')}}
        </a>
        <h4>{{ trans('sentence.Doctor Schedule')}}</h4><hr>
        <div class="table-responsive">
            <table class="table datatable table-light table-hover custom-table">
                <thead>
                    <tr class="bg-primary">
                        <td>{{ trans('sentence.#ID')}}</td>
                        <th>{{ trans('sentence.Doctor')}}</th>
                        <th>{{ trans('sentence.Available Days')}}</th>
                        <th>{{ trans('sentence.Start At')}}</th>
                        <th>{{ trans('sentence.End At')}}</th>
                        <th>{{ trans('sentence.Activeted')}}</th>
                        <th class="text-right">{{ trans('sentence.Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Schedule as $v=>$Schedule)
                <tr>
                    <td>{{$v+1}}</td>
                    <td>@foreach ($Doctor as $Doc)
                            @if ($Doc->id == $Schedule->doctor_id)
                                {{$Doc->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if (!$Schedule->days == 0)
                            @foreach (json_decode($Schedule->days) as $day)
                                {{$day.','}}
                            @endforeach    
                        @endif                        
                    </td>
                    <td>{{$Schedule->start_at}}</td>
                    <td>{{$Schedule->end_at}}</td>
                    <td>
                        @if ($Schedule->status == 0)
                        <span class="badge badge-danger">No</span>
                        @else
                        <span class="badge badge-success">Yes</span>
                        @endif
                    </td>                    
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if ($Schedule->status == 0)
                               <a class="dropdown-item" href="{{route('ActiveSchedule',$Schedule->id)}}">
                                <i class="fa fa-check"></i>{{ trans('sentence.Active')}}
                               </a>
                               @else
                               <a class="dropdown-item" href="{{route('InActiveSchedule',$Schedule->id)}}">
                                <i class="fa fa-times"></i>{{ trans('sentence.InActive')}}
                               </a> 
                               @endif
                                <a class="dropdown-item" href="{{route('Schedule.edit',$Schedule->id)}}">
                                    <i class="fa fa-pencil m-r-5"></i> {{ trans('sentence.Edit')}}
                                </a>
                                <form method="POST" action="{{route('Schedule.destroy',$Schedule->id)}}">
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
