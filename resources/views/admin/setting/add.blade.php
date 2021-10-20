@extends('layouts.admin')

@section('title')
    <title>Settings</title>

@endsection

@section('content')

    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Settings', 'key' => 'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Config key</label>
                                <input type="text"
                                       name="config_key"
                                       class="form-control"
                                       placeholder="Nhập config key">
                            </div>

                            @if(request()->type === 'Text')
                                <div class="form-group">
                                    <label>Config value</label>
                                    <input type="text"
                                           name="config_key"
                                           class="form-control"
                                           placeholder="Nhập config key">
                                </div>
                                @elseif(request()->type === 'Textarea')
                                <textarea
                                       name="config_key"
                                       class="form-control"
                                       placeholder="Nhập config key"
                                       rows="5">
                                </textarea>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



