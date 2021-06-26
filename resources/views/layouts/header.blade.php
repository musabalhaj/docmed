@if (str_replace('_', '-', app()->getLocale()) == 'en')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{asset('log/images/icons/favicon.ico')}}"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'DocMed') }}</title>
    
        
        <!-- Fonts -->
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
</head>
@else
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{asset('log/images/icons/favicon.ico')}}"/>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'DocMed') }}</title>
    
        
        <!-- Fonts -->
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_rtl.css') }}" rel="stylesheet">
        <link href="{{ asset('css/backend_rtl.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2-bootstrap.min.css') }}" rel="stylesheet">
</head>
@endif