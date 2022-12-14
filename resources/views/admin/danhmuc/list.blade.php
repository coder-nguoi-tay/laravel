@extends('layout.layout-admin.layout-admin')
@section('title', 'Tài khoản')
@yield('name-trang', 'Thêm tài khoản')
@section('content')
    <style>
        .green {
            background: green;
        }
    </style>
    <div class="container">
        @if (Session::has('thongbao'))
            <div class="alert alert-success thongbao">
                {{ Session::get('thongbao') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger thongbao">
                {{ Session::get('error') }}
            </div>
        @endif
        <link rel="stylesheet" href="{{ asset('/dist/css/style.css') }}">
        <div class="table-responsive">
            {{-- <span class="kq"></span> --}}
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên danh mục</th>
                        <th colspan="2"><a href="{{route('danhmuc_create')}}"><button class="btn btn-primary">Thêm</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhmuc as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{route('danhmuc_edit',$item->id)}}"><i class="far fa-edit"></i></a>|
                                <a href="{{route('danhmuc_delete',$item->id)}}" onclick="return confirm('bạn có chắc muốn xóa')">
                                    <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
