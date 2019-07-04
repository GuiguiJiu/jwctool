@extends('layouts.app')

@section('title', '修改信息')

@section('style')
{{--    <link rel="stylesheet" href="">--}}
<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;outline:none;}
    a,img{border:0;}
    em{font-style:normal;}
    body{font-size:12px;font-family:microsoft yahei;}
    a,a:visited{color:#5e5e5e;text-decoration:none;}
    /*a:hover{color:#3366cc!important;text-decoration:none;}*/
    .clear{display:block;overflow:hidden;clear:both;height:0;line-height:0;font-size:0;}
    .clearfix:after{content:".";display:block;height:0;clear:both;visibility:hidden;}
    .clearfix{display:inline-table;}/* Hides from IE-mac \*/
    *html .clearfix{height:1%;}
    .clearfix{display:block;}/* End hide from IE-mac */
    *+html .clearfix{min-height:1%;}
    .demo{width:450px;margin:40px auto;position:relative;}
    /* Form input */
    .Form li{font-size:21px;font-weight:300}
    .Form input[type=text],.Form input[type=password],.Form textarea{
        display:inline-block;padding:6px 12px;font-size:18px;font-weight:300;line-height:1.4;color:#221919;background:#fff;border:1px solid #a4a2a2;
        box-sizing:border-box;
        -moz-box-sizing:border-box;
        -ms-box-sizing:border-box;
        -webkit-box-sizing:border-box;
        border-radius:6px;
        -moz-border-radius:6px;
        -webkit-border-radius:6px;
        box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
        -moz-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
        -webkit-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
        -webkit-transition:all .08s ease-in-out;
        -moz-transition:all .08s ease-in-out;
    }
    .Form textarea{min-height:90px}
    .Form label{display:inline-block;line-height:1.4em;font-size:18px}
    .Form input[type=text]:focus,.Form input[type=password]:focus,.Form textarea:focus{
        border-color:#006499;
        box-shadow:0 1px rgba(34, 25, 25, 0.15) inset, 0 1px rgba(255, 255, 255, 0.8), 0 0 14px rgba(82, 162, 235, 0.35);
        -moz-box-shadow:0 1px rgba(34, 25, 25, 0.15) inset, 0 1px rgba(255, 255, 255, 0.8), 0 0 14px rgba(82, 162, 235, 0.35);
        -webkit-box-shadow:0 1px rgba(34, 25, 25, 0.15) inset, 0 1px rgba(255, 255, 255, 0.8), 0 0 14px rgba(82, 162, 235, 0.35);
    }
    .FancyForm li,.FancyForm li .input{position:relative}
    .FancyForm input[type=text],.FancyForm input[type=password],.FancyForm textarea{
        position:relative;z-index:3;display:block;width:100%;background:transparent;border:1px solid #a4a2a2;
        border-radius:6px;
        -moz-border-radius:6px;
        -webkit-border-radius:6px;
        box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
        -moz-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
        -webkit-box-shadow:inset 0 1px rgba(34,25,25,.15),0 1px rgba(255,255,255,.8);
        -webkit-transition:all .08s ease-in-out;
        -moz-transition:all .08s ease-in-out;
    }
    .FancyForm textarea{min-height:3.95em;line-height:1.3}
    .FancyForm label{
        position:absolute;z-index:2;top:7px;left:13px;display:block;color:#BCBCBC;cursor:text;
        -moz-user-select:none;
        -webkit-user-select:none;
        -moz-transition:all .16s ease-in-out;
        -webkit-transition:all .16s ease-in-out;
    }
    .FancyForm .fff{
        position:absolute;z-index:1;top:0;right:0;left:3px;bottom:0;background-color:#fff;
        border-radius:8px;
        -moz-border-radius:8px;
        -webkit-border-radius:8px;
    }
    .FancyForm input[type=text]:focus+label,.FancyForm input[type=password]:focus+label,.FancyForm textarea:focus+label{opacity:.5;filter:alpha(opacity="50");}
    .FancyForm .val label{left:-9999px;opacity:0!important;filter:alpha(opacity="0")!important;}
    /* Button base */
    .Button{
        position:relative;
        display:inline-block;
        padding:.45em .825em .45em;
        text-align:center;
        line-height:1em;
        border:1px solid transparent;
        cursor:pointer;
        border-radius:.3em;
        background:#39F;
        color:#fff;
    }
    /* tag */
    .default-tag a,.default-tag a span,.plus-tag a,.plus-tag a em,.plus-tag-add a{background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABuCAMAAACqRN6UAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAwBQTFRFLZHFFofZ////1NTU/f398/Pzs9/7tN/7+v3//v7+9PT07Pf+tOD7+/v7+vr68vLy9fX1+fn5u+P79vv+9vb2/v//vuX8tOD6uOL8tuH7yer8xef7vOT8uuL73PH9w+X7t+L88/r+tuD64/P+s+D73vL9w+f7zev8/f7/uOD7+Pj4yOj8veT79Pv/7/n+/P7/3PD94vP9+/3//Pz8zur86vb+teD78fHx////OTk5Ojo6Ozs7PDw8PT09Pj4+Pz8/QEBAQUFBQkJCQ0NDRERERUVFRkZGR0dHSEhISUlJSkpKS0tLTExMTU1NTk5OT09PUFBQUVFRUlJSU1NTVFRUVVVVVlZWV1dXWFhYWVlZWlpaW1tbXFxcXV1dXl5eX19fYGBgYWFhYmJiY2NjZGRkZWVlZmZmZ2dnaGhoaWlpampqa2trbGxsbW1tbm5ub29vcHBwcXFxcnJyc3NzdHR0dXV1dnZ2d3d3eHh4eXl5enp6e3t7fHx8fX19fn5+f39/gICAgYGBgoKCg4ODhISEhYWFhoaGh4eHiIiIiYmJioqKi4uLjIyMjY2Njo6Oj4+PkJCQkZGRkpKSk5OTlJSUlZWVlpaWl5eXmJiYmZmZmpqam5ubnJycnZ2dnp6en5+foKCgoaGhoqKio6OjpKSkpaWlpqamp6enqKioqampqqqqq6urrKysra2trq6ur6+vsLCwsbGxsrKys7OztLS0tbW1tra2t7e3uLi4ubm5urq6u7u7vLy8vb29vr6+v7+/wMDAwcHBwsLCw8PDxMTExcXFxsbGx8fHyMjIycnJysrKy8vLzMzMzc3Nzs7Oz8/P0NDQ0dHR0tLS09PT1NTU1dXV1tbW19fX2NjY2dnZ2tra29vb3Nzc3d3d3t7e39/f4ODg4eHh4uLi4+Pj5OTk5eXl5ubm5+fn6Ojo6enp6urq6+vr7Ozs7e3t7u7u7+/v8PDw8fHx8vLy8/Pz9PT09fX19vb29/f3+Pj4+fn5+vr6+/v7/Pz8/f39/v7+////XVZtLQAAADl0Uk5T//////////////////////////////////////////////////////////////////////////8AOqxlQAAAAbNJREFUeNrs2slOAlEQRuHbGyXBFQac5znORk2//zP0i4hDVIQ2kYtx139trC5yToJbO59Y1L0hPVFjL+W0BEVzwxFYes9jsPTewDL0AZahEVi2sQWW2usELMvYAkvvCyzD2ALLcOoBS28MltwnA95y4gGLpZTjjmfvHKQtZx2wxIZc/lm2BrDk1X2SsR6psY0+WHK9B7DkFgd7YMkt3N+BJbdyBJbebhcsuaWLZbD0IX/eAUsf8jenYMntd8HS2wRL7xgsubNLsOQBf9sHS10dTq5ZHdSldMBSKrfKcUfucJuDtDzc1ztgqQOrd8Xln9rWAdfKams7nYxVkhxYYIEFFlhgEVhggQUWWGARWGCBBRZYYBFYRqyqivCgfwMLrPnAKvIzVLkAWHU9+/HvWEVArPrn5YFVhPs3rOuplQdWEW5mZSuwWv7OCrWUOs+sMh6W26dhGQ6rFUspWGBx6+B+60BggQUWWGCBRWCBBRZYYIFFYIEFFlhggUVggQUWWGCBlRCbM6zUgicNhJXK5I3l/F0L45M6/N4iFwrL7X31axVowPv9SWdWzCxNi09Dc98CDACb62WWSbGtfQAAAABJRU5ErkJggg==) no-repeat;}
    .tagbtn a{color:#333333;display:block;float:left;height:22px;line-height:22px;overflow:hidden;margin:0 10px 10px 0;padding:0 10px 0 5px;white-space:nowrap;}
    /* default-tag */
    .default-tag{padding:16px 0 0 0;}
    .default-tag a{background-position:100% 0;}
    .default-tag a:hover{background-position:100% -22px;}
    .default-tag a span{padding:0 0 0 11px;background-position:0 -60px;}
    .default-tag a:hover span{background-position:0 -98px;}
    .default-tag a.selected{opacity:0.6;filter:alpha(opacity=60);}
    .default-tag a.selected:hover{background-position:100% 0;cursor:default;}
    .default-tag a.selected:hover span{background-position:0 -60px;}
    /* plus-tag */
    .plus-tag{padding:0 0 10px 0;}
    .plus-tag a{background-position:100% -22px;}
    .plus-tag a span{float:left;}
    .plus-tag a em{display:block;float:left;margin:5px 0 0 8px;width:13px;height:13px;overflow:hidden;background-position:-165px -100px;cursor:pointer;}
    .plus-tag a:hover em{background-position:-168px -64px;}
    /* plus-tag-add */
    .plus-tag-add li{height:56px;position:relative;}
    .plus-tag-add li .label{position:absolute;left:-110px;top:7px;display:block;}
    .plus-tag-add button{float:left;}
    .plus-tag-add a{float:left;margin:12px 0 0 20px;display:inline;font-size:18px;background-position:-289px -59px;padding:0 0 0 16px;}
    .plus-tag-add a.plus{background-position:-289px -96px;}
</style>
@endsection

@section('end_script')
    <script src="https://cdn.bootcss.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    var FancyForm=function(){
        return{
            inputs:".FancyForm input, .FancyForm textarea",
            setup:function(){
                var a=this;
                this.inputs=$(this.inputs);
                a.inputs.each(function(){
                    var c=$(this);
                    a.checkVal(c)
                });
                a.inputs.live("keyup blur",function(){
                    var c=$(this);
                    a.checkVal(c);
                });
            },checkVal:function(a){
                a.val().length>0?a.parent("li").addClass("val"):a.parent("li").removeClass("val")
            }
        }
    }();
</script>

<script type="text/javascript">
    $(document).ready(function() {
        FancyForm.setup();
    });
</script>
<script type="text/javascript">
    var searchAjax=function(){};
    var G_tocard_maxTips=30;

    $(function(){(
        function(){
            var a=$(".plus-tag");
            $("a em",a).live("click",function(){
                var c=$(this).parents("a"),b=c.attr("title"),d=c.attr("value");
                delTips(b,d)
            });
            hasTips=function(b){
                var d=$("a",a),c=false;
                d.each(function(){
                    if($(this).attr("title")==b){
                        c=true;
                        return false
                    }
                });
                return c
            };

            isMaxTips=function(){
                return
                $("a",a).length>=G_tocard_maxTips
            };

            setTips=function(c,d){
                if(hasTips(c)){
                    return false
                }if(isMaxTips()){
                    alert("最多添加"+G_tocard_maxTips+"个标签！");
                    return false
                }
                var b=d?'value="'+d+'"':"";
                a.append($("<a "+b+' title="'+c+'" href="javascript:void(0);" ><span>'+c+"</span><em></em></a>"));
                searchAjax(c,d,true);
                return true
            };

            delTips=function(b,c){
                if(!hasTips(b)){
                    return false
                }
                $("a",a).each(function(){
                    var d=$(this);
                    if(d.attr("title")==b){
                        d.remove();
                        return false
                    }
                });
                searchAjax(b,c,false);
                return true
            };

            getTips=function(){
                var b=[];
                $("a",a).each(function(){
                    b.push($(this).attr("title"))
                });
                return b
            };

            getTipsId=function(){
                var b=[];
                $("a",a).each(function(){
                    b.push($(this).attr("value"))
                });
                return b
            };

            getTipsIdAndTag=function(){
                var b=[];
                $("a",a).each(function(){
                    b.push($(this).attr("value")+"##"+$(this).attr("title"))
                });
                return b
            }
        }

    )()});
</script>
<script type="text/javascript">
    // 更新选中标签标签
    $(function(){
        setSelectTips();
        $('.plus-tag').append($('.plus-tag a'));
    });
    var searchAjax = function(name, id, isAdd){
        setSelectTips();
    };
    // 搜索
    (function(){
        var $b = $('.plus-tag-add button'),$i = $('.plus-tag-add input');
        $i.keyup(function(e){
            if(e.keyCode == 13){
                $b.click();
            }
        });
        $b.click(function(){
            var name = $i.val().toLowerCase();
            if(name != '') setTips(name,-1);
            $i.val('');
            $i.select();
        });
    })();
    // 推荐标签
    (function(){
        var str = ['展开推荐标签', '收起推荐标签']
        $('.plus-tag-add a').click(function(){
            var $this = $(this),
                $con = $('#mycard-plus');

            if($this.hasClass('plus')){
                $this.removeClass('plus').text(str[0]);
                $con.hide();
            }else{
                $this.addClass('plus').text(str[1]);
                $con.show();
            }
        });
        $('.default-tag a').live('click', function(){
            var $this = $(this),
                name = $this.attr('title'),
                id = $this.attr('value');
            setTips(name, id);
        });
        // 更新高亮显示
        setSelectTips = function(){
            var arrName = getTips();
            if(arrName.length){
                $('#myTags').show();
            }else{
                $('#myTags').hide();
            }
            $('.default-tag a').removeClass('selected');
            $.each(arrName, function(index,name){
                $('.default-tag a').each(function(){
                    var $this = $(this);
                    if($this.attr('title') == name){
                        $this.addClass('selected');
                        return false;
                    }
                })
            });
        }

    })();
    // 更换链接
    (function(){
        var $b = $('#change-tips'),
            $d = $('.default-tag div'),
            len = $d.length,
            t = 'nowtips';
        $b.click(function(){
            var i = $d.index($('.default-tag .nowtips'));
            i = (i+1 < len) ? (i+1) : 0;
            $d.hide().removeClass(t);
            $d.eq(i).show().addClass(t);
        });
        $d.eq(0).addClass(t);
    })();
    //更换引导语
    (function(){
        var $b = $('#change-tips'),
            $d = $('.default-tag-lead div'),
            len = $d.length,
            t = 'nowtips';
        $b.click(function(){
            var i = $d.index($('.default-tag-lead .nowtips'));
            i = (i+1 < len) ? (i+1) : 0;
            $d.hide().removeClass(t);
            $d.eq(i).show().addClass(t);
        });
        $d.eq(0).addClass(t);
    })();
</script>
@endsection

@section('container')
    <div class="row">
        <h2 class="text-center" style="margin-bottom: 10px;text-align: center;">添加标签</h2>
        <div class="col-sm-2">
            <div class="list-group">
                <a href="/profile" class="list-group-item">个人信息</a>
                <a href="/edit" class="list-group-item active">修改信息</a>
                <a href="/password/update" class="list-group-item">修改密码</a>
            </div>
        </div>

        <div class="col-sm-7">
            <form class="">
                <!-- 邮箱 -->
{{--                <div class="form-group">--}}
{{--                    <label for="email">E-mail</label>--}}
{{--                    <input type="text" class="form-control" id="email" name="email"--}}
{{--                           value="{{ Auth::user()->getInfo('email') }}">--}}
{{--                </div>--}}
                <!-- 标签 -->
                <div class="demo">
                    <div class="plus-tag tagbtn clearfix" id="myTags"></div>
                    <div class="plus-tag-add">
                        <ul class="Form FancyForm">
                            <li>
                                <span class="label">我的标签：</span>
                                <input id="" name="" type="text" class="stext" maxlength="20" />
                                <label>输入标签</label>
                                <span class="fff"></span>
                            </li>
                            <li>
                                <button type="button" class="Button RedButton" style="font-size:22px;">添加标签</button>
                                <a href="javascript:void(0);">展开推荐标签</a>
                            </li>
                        </ul>
                    </div>
                    <!--plus-tag-add end-->
                    <div class="default-tag-lead">
                        <div class="clearfix">
                            <button type="button" class="Button RedButton" style="font-size:18px;background-color: lightpink;">专业技能类标签</button>
                        </div>


                        <div class="clearfix" style="display:none;">
                            <button type="button" class="Button RedButton" style="font-size:18px;background-color: lightblue;">过级类标签</button>
                        </div>

                        <div class="clearfix" style="display:none;">
                            <button type="button" class="Button RedButton" style="font-size:18px;background-color: darkviolet;">证书类标签</button>
                        </div>

                        <div class="clearfix" style="display:none;">
                            <button type="button" class="Button RedButton" style="font-size:18px;background-color: grey;">荣誉类标签</button>
                        </div>
                    </div>

                    <div id="mycard-plus" style="display:none;">
                        <div class="default-tag tagbtn">

                            <div class="clearfix">
                                <a value="-1" title="js" href="javascript:void(0);"><span>js</span><em></em></a>
                                <a value="-1" title="php" href="javascript:void(0);"><span>php</span><em></em></a>
                                <a value="-1" title="java" href="javascript:void(0);"><span>java</span><em></em></a>
                                <a value="-1" title="python" href="javascript:void(0);"><span>python</span><em></em></a>
                                <a value="-1" title="vue.js" href="javascript:void(0);"><span>vue.js</span><em></em></a>
                                <a value="-1" title="node.js" href="javascript:void(0);"><span>node.js</span><em></em></a>
                            </div>

                            <div class="clearfix" style="display:none;">
                                <a value="-1" title="CET4" href="javascript:void(0);"><span>CET4</span><em></em></a>
                                <a value="-1" title="CET6" href="javascript:void(0);"><span>CET6</span><em></em></a>
                                <a value="-1" title="教师资格证" href="javascript:void(0);"><span>教师资格证</span><em></em></a>
                                <a value="-1" title="初级软件资格水平考试证书" href="javascript:void(0);"><span>初级软件资格水平考试证书</span><em></em></a>
                                <a value="-1" title="中级软件资格水平考试证书" href="javascript:void(0);"><span>中级软件资格水平考试证书</span><em></em></a>
                                <a value="-1" title="高级软件资格水平考试证书" href="javascript:void(0);"><span>高级软件资格水平考试证书</span><em></em></a>
                                <a value="-1" title="初级会计师" href="javascript:void(0);"><span>初级会计师</span><em></em></a>
                                <a value="-1" title="注册会计师" href="javascript:void(0);"><span>注册会计师</span><em></em></a>
                            </div>

                            <div class="clearfix" style="display:none;">
                                <a value="-1" title="大学生创新创业大赛" href="javascript:void(0);"><span>大学生创新创业大赛</span><em></em></a>
                                <a value="-1" title="微小说大赛" href="javascript:void(0);"><span>微小说大赛</span><em></em></a>
                                <a value="-1" title="中国高校计算机大赛" href="javascript:void(0);"><span>中国高校计算机大赛</span><em></em></a>
                                <a value="-1" title="全国三维数字化创新设计大赛" href="javascript:void(0);"><span>全国三维数字化创新设计大赛</span><em></em></a>
                                <a value="-1" title="NCDA大赛" href="javascript:void(0);"><span>NCDA大赛</span><em></em></a>
                                <a value="-1" title="ACM编程大赛" href="javascript:void(0);"><span>ACM编程大赛</span><em></em></a>
                                <a value="-1" title="蓝桥杯团体赛" href="javascript:void(0);"><span>蓝桥杯团体赛</span><em></em></a>
                                <a value="-1" title="江西省公共安全创新创业大赛" href="javascript:void(0);"><span>江西省公共安全创新创业大赛</span><em></em></a>
                                <a value="-1" title="中国大学生计算机设计大赛" href="javascript:void(0);"><span>中国大学生计算机设计大赛</span><em></em></a>
                                <a value="-1" title="全国大学生测试实例设计大赛" href="javascript:void(0);"><span>全国大学生测试实例设计大赛</span><em></em></a>
                                <a value="-1" title="江西省大学生工业设计大赛" href="javascript:void(0);"><span>江西省大学生工业设计大赛</span><em></em></a>
                                <a value="-1" title="江西省大学生广告与艺术设计大赛" href="javascript:void(0);"><span>江西省广告与艺术设计大赛</span><em></em></a>
                            </div>

                            <div class="clearfix" style="display:none;">
                                <a value="-1" title="一等奖学金" href="javascript:void(0);"><span>一等奖学金</span><em></em></a>
                                <a value="-1" title="二等奖学金" href="javascript:void(0);"><span>二等奖学金</span><em></em></a>
                                <a value="-1" title="三等奖学金" href="javascript:void(0);"><span>三等奖学金</span><em></em></a>
                                <a value="-1" title="国家励志奖学金" href="javascript:void(0);"><span>国家励志奖学金</span><em></em></a>
                                <a value="-1" title="三好学生" href="javascript:void(0);"><span>三好学生</span><em></em></a>
                                <a value="-1" title="优秀班干部" href="javascript:void(0);"><span>优秀班干部</span><em></em></a>
                                <a value="-1" title="文明寝室" href="javascript:void(0);"><span>文明寝室</span><em></em></a>
                                <a value="-1" title="校园十佳大学生" href="javascript:void(0);"><span>校园十佳大学生</span><em></em></a>
                                <a value="-1" title="优秀毕业生" href="javascript:void(0);"><span>优秀毕业生</span><em></em></a>
                            </div>
                        </div>
                        <div align="right"><button style="border-radius: 6px;background-color: lightskyblue"><a href="javascript:void(0);" id="change-tips" style="color:#3366cc;"><i class="fa fa-refresh"></i> 换个类别</a></button></div>
                        <!--<button class="btn btn-default" style="border-radius: 10px;background-color: #9bb6ec"><i class="fa fa-edit"></i> 保存</button>-->
                    </div>
                    <!--mycard-plus end-->
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-sm btn-success">更新</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-sm-3">
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
