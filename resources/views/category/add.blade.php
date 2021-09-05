@extends('layouts.admin')

@section('title')
    <title>Trang chu</title>

@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'category', 'key' => 'Add']);
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form>
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="email" class="form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label >Chọn danh mục cha</label>
                                <select class="form-control">
                                    <option value="0">Chọn danh mục cha</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection



