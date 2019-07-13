@extends('admin.layouts.app')

@section('title')
    {{ trans('app.Times') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <div class="page-header page-header-default">

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
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
                    <li class="active">{{ trans('app.Times') }}</li>
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
                    <h5 class="panel-title">{{ trans('app.All Times') }}</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>

                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('app.From') }}</th>
                            <th>{{ trans('app.To') }}</th>
                            <th>{{ trans('app.Day') }}</th>
                            <th>{{ trans('app.matter') }}</th>
                            <th>{{ trans('app.gender') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->from }}</td>
                                <td>{{ $item->to }}</td>
                                <td>{{ $item->day }}</td>
                                <td>{{ $item->matter }}</td>
                                <td>{{ $item->gender }}</td>
                                <td> 
                                    <i class="icon-pencil text-blue-800 edit" data-toggle="modal" data-target="#modal" loop_id="{{ $item->id }}"></i>
                                    
                                    <i class="icon-cross2 text-danger delete" loop_id="{{ $item->id }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @include('admin/layouts/footer')

        </div>

    </div>

    @include('admin/times/form')
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
                
                // View
                $(document).on("click" , "table .view" , function(){
                    var loop_id = $(this).attr("loop_id");
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/show_times') }}"+'/'+loop_id,
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
    
                    $("#modal form #from").val("");
                    $("#modal form #to").val("");
                    $("#modal form #matter .hidden_option").css("display" , "none");
                    $("#modal form #gender .hidden_option").css("display" , "none");
                    $("#modal form #day .hidden_option").css("display" , "none");
                    $("#modal form #education_year .hidden_option").css("display" , "none");
                    
                    $("form #errors-from").text('');
                    $("form #errors-to").text('');
                    $("form #errors-matter").text('');
                    $("form #errors-gender").text('');
                    $("form #errors-day").text('');
                    $("form #errors-education_year").text('');

                    $("#modal .modal-footer #save").click(function(e){
                        e.preventDefault();
    
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
    
                        $.ajax({
                        url: "{{url('admin/add_times')}}",
                        type: 'POST',
                        data: $('#modal form').serialize(),
                        success: function(res){
                            $("#modal").modal("hide");
                            $("form").trigger("reset");
    
                            $("form #errors-from").text('');
                            $("form #errors-to").text('');
                            $("form #errors-matter").text('');
                            $("form #errors-gender").text('');
                            $("form #errors-day").text('');
                            $("form #errors-education_year").text('');
                            
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
                            if(res.responseJSON.errors.from){
                                $("form #errors-from").css('display' , 'block').text(res.responseJSON.errors.from);
                            }else{
                                $("form #errors-from").text('');
                            }
                            if(res.responseJSON.errors.to){
                                $("form #errors-to").css('display' , 'block').text(res.responseJSON.errors.to);
                            }else{
                                $("form #errors-to").text('');
                            }
                            if(res.responseJSON.errors.gender){
                                $("form #errors-gender").css('display' , 'block').text(res.responseJSON.errors.gender);
                            }else{
                                $("form #errors-gender").text('');
                            }
                            if(res.responseJSON.errors.matter){
                                $("form #errors-matter").css('display' , 'block').text(res.responseJSON.errors.matter);
                            }else{
                                $("form #errors-matter").text('');
                            }
                            if(res.responseJSON.errors.day){
                                $("form #errors-day").css('display' , 'block').text(res.responseJSON.errors.day);
                            }else{
                                $("form #errors-day").text('');
                            }
                            if(res.responseJSON.errors.education_year){
                                $("form #errors-education_year").css('display' , 'block').text(res.responseJSON.errors.education_year);
                            }else{
                                $("form #errors-education_year").text('');
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

                    $("form #errors-from").text('');
                    $("form #errors-to").text('');
                    $("form #errors-matter").text();
                    $("form #errors-gender").text();
                    $("form #errors-day").text();
                    $("form #errors-education_year").text();

                    {{--  $("#modal form #name").val();  --}}
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/edit_times') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){
                            console.log(res);
                            
                            var matter = res[0].matter;
                            var gender = res[0].gender;
                            var education_year = res[0].education_year;
                            var day = res[0].day;
                            
                            $("#modal form #from").val(res[0].from);
                            $("#modal form #to").val(res[0].to);
                            $("#modal form #matter .hidden_option").css("display" , "block").text(res[0].matter).val(res[0].matter);
                            $("#modal form #gender .hidden_option").css("display" , "block").text(res[0].gender).val(res[0].gender);
                            $("#modal form #education_year .hidden_option").css("display" , "block").text(res[0].education_year).val(res[0].education_year);
                            $("#modal form #day .hidden_option").css("display" , "block").text(res[0].day).val(res[0].day);

                        },
                    });
                    
                    $(document).on("click" , "#modal .modal-footer #update" ,function(e){
                        e.preventDefault();

                        {{--  alert(loop_id);  --}}
                        $.ajax({
                            url: "{{ url('admin/update_times') }}"+'/'+loop_id,
                            type: 'POST',
                            data: $('#modal form').serialize(),
                            success: function(res){
                                console.log(res);
                                $("#modal").modal("hide");
                                $("form").trigger("reset");
        
                                $("form #errors-from").text('');
                                $("form #errors-to").text('');
                                $("form #errors-matter").text();
                                $("form #errors-gender").text();
                                $("form #errors-day").text();
                                $("form #errors-education_year").text();
                                
                                
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
                                if(res.responseJSON.errors.from){
                                    $("form #errors-from").css('display' , 'block').text(res.responseJSON.errors.from);
                                }else{
                                    $("form #errors-from").text('');
                                }
                                if(res.responseJSON.errors.to){
                                    $("form #errors-to").css('display' , 'block').text(res.responseJSON.errors.to);
                                }else{
                                    $("form #errors-to").text('');
                                }
                                if(res.responseJSON.errors.gender){
                                    $("form #errors-gender").css('display' , 'block').text(res.responseJSON.errors.gender);
                                }else{
                                    $("form #errors-gender").text('');
                                }
                                if(res.responseJSON.errors.matter){
                                    $("form #errors-matter").css('display' , 'block').text(res.responseJSON.errors.matter);
                                }else{
                                    $("form #errors-matter").text('');
                                }
                                if(res.responseJSON.errors.day){
                                    $("form #errors-day").css('display' , 'block').text(res.responseJSON.errors.day);
                                }else{
                                    $("form #errors-day").text('');
                                }
                                if(res.responseJSON.errors.education_year){
                                    $("form #errors-education_year").css('display' , 'block').text(res.responseJSON.errors.education_year);
                                }else{
                                    $("form #errors-education_year").text('');
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
                                url: "{{ url('admin/delete_times') }}"+'/'+loop_id,
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

    <script>
        new Vue({
            el: "#app2",
            data: {
                name: "farid negm",
            }
        });
    </script>
@endsection
