<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  @foreach($score_reports as $term => $reports)
  <div class="panel panel-success">
    <div class="panel-heading" role="tab" id="heading-{{ $term }}">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $term }}" aria-expanded="false" aria-controls="collapse-{{ $term }}">
        {{ $term }}
        </a>
      </h4>
    </div>
    <div id="collapse-{{ $term }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="{{ $term }}">
      <div class="panel-body">
      <table class="table table-striped table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="text-center" width="10%">课程号</th>
                <th class="text-center" width="40%">课程名称</th>
                <th class="text-center" width="10%">课程成绩</th>
                <th class="text-center" width="10%">补考成绩</th>
                <th class="text-center" width="10%">所得学分</th>
                <th class="text-center" width="10%">标准分</th>
                <th class="text-center" width="10%">备注</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                @if($report['所得学分'] == 0)
                    <tr class="text-muted">
                @elseif($report['课程成绩'] && $report['课程成绩'] < 60)
                    <tr class="text-danger">
                @elseif($report['标准分'] >= 0.8)
                    <tr class="text-success">
                @elseif($report['标准分'] <= -0.8)
                    <tr class="text-warning">
                @endif
                <td>{{ $report['课程号'] }}</td>
                <td>{{ $report['课程名称'] }}</td>
                <td>{{ $report['课程成绩'] }}</td>
                <td>{{ $report['补考成绩'] }}</td>
                <td>{{ $report['所得学分'] }}</td>
                <td>{{ $report['标准分'] }}</td>
                <td>{{ $report['备注'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
      </div>
    </div>
  </div>
    
@endforeach
</div>
<h6>注意：</h6>
<p class="small text-success">绿色表示课程成绩较优秀的课程 (标准分 > 0.8)</p>
<p class="small text-warning">橙色表示课程成绩较薄弱的课程 (标准分 < -0.8)</p>
<p class="small text-danger">红色表示不及格的课程 (包含已补考的课程)</p>
<p class="small text-muted">灰色表示误选课程，不计入统计</p>