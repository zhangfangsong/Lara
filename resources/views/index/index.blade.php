
@extends('layouts.main')
@section('title', '首页')

@section('content')
	@include('index._article', ['list'=> $list])
@stop