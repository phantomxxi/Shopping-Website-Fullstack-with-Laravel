@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/slider/add/add.css') }}">
    <style>
        .card-header{
            background-color: #00c765;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Roles', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <form action="" method="post" enctype="multipart/form-data" style="width: 100%">
                        <div class="col-md-12">
                            @csrf
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên vai trò"
                                       value="{{ old('name') }}"
                                >
                            </div>

                            <div class="form-group">
                                <label>Mô tả vai trò</label>
                                <textarea
                                    class="form-control"
                                    name="description"
                                    rows="4">{{ old('display_name') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">



                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="">
                                            </label>
                                            Module sản phẩm
                                        </div>
                                        <div class="row">
                                            @for($i = 1; $i <= 4; $i++)
                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" value="">
                                                        </label>
                                                        Thêm sản phẩm
                                                    </h5>
                                                </div>
                                            @endfor
                                        </div>

                                    </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
