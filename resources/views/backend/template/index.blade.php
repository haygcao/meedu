@extends('adminlte::page')

@section('title', '模板')

@section('content_header')
    <h1>模板</h1>
@endsection

@section('content')

    <div class="row">
        @foreach($templates as $template)
        <div class="col-sm-4">
            <div class="card">
                <img class="card-img-top" src="{{$template->thumb}}">
                <div class="card-body">
                    <h5 class="card-title">{{$template->name}}</h5>
                    <p>作者：{{$template->author}}</p>
                    <p>版本：{{$template->current_version}}</p>
                    @if($currentTemplate == $template->name)
                        <span class="badge badge-success">已设置为默认模板</span>
                        @else
                        <a href="{{route('backend.template.set.default', $template)}}" class="btn btn-primary">设置为默认模板</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection