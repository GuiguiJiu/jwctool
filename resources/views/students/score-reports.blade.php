@extends('layouts.app')

@section('title', $title = $user->getInfo('name') . '的成绩报告单')

@section('container')
    <div class="row">
        <h2 class="text-center" style="margin-bottom: 40px;">{{ $title }}</h2>

        <div class="col-md-3">
            <div class="list-group">
                <a class="list-group-item {{ Request::getPathInfo() == '/score-reports' ? 'active' : '' }}"
                   href="{{ route('score-reports') }}">成绩报告单</a>
                <a class="list-group-item {{ Request::getPathInfo() == '/report-analyze' ? 'active' : '' }}"
                   href="{{ route('report-analyze') }}">学情分析报告</a>
                </a>
            </div>
        </div>

        <div class="col-md-9">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#jwc" aria-controls="jwc" role="tab" data-toggle="tab">教务在线</a>
                </li>
                <li role="presentation">
                    <a href="#qh-gpa" aria-controls="qh-gpa" role="tab" data-toggle="tab">GPA绩点</a>
                </li>
                </li>
                <li role="presentation">
                    <a href="#test" aria-controls="test" role="tab" data-toggle="tab">TEST</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="jwc">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <strong>警告!</strong> 您当前已挂科科目数为<strong class=""> 5 </strong>门.
                    </div>
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <strong>提示！</strong> 您当前已修总学分为<strong class=""> 127 </strong>分.
                    </div>
                    @include('students._jwc-reports')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="qh-gpa">
                    @include('students._gpa-charts')
                </div>
                <div role="tabpanel" class="tab-pane fade" id="test">

                </div>
            </div>
        </div>
    </div>
@endsection
