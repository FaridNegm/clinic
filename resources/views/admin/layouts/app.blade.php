<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
        @yield('title')
    </title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/global_assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/assets/css/core.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/assets/css/customize.css" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{ url('admin') }}/assets/css/colors.min.css" rel="stylesheet" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Changa:500|El+Messiri|Harmattan|Mada:600|Tajawal:700" rel="stylesheet">
	
	<style>
		td .edit , td .delete , td .preview{
			padding: 5px;
			cursor: pointer;
			font-size: 18px;
		}
		table th{
			background: #37474f;
			color: #fff;
			text-align: center;
		}
	</style>
    @yield('header')

</head>

<body class="pace-done sidebar-xs pace-done" >

    @include('admin/layouts/navbar')

	<div class="page-container">
		<div class="page-content">

            @include('admin/layouts/sidebar')

            @yield('content')

            {{--  @include('admin/layouts/footer')  --}}

        </div>
    </div>


    <!-- Core JS files -->
	<script src="{{ url('admin') }}/global_assets/js/plugins/loaders/pace.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/core/libraries/jquery.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/core/libraries/bootstrap.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	
	
	<!-- Theme JS files -->
	{{-- <script src="{{ url('admin') }}/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/pickers/daterangepicker.js"></script> --}}
	
    <!-- Theme JS files -->
    {{-- <script src="{{ url('admin') }}/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/plugins/forms/styling/switch.min.js"></script> --}}
	
    <!-- Theme JS files -->
	{{-- <script src="{{ url('admin') }}/global_assets/js/plugins/notifications/noty.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/components_notifications_other.js"></script>
	
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/components_notifications_other.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/demo_pages/dashboard.js"></script> --}}
    <!-- /theme JS files -->
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<script src="{{ url('admin') }}/assets/js/app.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/forms/selects/bootstrap_select.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/demo_pages/form_bootstrap_select.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/demo_pages/dashboard_boxed.js"></script>

	@yield('footer')

</body>

</html>

{{-- 
	
	.layout-boxed{
			@foreach (\App\Settings::all() as $item)
				background-image: url("{{ url('admin/setting/images/'.$item->image) }}");
			@endforeach
			background-size: cover;
			background-repeat: repeat;
			background-position: center;
		}
		.modal-header{
			@foreach (\App\Settings::all() as $item)
				background-color: {{ $item->theme }};
				padding: 20px 20px 10px;
				color: #fff;
			@endforeach
		}
		.sidebar{
			@foreach (\App\Settings::all() as $item)
				background-color: {{ $item->theme }};
			@endforeach
		}
		.navbar-inverse{
			@foreach (\App\Settings::all() as $item)
				background-color: {{ $item->theme }};
				border: 1px solid {{ $item->theme }};
			@endforeach
		}
		.sidebar-xs .sidebar-main .navigation>li>a>span{
			background-color: #565646;
			border: 1px solid #565646;
		}
		.sidebar-xs .sidebar-main .navigation>li>ul{
			@foreach (\App\Settings::all() as $item)
				background-color: {{ $item->theme }};
			@endforeach
		}
--}}