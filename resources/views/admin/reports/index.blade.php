@extends('admin.layouts.app')

@section('title')
    {{ trans('app.Times') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <style>
        .panel.has-bg-image {
            background-image: url(global_assets/images/backgrounds/panel_bg.png);
            height: 200px;
            padding: 20px 10px;
        }
        #chart_area_color{
            background-color: #3e2828;
            border: 1px solid #3e2828;
            position: relative;
            top: -53px;
            color: #FFF;
            padding: 5px;
            opacity: .7;
        }
        #chart_area_color:hover{
            opacity: 1;
            transition: all .6s;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <!-- Page header -->
        <div class="page-header page-header-default">

            <div class="breadcrumb-line">
                <ul class="breadcrumb" style="margin: 10px;">
                    <li><a href="{{ url('admin/dashboard') }}"><i class="icon-home2 position-left"></i> {{ trans('app.Home') }}</a></li>
                    <li class="active">{{ trans('app.Times') }}</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->


        <div class="content">

                <div class="row" style="padding: 20px 50px;">
                    <div class="col-md-6 text-center">
                        <div class="panel bg-indigo-400 has-bg-image">
                            <div class="panel-body">
                                <div>
                                    <h4 class="no-margin text-semibold">تقرير الطلاب</h4>
                                </div>
                            </div>
                        </div>
                        <div id="chart_area_color">
                            <button style="background: transparent;border: 0px;width:100%;" data-toggle="modal" data-target="#students_modal">عرض التقرير</button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 text-center">
                        <div class="panel bg-grey-600 has-bg-image">
                            <div class="panel-body">
                                <div>
                                    <h4 class="no-margin text-semibold">الحضور والغياب للطلاب</h4>
                                </div>
                            </div>
                        </div>
                        <div id="chart_area_color">
                            <button style="background: transparent;border: 0px;width:100%;"  data-toggle="modal" data-target="#absence_modal">عرض التقرير</button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 text-center">
                        <div class="panel bg-pink-800 has-bg-image">
                            <div class="panel-body">
                                <div>
                                    <h4 class="no-margin text-semibold">درجات الإمتحان للطلاب</h4>
                                </div>
                            </div>
                        </div>
                        <div id="chart_area_color">
                            <button style="background: transparent;border: 0px;width:100%;"  data-toggle="modal" data-target="#exam_degree_modal">عرض التقرير</button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 text-center">
                        <div class="panel bg-teal-800 has-bg-image">
                            <div class="panel-body">
                                <div>
                                    <h4 class="no-margin text-semibold">فلوس الطلاب</h4>
                                </div>
                            </div>
                        </div>
                        <div id="chart_area_color">
                            <button style="background: transparent;border: 0px;width:100%;"  data-toggle="modal" data-target="#students_moneys_modal">عرض التقرير</button>
                        </div>
                    </div>

                </div>

            
            @include('admin/layouts/footer')


        </div>

    </div>

    @include('admin/reports/form')
    {{--  @include('admin/times/show')  --}}

@endsection

@section('footer')

    @include('Admin/layouts/message')
    
    <script src="{{ url('admin') }}/global_assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/pickers/anytime.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
    
	<script src="{{ url('admin') }}/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_basic.js"></script>
    
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/picker_date_rtl.js"></script>
    {{--  <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>  --}}
    

    <script>

            $(document).ready(function(){
                
                // Students Reports 
                $(document).on("click" , "#students_modal #view" , function(){
                    var from = $("#students_modal form #from").val();
                    var to = $("#students_modal form #to").val();
                    var education_year = $("#students_modal form #education_year select").val();
                    var matter = $("#students_modal form #matter select").val();
                    var gender = $("#students_modal form #gender select").val();

                    $("#students_modal form #view").attr("href" , "{{ url('admin/show_students_report') }}"+"/"+from+"/"+to+"/"+education_year+"/"+matter+"/"+gender);

                    
                    {{--  alert(matter);  --}}

                    {{--  $.ajax({
                        url: "{{ url('admin/show_students_report') }}"+"/"+from+"/"+to+"/"+education_year+"/"+matter+"/"+gender,
                        type: "POST",
                        data: $("#students_modal form").serialize(),
                        success: function(res){
                            console.log(res);
                        },
                        error: function(res){
                            console.log(res);
                            if(res.responseJSON.errors.from){
                                $("#students_modal form #errors-from").css('display' , 'block').text(res.responseJSON.errors.from);
                            }else{
                                $("#students_modal form #errors-from").text('');
                            }
                        },
                    });  --}}

                });
            });
    
        </script>

    <script>
        new Vue({
            el: "#app2",
            data: {
                name: "farid negm",
            }
        });
    </script>
@endsection
