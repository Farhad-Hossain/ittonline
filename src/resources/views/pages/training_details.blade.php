@extends('layouts.master',['title'=>$training->training_title.' Training', 'nav_title'=>''])
@section('contents')
    @include('inc.training_details')
    @include('inc.quote')
@endsection