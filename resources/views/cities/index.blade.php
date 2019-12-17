@extends('layouts.app')

@section('title')
    المدن
@endsection

@section('pageTitle')
    المدن
@endsection

@section('content')
    <div class="container">
        <cities :cities="{{$cities}}" :governorates="{{$governorates}}"></cities>
    </div>
@endsection
