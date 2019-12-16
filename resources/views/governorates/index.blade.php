@extends('layouts.app')

@section('title')
    المحافظات
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">
                المحافظات
            </h1>
            <span class="tag tag-danger float-left">d</span>
        </div>
        <table class="table table-hover table-bordered table-center table-active">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم المحافظة</th>
                <th scope="col">إعدادات</th>
            </tr>
            </thead>
            <tbody>
                @forelse($governorates as $governorate)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$governorate->name}}</td>
                        <td>
                            <a href="{{route('governorates.edit', $governorate->id)}}" class="btn btn-info btn-sm">
                                <i class="fe fe-edit"></i>
                            </a>
                            <a href="{{route('governorates.edit', $governorate->id)}}" class="btn btn-danger btn-sm">
                                <i class="fe fe-trash"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <div class="alert alert-warning">
                        لايوجد اى محافظات حتى الان.
                        <a href="{{route('governorates.create')}}" class="btn btn-success">
                            إنشاء محافظة
                        </a>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
