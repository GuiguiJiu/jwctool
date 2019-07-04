@extends('layouts.app')

@section('title', '登录')

@section('style')
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="{{ asset('/css/_inputs_build.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('container')
    <div class="login-form">
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

        <form class="clearfix" action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}

        <!-- title -->
            <h2 class="text-center">欢迎登录</h2>

            <!-- login form -->
            <div class="form-group">
                <label for="number">账号</label>
                <input type="text" class="form-control" id="number" name="number"
                       value="{{ old('number') }}" placeholder="工号 / 学号" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" id="password"
                       name="password" placeholder="首次登录请填写教务在线密码" required>
            </div>
            <div class="form-group text-center">
                <div class="radio radio-success radio-inline">
                    <input type="radio" id="type1" name="type" value="Teacher"
                           {{ old('type') == 'Teacher' ? 'checked' : '' }}>
                    <label for="type1"> 教师</label>
                </div>
                <div class="radio radio-success radio-inline">
                    <input type="radio" id="type2" name="type" value="Student"
                        {{ old('type') == 'Student' ? 'checked' : '' }} checked>
                    <label for="type2"> 学生</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger form-control">登 录</button>
            </div>
            @if (session('msg'))
                <div class="text-center">
                    <span class="error-msg">{{ session('msg') }}</span>
                </div>
            @endif
            <div class="form-group">
                <div class="pull-left">
                    <a href="{{ route('password.request') }}">找回密码</a>
                </div>
                <div class="checkbox checkbox-success pull-right">
                    <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">记住我</label>
                </div>
            </div>
        </form>
    </div>
@endsection
