@extends('adminlte::page')

@section('title', '后台菜单')

@section('content_header')
    <h1>后台菜单</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{route('backend.administrator_menu.create')}}" class="btn btn-primary ml-auto">添加</a>
        </div>
        <div class="col-sm-12 mt-2">
            <ul class="list-group">
                @foreach($menus as $menu)
                    <li class="list-group-item"><a href="{{route('backend.administrator_menu.edit', $menu)}}"><b>{{$menu->name}}</b></a></li>
                    @foreach($menu->children as $child)
                        <li class="list-group-item"><a href="{{route('backend.administrator_menu.edit', $child)}}">|---- {{$child->name}}</a></li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>


@endsection