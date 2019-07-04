@extends('layouts.app')

@if(Auth::user()->type == 'Student')
    @include('stu.home')
@endif

@if(Auth::user()->type == 'Teacher')
    @include('tea.home')
@endif
