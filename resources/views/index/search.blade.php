
@extends('layouts.main')
@section('title', '关键词:'.$search.'的结果')

@section('content')
	@include('index._article', ['list'=> $list])
	@include('shared._page', ['list'=> $list])
@stop
