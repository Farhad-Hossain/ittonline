@extends('layouts.master',['title'=>$course->course_title, 'nav_title'=>''])
@section('contents')
    @include('inc.course_details')
    @include('inc.quote')
@endsection