@extends('layouts.app')

@section('title', $title = Auth::user()->getInfo('name') . '的成绩报告单')

@section('container')
    <div class="row">
        <h2 class="text-center">{{ $title }}</h2>

        <div class="col-md-2">
            <div class="list-group">
                <a class="list-group-item {{ Request::getPathInfo() == '/score-reports' ? 'active' : '' }}"
                   href="{{ route('score-reports') }}" >成绩报告单</a>
                <a class="list-group-item {{ Request::getPathInfo() == '/report-analyze' ? 'active' : '' }}"
                   href="{{ route('report-analyze') }}">学情分析报告</a>
                </a>
            </div>
        </div>

        <div class="col-md-10">
            @foreach($data['reports'] as $term => $reports)
                <h4 class="">{{ $term }}</h4>
                <table class="table table-striped table-hover text-center">
                    <thead>
                        <tr>
                        @foreach($reports[0] as $key => $val)
                            <th class="text-center">{{$key}}</th>
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            @foreach($report as $item)
                            <td>{{$item}}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection
