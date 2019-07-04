@extends('layouts.app')

@section('title', '修改密码')

@section('container')
    <div class="row">
        <h2 class="text-center" style="margin-bottom: 40px;">修改密码</h2>
        @foreach(['success', 'danger', 'warning', 'status'] as $msg)
            @if (session()->has($msg))
                <div class="alert alert-{{$msg}} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <strong>提示：</strong> {{ session()->get($msg) }}
                </div>
            @endif
        @endforeach
        <div class="col-sm-3">
            <div class="list-group">
                <a href="/profile" class="list-group-item">个人信息</a>
                <a href="/edit" class="list-group-item">修改信息</a>
                <a href="/password/update" class="list-group-item active">修改密码</a>
            </div>
        </div>

        <div class="col-sm-9">
            <form class="" action="{{ url('password/update') }}" method="POST">
            {{ csrf_field() }}
            <!-- 原密码 -->
                <div class="form-group">
                    <label for="old-pwd">原密码</label>
                    <input type="password" class="form-control" id="old-pwd" name="old-pwd">
                </div>
                <!-- 新密码 -->
                <div class="form-group">
                    <label for="new-pwd">新密码</label>
                    <input type="password" class="form-control" id="new-pwd" name="new-pwd">
                </div>
                <!-- 确认密码 -->
                <div class="form-group">
                    <label for="check-pwd">确认密码</label>
                    <input type="password" class="form-control" id="check-pwd" name="check-pwd">
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-sm btn-success">更新</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
