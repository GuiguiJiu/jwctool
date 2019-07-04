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
                           value="{{ $user->id }}" disabled>
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
                        @if($user->gender == 'm')
                        <option value="m" selected>男</option>
                        @else
                        <option value="f" selected>女</option>
                        @endif
                    </select>
                </div>
                <!-- 学院 -->
                <div class="form-group">
                    <label for="college">学院</label>
                    <input type="text" class="form-control" id="college" name="college-name"
                           value="{{ $user->college_name }}" disabled>
                </div>
                <!-- 专业 -->
                <div class="form-group">
                    <label for="major">专业</label>
                    <input type="text" class="form-control" id="major" name="major-name"
                           value="{{ $user->major_name }}" disabled>
                </div>
                <!-- 班级 -->
                <div class="form-group">
                    <label for="class">班级</label>
                    <input type="text" class="form-control" id="class" name="class-name"
                           value="{{ $user->class_name }}" disabled>
                </div>
            </form>
        </div>
        <div class="col-sm-2">
            <form>
                <div class="form-group">
                    <label for="photo">照片</label>
                    <a href="{{ "http://jwc.jxnu.edu.cn/StudentPhoto/{$user->id}.jpg" }}" target="_blank" disabled>
                        <img id="photo" class="img-thumbnail" src="{{ "http://jwc.jxnu.edu.cn/StudentPhoto/{$user->id}.jpg" }}" alt="photo" width="100%">
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
