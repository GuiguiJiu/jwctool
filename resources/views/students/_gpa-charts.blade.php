<!-- 图表容器 DOM -->
<div id="gpa-charts" style="min-width:400px; height:400px; border:1px solid #000;"></div>
<!-- 引入 highcharts.js -->
<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
<script src="http://cdn.highcharts.com.cn/highcharts/highcharts.js"></script>
<script src="http://cdn.highcharts.com.cn/highcharts/modules/exporting.js"></script>
<script src="http://cdn.highcharts.com.cn/highcharts/modules/data.js"></script>
<script src="https://code.highcharts.com.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
<script>
    var categories = []
    var normal_gpas = JSON.parse('<?php echo $normal_gpa; ?>')
    var normal_gpas_pro = JSON.parse('<?php echo $normal_gpa_pro; ?>')
    var normal1_gpas = JSON.parse('<?php echo $normal1_gpa; ?>')
    var normal2_gpas = JSON.parse('<?php echo $normal2_gpa; ?>')
    var beida_gpas = JSON.parse('<?php echo $beida_gpa; ?>')
    var normal_gpa = []
    var normal_gpa_pro = []
    var normal1_gpa = []
    var normal2_gpa = []
    var beida_gpa = []
    for(var term in normal_gpas.gpas) {
        categories.push(term)
        normal_gpa.push(Number(normal_gpas.gpas[term]))
        normal_gpa_pro.push(Number(normal_gpas_pro.gpas[term]))
        normal1_gpa.push(Number(normal1_gpas.gpas[term]))
        normal2_gpa.push(Number(normal2_gpas.gpas[term]))
        beida_gpa.push(Number(beida_gpas.gpas[term]))
    }

    var series = []

    var options = {
        "chart": {
            "type": 'spline',
            "style": {
                "fontFamily": "'微软雅黑', Arial, Helvetica, sans-serif",
                "color": "#333",
                "fontSize": "12px",
                "fontWeight": "normal",
                "fontStyle": "normal"
            },
        },
        "title": {
            "text": '<strong><?php echo $user->name; ?>的GPA绩点</strong>'
        },
        "subtitle": {
            "text": '<?php echo $user->name; ?>（<?php echo $user->id; ?>）',
        },
        "xAxis": {
            "categories": categories
        },
        "yAxis": {
            "title": {
                "text": 'GPA'
            },
            "labels": {
                "formatter": function () {
                    return this.value;
                }
            }
        },
        "tooltip": {
            "crosshairs": true,
            "shared": true
        },
        "series": [{
            "name": '标准加权算法',
            "data": normal_gpa
        }, {
            "name": '标准4.0算法',
            "data": normal_gpa_pro
        }, {
            "name": '改进4.0算法(1)',
            "data": normal1_gpa
        }, {
            "name": '改进4.0算法(2)',
            "data": normal2_gpa
        }, {
            "name": '北大4.0算法',
            "data": beida_gpa
        }],
        "credits": {
            "enabled": false
        }
    };
    var chart = Highcharts.chart('gpa-charts', options);
</script>