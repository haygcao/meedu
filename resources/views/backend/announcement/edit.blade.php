@extends('adminlte::page')

@section('title', '编辑公告')

@section('content_header')
    <h1>编辑公告</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-primary ml-auto" href="{{ route('backend.announcement.index') }}">返回公告列表</a>
        </div>
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>公告内容 @include('components.backend.required')</label>
                    @include('components.backend.editor', ['name' => 'announcement', 'content' => $announcement->announcement])
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>

@endsection