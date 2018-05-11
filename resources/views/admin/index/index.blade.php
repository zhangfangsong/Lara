
@extends('admin.layouts.main')

@section('title', '仪表盘')

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
@stop

@section('script')
	<script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });

            $(".knob").knob();
        });
    </script>
@stop

@section('content')
	<!-- Page-Title -->
	<div class="row">
	    <div class="col-sm-12">
	        <h4 class="page-title">仪表盘</h4>
	        <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box fadeInDown animated">
	            <div class="bg-icon bg-icon-info pull-left">
	                <i class="md md-attach-money text-info"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">31,570</b></h3>
	                <p class="text-muted">Total Revenue</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-pink pull-left">
	                <i class="md md-add-shopping-cart text-pink"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">280</b></h3>
	                <p class="text-muted">Today's Sales</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-purple pull-left">
	                <i class="md md-equalizer text-purple"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">0.16</b>%</h3>
	                <p class="text-muted">Conversion</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>

	    <div class="col-md-6 col-lg-3">
	        <div class="widget-bg-color-icon card-box">
	            <div class="bg-icon bg-icon-success pull-left">
	                <i class="md md-remove-red-eye text-success"></i>
	            </div>
	            <div class="text-right">
	                <h3 class="text-dark"><b class="counter">64,570</b></h3>
	                <p class="text-muted">Today's Visits</p>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>
	</div>

	<div class="row">

	    <div class="col-lg-4">
			<div class="card-box">
				<h4 class="text-dark header-title m-t-0 m-b-30">Total Revenue</h4>

				<div class="widget-chart text-center">
	                <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#fb6d9d" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15"/>
	            	<h5 class="text-muted m-t-20">Total sales made today</h5>
	            	<h2 class="font-600">$75</h2>
	            	<ul class="list-inline m-t-15">
	            		<li>
	            			<h5 class="text-muted m-t-20">Target</h5>
	            			<h4 class="m-b-0">$1000</h4>
	            		</li>
	            		<li>
	            			<h5 class="text-muted m-t-20">Last week</h5>
	            			<h4 class="m-b-0">$523</h4>
	            		</li>
	            		<li>
	            			<h5 class="text-muted m-t-20">Last Month</h5>
	            			<h4 class="m-b-0">$965</h4>
	            		</li>
	            	</ul>
	        	</div>
			</div>

	    </div>

	    <div class="col-lg-8">
	        <div class="card-box">
				<h4 class="text-dark header-title m-t-0">Sales Analytics</h4>
				<div class="text-center">
					<ul class="list-inline chart-detail-list">
						<li>
							<h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
						</li>
						<li>
							<h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
						</li>
						<li>
							<h5><i class="fa fa-circle m-r-5" style="color: #dcdcdc;"></i>Mobiles</h5>
						</li>
					</ul>
				</div>
				<div id="morris-bar-stacked" style="height: 303px;"></div>
			</div>
	    </div>

	</div>

	<div class="row">

	    <div class="col-lg-6">
	        <div class="card-box">
	            <h4 class="text-dark header-title m-t-0">Total Sales</h4>

	            <div class="text-center">
	                <ul class="list-inline chart-detail-list">
	                    <li>
	                        <h5><i class="fa fa-circle m-r-5" style="color: #5fbeaa;"></i>Desktops</h5>
	                    </li>
	                    <li>
	                        <h5><i class="fa fa-circle m-r-5" style="color: #5d9cec;"></i>Tablets</h5>
	                    </li>
	                    <li>
	                        <h5><i class="fa fa-circle m-r-5" style="color: #ebeff2;"></i>Mobiles</h5>
	                    </li>
	                </ul>
	            </div>

	            <div id="morris-area-with-dotted" style="height: 300px;"></div>

	        </div>

	    </div>

	    <!-- col -->

	    <div class="col-lg-6">
	        <div class="card-box">

	        </div>
	    </div>
	    <!-- end col -->

	</div>
@stop
