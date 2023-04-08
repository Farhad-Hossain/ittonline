@extends('layouts.master',['title'=>$feeMenu->menu_name, 'nav_title'=>$feeMenu->menu_name])
@section('contents')
    @include('inc.fee_menu_content')
    @include('inc.quote')
@endsection