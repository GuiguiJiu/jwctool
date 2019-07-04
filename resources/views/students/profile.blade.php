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
                    <div type="text" class="well well-sm" id="user-id" name="uid"
                    >{{ Auth::id() }}
                    </div>
                </div>
                <!-- 姓名 -->
                <div class="form-group">
                    <label for="name">姓名</label>
                    <div type="text" class="well well-sm" id="name" name="name"
                    >{{ Auth::user()->getInfo('name') }}
                    </div>
                </div>
                <!-- 性别 -->
                <div class="form-group">
                    <label for="select">性别</label>
                    <div type="text" class="well well-sm" id="gender" name="gender">
                        {{ Auth::user()->getInfo('gender') == 'm' ? '男' : '女' }}
                    </div>
                </div>
                <!-- 学院 -->
                <div class="form-group">
                    <label for="college">学院</label>
                    <div type="text" class="well well-sm" id="college" name="college-name">
                        {{ Auth::user()->getInfo('college_name') }}
                    </div>
                </div>
                <!-- 专业 -->
                <div class="form-group">
                    <label for="major">专业</label>
                    <div type="text" class="well well-sm" id="major" name="major-name">
                        {{ Auth::user()->getInfo('major_name') }}
                    </div>
                </div>
                <!-- 班级 -->
                <div class="form-group">
                    <label for="class">班级</label>
                    <div type="text" class="well well-sm" id="class" name="class-name">
                        {{ Auth::user()->getInfo('class_name') }}
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-2">
            <form>
                <div class="form-group">
                    <label for="photo">照片</label>
                    <a href="{{ Auth::user()->getAvatar() }}" target="_blank" disabled>
                        <img id="photo" class="img-thumbnail" src="{{ Auth::user()->getAvatar() }}" alt="photo"
                             width="100%">
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
