@extends('adminlte::page')

@section('title', '章节列表')

@section('content_header')
    <h1>章节列表</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('backend.book.chapter.create', [$book->id]) }}" class="btn btn-primary ml-auto">添加</a>
        </div>
        <div class="col-sm-12">
            <h3>电子书 <b>《{{$book->title}}》</b> 的章节</h3>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>章节名</th>
                    <th>上线时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @forelse($chapters as $chapter)
                <tr>
                    <td>{{$chapter->id}}</td>
                    <td>{{$chapter->title}}</td>
                    <td>{{$chapter->published_at}}</td>
                    <td>
                        <a href="{{route('backend.book.chapter.edit', [$chapter->book_id, $chapter->id])}}" class="btn btn-warning btn-sm">编辑</a>
                        @include('components.backend.destroy', ['url' => route('backend.book.chapter.destroy', [$chapter->book_id, $chapter->id])])
                    </td>
                </tr>
                    @empty
                <tr>
                    <td colspan="4" class="text-center">暂无记录</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
