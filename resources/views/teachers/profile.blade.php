@extends('layouts.app')

@section('title', '个人信息')

@section('container')
    <div class="row">
        <h2 class="text-center" style="margin-bottom: 40px;">个人信息</h2>
        <div class="col-sm-3">
            <div class="list-group">
                <a href="/profile" class="list-group-item active">个人信息</a>
                <a href="/edit" class="list-group-item">修改信息</a>
                <a href="/password/update" class="list-group-item">修改密码</a>
            </div>
        </div>
        <div class="col-sm-7">
            <form>
                <!-- ID -->
                <div class="form-group">
                    <label for="user-id">ID</label>
                    <input type="text" class="form-control" id="user-id" name="uid"
                           value="{{ Auth::id() }}" disabled>
                </div>
                <!-- 姓名 -->
                <div class="form-group">
                    <label for="name">姓名</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ $user->name }}" disabled>
                </div>
                <!-- 性别 -->
                <div class="form-group">
                    <label for="select">性别</label>
                    <select class="form-control" id="gender" name="gender" disabled>
                        <option value="m" {{ $user->gender == 'm' ? 'selected' : '' }}>男</option>
                        <option value="f" {{ $user->gender == 'f' ? 'selected' : '' }}>女</option>
                    </select>
                </div>
                <!-- 学院 -->
                <div class="form-group">
                    <label for="college">学院</label>
                    <input type="text" class="form-control" id="college" name="college-name"
                           value="{{ $user->college->name }}" disabled>
                </div>
                <!-- 邮箱 -->
                <div class="form-group">
                    <label for="college">E-mail</label>
                    <p class="form-control" id="college">{{ $user->email }}</p>
                </div>
                <!-- 职称 -->
                <div class="form-group">
                    <label for="title">职称</label>
                    <p class="form-control" id="title">{{ $user->title }}</p>
                </div>
                <!-- 教学简介 -->
                <div class="form-group">
                    <label for="introduction">教学简介</label>
                    <textarea rows="4" class="form-control" id="introduction"
                              name="introduction" disabled>{{ $user->introduction }}</textarea>
                </div>
            </form>
        </div>
        <div class="col-sm-2">
            <form>
                <div class="form-group">
                    <label for="photo">照片</label>
                    <a href="{{ Auth::user()->getAvatar() }}" target="_blank" disabled>
                        <img id="photo" class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" alt="photo" width="100%">
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
