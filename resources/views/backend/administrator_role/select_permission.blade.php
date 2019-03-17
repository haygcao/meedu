@extends('adminlte::page')

@section('title', '角色授权')

@section('content_header')
    <h1>角色授权</h1>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('backend.administrator_role.index') }}" class="btn btn-primary ml-auto">返回列表</a>
        </div>
        <div class="col-sm-12">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    @foreach($permissions as $permission)
                        <label>
                            <input type="checkbox"
                                   name="permission_id[]"
                                   value="{{ $permission->id }}"
                                    {{ $role->hasPermission($permission) ? 'checked' : '' }}> {{ $permission->display_name }}
                        </label><br>
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </form>
        </div>
    </div>

@endsection