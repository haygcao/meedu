@extends('adminlte::page')

@section('title', '插件')

@section('content_header')
    <h1>插件</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{route('backend.addons.index')}}" class="btn btn-primary ml-auto btn-sm">返回插件列表</a>
        </div>
        <div class="col-sm-12">
            <h3>{{$addons->name}}的日志</h3>
            @foreach($logs as $log)

                <div class="card">
                    <div class="card-header">
                        {{$log->version}} | {{$log->type}} | {{$log->created_at}}
                    </div>
                    <div class="card-body">
                        <pre>{{$log->log}}</pre>
                    </div>
                </div>

                @endforeach
        </div>
    </div>

@endsection