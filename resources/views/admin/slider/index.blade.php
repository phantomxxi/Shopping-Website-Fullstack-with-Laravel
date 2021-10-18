@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Slider', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($menus as $menu)--}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Slider 1</td>
                                    <td>Mô tả</td>
                                    <td></td>
                                    <td>
                                        <a href="" class="btn btn-default">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{--                        {{ $menus->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



