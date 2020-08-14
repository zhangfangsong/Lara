@extends('layouts.default')
@section('title', '提示')

@section('content')
    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">

        @include('shared._errors')

    </div>
    
    <script type="text/javascript">
        setTimeout(function() {
            location.href = '/'
        }, 3000);
    </script>
@stop