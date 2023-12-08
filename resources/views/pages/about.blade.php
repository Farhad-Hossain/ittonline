@extends('layouts.master',['title'=>'About Us', 'nav_title'=>'About Us'])
@section('contents')
    @include('inc.about')
    @include('inc.team')
    @include('inc.testimonials')
@endsection