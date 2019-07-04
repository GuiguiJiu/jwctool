@extends('layouts.app')

@section('title', '重置密码')

@section('style')
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="{{ asset('/css/_inputs_build.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('container')
    <div class="" style="margin: 0 auto;">
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

        <div class="panel panel-danger">
            <div class="panel-heading">重置密码</div>

            <div class="panel-body login-form">
                <form method="POST" action="{{ route('password.update') }}">
                {{ csrf_field() }}
                <!-- 账号 -->
                    <div class="form-group">
                        <label for="uid">账号</label>
                        <input id="uid" class="form-control" name="uid" type="text"
                               value="{{ old('uid') }}" placeholder="工号 / 学号" required autofocus>
                    </div>
                    <!-- 密码 -->
                    <div class="form-group">
                        <label for="pwd">密码</label>
                        <input id="pwd" class="form-control" name="pwd" type="password"
                               placeholder="请填写教务在线密码" required>
                    </div>
                    <!-- 用户类型 -->
                    <div class="form-group text-center">
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="type-tea" name="type" value="Teacher"
                                {{ old('type') == 'Teacher' ? 'checked' : '' }}>
                            <label for="type-tea"> 教师</label>
                        </div>
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="type-stu" name="type" value="Student"
                                   {{ old('type') == 'Student' ? 'checked' : '' }} checked>
                            <label for="type-stu"> 学生</label>
                        </div>
                    </div>
                    <!-- 提交按钮 -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger form-control">提 交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
