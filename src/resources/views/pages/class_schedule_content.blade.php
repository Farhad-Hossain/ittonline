@extends('layouts.master',['title'=>$classScheduleMenu->menu_name, 'nav_title'=>$classScheduleMenu->menu_name])
@section('contents')
    @include('inc.class_schedule_content')
    @include('inc.contact')
@endsection