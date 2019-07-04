@extends('layouts.app')

@section('title', $title = Auth::user()->getInfo('name') . '的学情分析报告')

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
            <!-- 图表容器 DOM -->
            <div id="container" style="min-width:400px;height:400px"></div>
            <!-- 引入 highcharts.js -->
            <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
            <script src="http://cdn.highcharts.com.cn/highcharts/highcharts.js"></script>
            <!-- <script src="http://cdn.highcharts.com.cn/highcharts/modules/offline-exporting.js"></script> -->
            <script src="http://cdn.highcharts.com.cn/highcharts/modules/exporting.js"></script>
            <script src="http://cdn.highcharts.com.cn/highcharts/modules/data.js"></script>
            <script src="https://code.highcharts.com.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
            <script>
                $.ajax({
                    url: 'http://localhost:9000/students/201626703004/score_reports',
                    type: 'GET',     // 请求类型，常用的有 GET 和 POST
                    data: {},
                    success: function (data) { // 接口调用成功回调函数
                        data = JSON.parse(data).data
                        var user_ss = data.standard_scores
                        var uname = '{{ Auth::user()->getInfo('name') }}'
                        var uid = '{{ Auth::user()->id }}'
                        console.log(user_ss);

                        var categories = []
                        var charts_data = []
                        for (var key in user_ss) {
                            categories.push(key)
                            charts_data.push(user_ss[key])
                        }

                        // 图表配置
                        var options = {
                            "xAxis": [
                                {
                                    "type": "linear",
                                    "categories": categories,
                                    "index": 0,
                                    "isX": true,
                                    "title": {
                                        "text": "学期"
                                    },
                                    "reversed": false,
                                    "opposite": false
                                }
                            ],
                            "series": [
                                {
                                    "name": "标准分",
                                    "data": charts_data,
                                    "_colorIndex": 0,
                                    "_symbolIndex": 0,
                                    "visible": true
                                }
                            ],
                            "yAxis": [
                                {
                                    "title": {
                                        "text": "标准分"
                                    },
                                    "index": 0
                                }
                            ],
                            "chart": {
                                "style": {
                                    "fontFamily": "'微软雅黑', Arial, Helvetica, sans-serif",
                                    "color": "#333",
                                    "fontSize": "12px",
                                    "fontWeight": "normal",
                                    "fontStyle": "normal"
                                },
                                "type": "spline",
                                "polar": false,
                                "width": null,
                                "inverted": false
                            },
                            "title": {
                                "text": "<strong>学期加权平均标准分</strong>",
                                "x": -20
                            },
                            "subtitle": {
                                "text": uname + "（" + uid + "）",
                                "x": -20
                            },
                            "tooltip": {
                                "valueSuffix": ""
                            },
                            "legend": {
                                "layout": "vertical",
                                "align": "right",
                                "verticalAlign": "middle",
                                "enabled": true
                            },
                            "plotOptions": {
                                "series": {
                                    "animation": false
                                }
                            },
                            "exporting": {
                                "scale": 2
                            },
                            "credits": {
                                "enabled": false
                            }
                        }
                        // 图表初始化函数
                        var chart = Highcharts.chart('container', options);

                        console.log(categories)
                        console.log(charts_data)
                    }
                });
            </script>
        </div>

    </div>
@endsection
