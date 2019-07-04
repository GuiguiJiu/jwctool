@extends('layouts.app')

@section('title', '404')

@section('style')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .code {
            border-right: 2px solid;
            font-size: 50px;
            padding: 0 15px 0 15px;
            text-align: center;
        }

        .message {
            font-size: 36px;
            text-align: center;
        }
    </style>
@endsection
@section('container')
    <div class="flex-center position-ref full-height">
        <div class="code">
            404
        </div>

        <div class="message" style="padding: 10px;">
            Not Found
        </div>
    </div>
@endsection
