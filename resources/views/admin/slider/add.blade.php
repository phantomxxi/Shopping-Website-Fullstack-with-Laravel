@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'sliders', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Nhập tên slider">
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <input type="text"
                                       name="description"
                                       class="form-control"
                                       placeholder="Nhập mô tả">
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file"
                                       name="image_path"
                                       class="form-control-file"
                                >
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



