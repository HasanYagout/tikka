@extends('layouts.front-end.app')

@section('title',\App\CPU\translate('return_policy'))

@push('css_or_js')
    <meta property="og:image" content="{{asset('public/storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Terms & conditions of {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ e(substr($web_config['about']->value, 0, 100)) }}">

    <meta property="twitter:card" content="{{asset('public/storage/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Terms & conditions of {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{{ e(substr($web_config['about']->value, 0, 100)) }}">

@endpush

@section('content')
    <div class="container py-5 rtl" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};">
        <h2 class="text-center mb-3 headerTitle">{{\App\CPU\translate('return_policy')}}</h2>
        <div class="card __card">
            <div class="card-body">
                {!! $return_policy !!}
            </div>
        </div>
    </div>
@endsection
