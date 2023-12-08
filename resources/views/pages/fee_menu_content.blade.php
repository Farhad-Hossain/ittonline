@extends('layouts.master',['title'=>'Fee | '.$feeMenu->menu_name, 'nav_title'=>'Fee | '.$feeMenu->menu_name])
@section('contents')
    @include('inc.fee_menu_content')
    @include('inc.quote')
@endsection