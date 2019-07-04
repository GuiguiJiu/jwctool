@extends('layouts.app')

@section('title', '修改信息')

@section('container')
    <div class="row">
        <h2 class="text-center" style="margin-bottom: 40px;">修改信息</h2>
        <div class="col-sm-3">
            <div class="list-group">
                <a href="/profile" class="list-group-item">个人信息</a>
                <a href="/edit" class="list-group-item active">修改信息</a>
                <a href="/password/update" class="list-group-item">修改密码</a>
            </div>
        </div>

        <div class="col-sm-7">
            <form class="">
                <!-- 邮箱 -->
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="{{ $user->email }}">
                </div>
                <!-- 职称 -->
                <div class="form-group">
                    <label for="title">职称</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{ $user->title }}">
                </div>
                <!-- 教学简介 -->
                <div class="form-group">
                    <label for="introduction">教学简介</label>
                    <textarea rows="4" class="form-control" id="introduction"
                              name="introduction">{{ $user->introduction }}</textarea>
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-sm btn-success">更新</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-2">
            <form class="">
                <div class="form-group">
                    <label for="photo">照片</label>
                    <a href="{{ Auth::user()->getAvatar() }}" target="_blank" disabled>
                        <img id="photo" class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" alt="photo" width="100%">
                    </a>
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <button type="button" class="btn btn-sm" style="background-color: #0b0b0b; color: #fff;" disabled>更换照片</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
