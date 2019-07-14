@extends('admin.layouts.app')

@section('title')
    {{ trans('app.Settings') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <style>
        .main_background{
            margin: 10px 0px;
            height: 200px;
            overflow: auto;
            width: 100%;
            padding: 20px;
        }
        .main_background:hover{
            cursor: pointer;
        }
        
        .main_colors{
            cursor: pointer;
        }
        .main_background .all_images i{
            position: relative;
            top: -95px;
            right: 90px;
            padding: 3px;
            background-color: #f3f3f3;
            border-radius: 50%;
            width: 19px;
            height: 20px;
            color: red;
        }
        .main_background .all_images i:hover{
            cursor: pointer;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <div class="page-header page-header-default">

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ trans('app.Settings') }}</h4>
                </div>
                
                <div class="heading-elements">
                    <div class="heading-btn-group">
                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                        <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
                    </div>
                </div>
            </div>
                    
            <div class="breadcrumb-line">
                <ul class="breadcrumb" style="margin: 10px;">
                    <li><a href="{{ url('admin/dashboard') }}"><i class="icon-home2 position-left"></i> {{ trans('app.Home') }}</a></li>
                    <li class="active">{{ trans('app.Settings') }}</li>
                </ul>

                <ul class="breadcrumb-elements" style="margin: 10px;">
                    <li>
                        <button type="button" class="btn bg-blue-800 btn-icon btn-float" data-toggle="modal" data-target="#modal" id="add_new">
                            <i class=" icon-plus3 position-left"></i> 
                        </button>

                        {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" id="add_new"><i class=" icon-plus3 position-left"></i> {{ trans('app.Add') }}</button>  --}}
                    </li>
                </ul>
            </div>
        </div>

        <div class="content">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ trans('app.All Settings') }}</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>

                <table class="table datatable-basic table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('app.Name') }}</th>
                            <th>{{ trans('app.owner_name') }}</th>
                            <th>{{ trans('app.Mobile') }}</th>
                            <th>{{ trans('app.Image') }}</th>
                            <th>{{ trans('app.Address') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->owner_name }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>
                                    <img src="{{ url('admin/images/settings/'.$item->image) }}" style="width:70px;height:50px;border-radius:5px;"/>
                                </td>
                                <td>{{ $item->address }}</td>
                                <td> 
                                    
                                    {{--  <i class="icon-eye text-success-300 preview" data-toggle="modal" data-target="#preview" loop_id="{{ $item->id }}"></i>  --}}
                                    
                                    <i class="icon-pencil3 text-blue-800 edit" data-toggle="modal" data-target="#modal" loop_id="{{ $item->id }}"></i>
                                    
                                    <i class="icon-cross text-pink delete" loop_id="{{ $item->id }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin/layouts/footer')

        </div>

    </div>

    @include('admin/settings/form')
    @include('admin/settings/preview')

@endsection

@section('footer')

    @include('Admin/layouts/message')
    
	<!-- Theme JS files -->
	<script src="{{ url('admin') }}/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
        
	<script src="{{ url('admin') }}/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_basic.js"></script>
    
    {{--  <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>  --}}
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/plugins/media/fancybox.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/gallery.js"></script>

    <script>

        $(document).ready(function(){
            
            // Images And Colors
            {{-- $(document).on("click" , ".main_colors .color1" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#00969d");
                $(".navbar-inverse").css("background-color" , "#00969d");
                $(".navbar-inverse").css("border" , "1px solid #00969d");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#00969d");
            });
            
            $(document).on("click" , ".main_colors .color2" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#2196f3");
                $(".navbar-inverse").css("background-color" , "#2196f3");
                $(".navbar-inverse").css("border" , "1px solid #2196f3");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#2196f3");
            });
            
            $(document).on("click" , ".main_colors .color3" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#e821c9");
                $(".navbar-inverse").css("background-color" , "#e821c9");
                $(".navbar-inverse").css("border" , "1px solid #e821c9");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#e821c9");
            });
            
            $(document).on("click" , ".main_colors .color4" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#4231e4");
                $(".navbar-inverse").css("background-color" , "#4231e4");
                $(".navbar-inverse").css("border" , "1px solid #4231e4");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#4231e4");
            });
            
            $(document).on("click" , ".main_colors .color5" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#ad3");
                $(".navbar-inverse").css("background-color" , "#ad3");
                $(".navbar-inverse").css("border" , "1px solid #ad3");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#ad3");
            });
            
            $(document).on("click" , ".main_colors .color6" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#3e2828");
                $(".navbar-inverse").css("background-color" , "#3e2828");
                $(".navbar-inverse").css("border" , "1px solid #3e2828");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#3e2828");
            });
            
            $(document).on("click" , ".main_colors .color7" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "red");
                $(".navbar-inverse").css("background-color" , "red");
                $(".navbar-inverse").css("border" , "1px solid red");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "red");
            });
            
            $(document).on("click" , ".main_colors .color8" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#43a047");
                $(".navbar-inverse").css("background-color" , "#43a047");
                $(".navbar-inverse").css("border" , "1px solid #43a047");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#43a047");
            });
            
            $(document).on("click" , ".main_colors .color9" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#e4cc2d");
                $(".navbar-inverse").css("background-color" , "#e4cc2d");
                $(".navbar-inverse").css("border" , "1px solid #e4cc2d");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#e4cc2d");
            });
            
            $(document).on("click" , ".main_colors .color10" , function(e){
                e.preventDefault();
                $(".sidebar").css("background-color" , "#ff774d");
                $(".navbar-inverse").css("background-color" , "#ff774d");
                $(".navbar-inverse").css("border" , "1px solid #ff774d");
                $(".sidebar-xs .sidebar-main .navigation>li>ul").css("background-color" , "#ff774d");
            }); --}}
            
            $(document).on("click" , ".main_background .all_images" , function(e){
                e.preventDefault();
                $(".layout-boxed").css("background-image" , "{{ url('admin/back_images/1.jpg') }}");
            });



            // View
            $(document).on("click" , "table .view" , function(){
                var loop_id = $(this).attr("loop_id");
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('admin/show_settings') }}"+'/'+loop_id,
                    type: 'get',
                    success: function(res){                            
                        $("#show #p_name").text(res[0].name);
                        $("#show #p_address").text(res[0].address);
                        $("#show #p_phone").text(res[0].phone);
                        $("#show #p_in_charge_name").text(res[0].in_charge_name);
                    },
                });

            });

            // Add New
            $("#add_new").click(function(){
                $("#modal .modal-title").text("{{trans('app.Add')}}");
                $("#modal .modal-footer #save").css("display" , "inline-block");
                $("#modal .modal-footer #update").css("display" , "none");

                $("#modal form #name").val("");
                
                $("form #errors-name").text('');

                $("#modal .modal-footer #save").click(function(e){
                    e.preventDefault();
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                    url: "{{url('admin/add_settings')}}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: new FormData($("#modal form")[0]),
                    // data: $("form").serialize(),
                    success: function(res){
                        $("#modal").modal("hide");
                        $("form").trigger("reset");

                        $("form #errors-name").text('');
                        
                        location.reload();
                        
                        {{--  @if(Session::has('success'))
                            new Noty({
                                text: "{{ Session::get('success') }}",
                                type: 'success'
                            }).show();
                        @endif  --}}

                    },
                    error: function(res){
                        console.log(res);
                        if(res.responseJSON.errors.name){
                            $("form #errors-name").css('display' , 'block').text(res.responseJSON.errors.name);
                        }else{
                            $("form #errors-name").text('');
                        }  
                        
                    }
                    });
                });
            });


            // Edit
            $(document).on("click", "table tbody tr .edit", function(e){
                e.preventDefault();
                var loop_id = $(this).attr("loop_id");

                $("#modal #title").text("{{trans('app.Edit')}}");
                $("#modal .modal-footer #save").css("display" , "none");
                $("#modal .modal-footer #update").css("display" , "inline-block");

                $("form #errors-name").text('');
                {{--  $("#modal form #name").val();  --}}
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ url('admin/edit_settings') }}"+'/'+loop_id,
                    type: 'get',
                    success: function(res){
                        console.log(res);
                        
                        $("#modal form #name").val(res[0].name);
                        $("#modal form #email").val(res[0].email);
                        $("#modal form #address").val(res[0].address);
                        $("#modal form #phone_num").val(res[0].phone);
                        $("#modal form #mobile").val(res[0].mobile);
                        $("#modal form #address").val(res[0].address);
                        $("#modal form #owner_name").val(res[0].owner_name);
                        $("#modal form #slogen").val(res[0].slogen);
                        $("#modal form #theme .hidden_option").css('display' , 'block').text(res[0].theme).val(res[0].theme);
                        $("#modal form .df_image").val(res[0].image);
                        $("#modal form .image_hidden").css('display' , 'block').attr("src" , "{{ url('admin/images/settings') }}"+"/"+res[0].image);
                    },
                });
                
                $(document).on("click" , "#modal .modal-footer #update" ,function(e){
                    e.preventDefault();

                    {{--  alert(loop_id);  --}}
                    $.ajax({
                        url: "{{ url('admin/update_settings') }}"+'/'+loop_id,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        data: new FormData($("#modal form")[0]),
                        success: function(res){
                            console.log(res);
                            $("#modal").modal("hide");
                            $("form").trigger("reset");
    
                            $("form #errors-name").text('');
                            $("form #errors-address").text('');
                            $("form #errors-phone").text('');
                            $("form #errors-in_charge_name").text('');
                            
                            
                            location.reload();
                            
                            @if(Session::has('success'))
                                new Noty({
                                    text: "{{ Session::get('success') }}",
                                    type: 'success'
                                }).show();
                            @endif
    
                        },
                        error: function(res){
                            console.log(res);
                            if(res.responseJSON.errors.name){
                                $("form #errors-name").css('display' , 'block').text(res.responseJSON.errors.name);
                            }else{
                                $("form #errors-name").text('');
                            }
                            if(res.responseJSON.errors.address){
                                $("form #errors-address").css('display' , 'block').text(res.responseJSON.errors.address);
                            }else{
                                $("form #errors-address").text('');
                            }
                            if(res.responseJSON.errors.phone){
                                $("form #errors-phone").css('display' , 'block').text(res.responseJSON.errors.phone);
                            }else{
                                $("form #errors-phone").text('');
                            }
                            if(res.responseJSON.errors.in_charge_name){
                                $("form #errors-in_charge_name").css('display' , 'block').text(res.responseJSON.errors.in_charge_name);
                            }else{
                                $("form #errors-in_charge_name").text('');
                            }
    
                            
                        }
                    });
                });
            });

            // Delete

            $(document).on("click" , "table .delete" ,function(e){
                e.preventDefault();
                var loop_id = $(this).attr("loop_id");
                
                swal({
                    title: "{{ trans('app.Warning') }}",
                    text: "{{ trans('app.Are You Sure Of Delete') }}",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ url('admin/delete_settings') }}"+'/'+loop_id,
                            type: "get",
                            success: function(){
                                location.reload();

                                {{--  @if(Session::has('success'))
                                new Noty({
                                    text: "{{ Session::get('success') }}",
                                    type: 'success'
                                }).show();

                                swal("{{ trans('app.Success') }}", {
                                    icon: "success",
                                    });

                            @endif  --}}
                            },
                            error: function(){

                            }
                        });
                    } else {
                        return false;
                    }
                    });
            });
        });

    </script>

@endsection
