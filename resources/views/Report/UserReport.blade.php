@extends('layouts.master')
@section('content')
<h6>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('sentence.Home')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ trans('sentence.Users Report')}}</li>
        </ol>
    </nav>
</h6>
<div class="card-box">
    <div class="card-block">
        <form method="get" action="{{route('UserReport')}}" enctype="multipart/form-data">
            @csrf
            <div class="custom-form search">
                <div class="form-group">
                    <label for="role">{{ trans('sentence.Role')}}</label>
                    <select name="role" id="role">
                        <option value="2">{{ trans('sentence.Doctor')}}</option>
                        <option value="3">{{ trans('sentence.Laboratorist')}}</option>
                        <option value="4">{{ trans('sentence.Pharmacist')}}</option>
                        <option value="5">{{ trans('sentence.Accountant')}}</option>
                        <option value="6">{{ trans('sentence.Receptionist')}}</option>
                        <option value="7">{{ trans('sentence.Employees')}}</option>
                    </select>
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
                        <th>{{ trans('sentence.#ID')}}</th>
                        <th>{{ trans('sentence.Name')}}</th>
                        <th>{{ trans('sentence.Address')}}</th>
                        <th>{{ trans('sentence.E-mail')}}</th>
                        <th>{{ trans('sentence.Phone')}}</th>
                        @if (!empty($Users))
                        @foreach ($Users as $User)
                        @if ($User->role == 2)
                        <th>{{ trans('sentence.Department')}}</th>
                        @elseif ($User->role == 7)
                        <th>{{ trans('sentence.Jop')}}</th>
                        @endif
                        @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($Users))
                    @foreach ($Users as $v=>$User)
                    <tr>
                        <td>{{$v+1}}</td>
                        <td>{{$User->name}}</td>                
                        <td>{{$User->address}}</td>                
                        <td>{{$User->email}}</td>                
                        <td>{{$User->phone}}</td>                
                        @if ($User->role == 2)
                        <td>
                            @foreach ($Department as $dept)
                                @if ($User->department_id == $dept->id)
                                    {{$dept->name}}
                                @endif
                            @endforeach
                        </td>
                        @elseif ($User->role == 7)
                        <td>
                            @foreach ($Jop as $jop)
                                @if ($User->jop_id == $jop->id)
                                    {{$jop->name}}
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
