
@extends('layouts.main')
@section('title', $category->name)

@section('content')
	@include('index._article', ['list'=> $list])
	@include('shared._page', ['list'=> $list])
@stop
