@extends('layouts.app')

@section('title')
    المحافظات
@endsection

@section('pageTitle')
المحافظات
@endsection

@section('content')
    <div class="container">
        <governorates :data="{{$governorates}}"></governorates>
    </div>
@endsection
