@extends('layouts.app')

@section('title', '主页')

@section('style')
    <style>
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
        }

        body {
            /*background-image: url("https://img.zcool.cn/community/01ffcb5a770721a801213466d09aa8.jpg@1280w_1l_2o_100sh.jpg"); !* 正大门 *!*/
            /*background-image: url("https://img.zcool.cn/community/01d0535a7706f4a80121346664f60f.jpg@1280w_1l_2o_100sh.jpg"); !* 正大坊特写 *!*/
            background-image: url("https://img.zcool.cn/community/019a4f5a770728a80120a12334ad7f.jpg@1280w_1l_2o_100sh.jpg"); /* 正大坊 */
            /*background-image: url("https://img.zcool.cn/community/0184105a770731a801213466447bdc.jpg@1280w_1l_2o_100sh.jpg"); !* 图书馆 *!*/
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

        body > .container {
            display: flex;
            height: 100vh;
            align-items: center;
            color: #000;
            text-shadow: 0 0 0.5em #fff, 0 0 0.5em #fff, 0 0 0.5em #fff;
        }
    </style>
@endsection

@section('container')
    <div class="text-center" style="margin: 0 auto;">
{{--        <h1 style="font-size: 3em;">{{ env('APP_NAME') }}</h1>--}}
{{--        <p>「 静思笃行，持中秉正 」</p>--}}
{{--        <p>莫等闲，白了少年头，空悲切.</p>--}}
    </div>
@endsection
