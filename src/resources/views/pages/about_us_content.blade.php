@extends('layouts.master',['title'=>$aboutUsMenu->menu_name, 'nav_title'=>$aboutUsMenu->menu_name])
@section('contents')
    @include('inc.about_us_content')
    @include('inc.contact')
@endsection