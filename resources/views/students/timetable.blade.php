@extends('layouts.app')

@section('title', $title = $user_name . '的选课')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                @foreach($all_terms_timetables as $index => $item)
                <li role="presentation">
                    <a href="#{{ $item->year . $item->term }}" aria-controls="{{ $item->year . $item->term }}" role="tab" data-toggle="tab">{{ $item->year . '学年第'. ($item->term == 'a'? '一': '二') .'学期' }}</a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach($all_terms_timetables as $index => $item)
                <div role="tabpanel" class="tab-pane fade" id="{{ $item->year . $item->term }}">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <strong>①</strong> 您当前已选课程为<strong class=""> 13 </strong>门.
                    </div>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        <strong>②</strong> 您当前所选课程总学分<strong class=""> 30 </strong>分.
                    </div>
                    <div class="row">
                        @foreach($item->timetable as $key => $course)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <div class="caption">
                                    <h4>
                                        <span class=" label label-{{ $course['course_credit'] < 4 ? 'success' : 'danger' }}">
                                            {{ $course['course_credit'] }}学分</span>
                                        {{ $course['course_name'] }}
                                    </h4>
                                    <!-- <p class="text-muted small">{{ $course['course_identification'] }}</p> -->
                                    <p><b>学分：</b>{{ $course['course_credit'] }}</p>
                                    <p><b>任课教师：</b>{{ $course['teacher_name'] }}</p>
                                    <p><b>上课地点：</b>{{ $course['course_address'] }}</p>
                                    <p><b>上课班级：</b>{{ $course['course_class_name'] }}</p>
                                    <p><b>上课时间：</b>每周{{ $course['week'] }}, 第{{ $course['begin_at'] }}{{ $course['lessons'] > 1 ? '-'. ($course['begin_at']+$course['lessons']-1): '' }}节课</p>
                                    <p>
                                        <a href="{{ 'http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx?UserControl=Xfz_Class_student.ascx&bjh=' .  $course['course_class_id']. '&kch=' . $course['course_id'] . '&xq='. ($item->term == 'a' ? $item->year . '/9/1' : ($item->year+1).'/3/1') }}" class="btn btn-sm btn-primary" role="button">花名册</a>
                                        <a href="#" class="btn btn-sm btn-default" role="button">Button</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
@endsection

@section('end_script')
<script>
    $(".tab-pane:first").addClass('active').addClass('in');
    $(".nav-tabs li:first").addClass('active');
</script>
@endsection