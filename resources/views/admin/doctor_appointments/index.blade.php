@extends('admin.layouts.app')

@section('title')
    {{ trans('app.doctor_appointments') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <div class="page-header page-header-default">

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ trans('app.doctor_appointments') }}</h4>
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
                    <li class="active">{{ trans('app.doctor_appointments') }}</li>
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
                    <h5 class="panel-title">{{ trans('app.All doctor_appointments') }}</h5>
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
                            <th>{{ trans('app.doctor') }}</th>
                            <th>{{ trans('app.sat') }}</th>
                            <th>{{ trans('app.sun') }}</th>
                            <th>{{ trans('app.mon') }}</th>
                            <th>{{ trans('app.tue') }}</th>
                            <th>{{ trans('app.wen') }}</th>
                            <th>{{ trans('app.thu') }}</th>
                            <th>{{ trans('app.fri') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->doctor['name'] }}</td>
                                <td>
                                    @if ($item->sat_from == "---" && $item->sat_to == "---")
                                        ---
                                    @elseif ($item->sat_from && $item->sat_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->sat_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->sat_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($item->sun_from == "---" && $item->sun_to == "---")
                                        ---
                                    @elseif ($item->sun_from && $item->sun_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->sun_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->sun_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($item->mon_from == "---" && $item->mon_to == "---")
                                        ---
                                    @elseif ($item->mon_from && $item->mon_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->mon_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->mon_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($item->tue_from == "---" && $item->tue_to == "---")
                                        ---
                                    @elseif ($item->tue_from && $item->tue_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->tue_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->tue_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($item->wen_from == "---" && $item->wen_to == "---")
                                        ---
                                    @elseif ($item->wen_from && $item->wen_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->wen_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->wen_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($item->thu_from == "---" && $item->thu_to == "---")
                                        ---
                                    @elseif ($item->thu_from && $item->thu_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->thu_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->thu_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td>
                                    @if ($item->fri_from == "---" && $item->fri_to == "---")
                                        ---
                                    @elseif ($item->fri_from && $item->fri_to)
                                        <div style="margin: 6px 0px;">{{ trans('app.From') }}: <span style="margin: 0px 5px;font-weight: bold;">{{ $item->fri_from }}</span></div>

                                        <div style="margin: 6px 0px;">{{ trans('app.To') }}:  <span style="margin: 0px 5px;font-weight: bold;">{{ $item->fri_to }}</span></div>
                                    @else
                                        ---
                                    @endif
                                    
                                </td>
                                <td> 
                                    
                                    {{--  <i class="icon-eye text-success-300 preview" data-toggle="modal" data-target="#preview" loop_id="{{ $item->id }}"></i>  --}}
                                    
                                    <i class="icon-pencil3 text-blue-800 edit" data-toggle="modal" data-target="#modal" loop_name="{{ $item->doctor['name'] }}" loop_id="{{ $item->id }}"></i>
                                    
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

    @include('admin/doctor_appointments/form')

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
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/picker_date_rtl.js"></script>

    <script>

            $(document).ready(function(){
                
                // View
                {{--  $(document).on("click" , "table .preview" , function(){
                    var loop_id = $(this).attr("loop_id");
                    
                    $("#modal form #name").val("");
                    $("#modal form #sat_from").val("");
                    $("#modal form #sat_to").val("");
                    $("#modal form #sun_from").val("");
                    $("#modal form #sun_to").val("");
                    $("#modal form #mon_from").val("");
                    $("#modal form #mon_to").val("");
                    $("#modal form #tue_from").val("");
                    $("#modal form #tue_to").val("");
                    $("#modal form #wen_from").val("");
                    $("#modal form #wen_to").val("");
                    $("#modal form #thu_from").val("");
                    $("#modal form #thu_from").val("");
                    $("#modal form #fri_to").val("");
                    $("#modal form #fri_to").val("");

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/show_doctor_appointments') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){                            
                            $("#image img").attr("src" , "{{ url('admin/images/doctor_appointments') }}"+"/"+res[0].image);
                            $("#image .caption-overflow span a").attr("href" , "{{ url('admin/images/doctor_appointments') }}"+"/"+res[0].image);
                            $("#id span").text(res[0].id);
                            $("#name span").text(res[0].name);
                            $("#email span").text(res[0].email);
                            $("#address span").text(res[0].address);
                            $("#department span").text(res[0].department);

                            if(res[0].gender == 1)
                                $("#gender span").text("{{ trans('app.male') }}");
                            else
                                $("#gender span").text("{{ trans('app.female') }}");
                            
                            if(res[0].status == 1)
                                $("#status span").text("{{ trans('app.active') }}");
                            else
                                $("#status span").text("{{ trans('app.not_active') }}");
                            
                            $("#mobile span").text(res[0].mobile);
                            $("#phone span").text(res[0].phone);
                        },
                    });

                });  --}}

                // Add New
                $("#add_new").click(function(){
                    $("#modal .modal-title").text("{{trans('app.Add')}}");
                    $("#modal .modal-footer #save").css("display" , "inline-block");
                    $("#modal .modal-footer #update").css("display" , "none");
    
                    $("#modal form #name").val("");
                    $("#modal form #sat_from").val("");
                    $("#modal form #sat_to").val("");
                    $("#modal form #sun_from").val("");
                    $("#modal form #sun_to").val("");
                    $("#modal form #mon_from").val("");
                    $("#modal form #mon_to").val("");
                    $("#modal form #tue_from").val("");
                    $("#modal form #tue_to").val("");
                    $("#modal form #wen_from").val("");
                    $("#modal form #wen_to").val("");
                    $("#modal form #thu_from").val("");
                    $("#modal form #thu_to").val("");
                    $("#modal form #fri_from").val("");
                    $("#modal form #fri_to").val("");
                    
                    $("form #errors-name").text('');

                    $("#modal .modal-footer #save").click(function(e){
                        e.preventDefault();
    
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
    
                        $.ajax({
                        url: "{{url('admin/add_doctor_appointments')}}",
                        type: 'POST',
                        data: $("#modal #form").serialize(),
                        success: function(res){
                            $("#modal").modal("hide");
                            $("form").trigger("reset");
    
                            $("form #errors-name").text('');
                            
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
                        }
                        });
                    });
                });
    
    
                // Edit
                $(document).on("click", "table tbody tr .edit", function(e){
                    e.preventDefault();
                    var loop_id = $(this).attr("loop_id");
                    var loop_name = $(this).attr("loop_name");

                    $("#modal #title").text("{{trans('app.Edit')}}");
                    $("#modal .modal-footer #save").css("display" , "none");
                    $("#modal .modal-footer #update").css("display" , "inline-block");

                    $("form #errors-name").text('');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/edit_doctor_appointments') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){
                            console.log(res);
                            
                            $("#modal form #name").val(res[0].name);
                            $("#modal form #sat_from").val(res[0].sat_from);
                            $("#modal form #sat_to").val(res[0].sat_to);
                            $("#modal form #sun_from").val(res[0].sun_from);
                            $("#modal form #sun_to").val(res[0].sun_to);
                            $("#modal form #mon_from").val(res[0].mon_from);
                            $("#modal form #mon_to").val(res[0].mon_to);
                            $("#modal form #tue_from").val(res[0].tue_from);
                            $("#modal form #tue_to").val(res[0].tue_to);
                            $("#modal form #wen_from").val(res[0].wen_from);
                            $("#modal form #wen_to").val(res[0].wen_to);
                            $("#modal form #thu_from").val(res[0].thu_from);
                            $("#modal form #thu_to").val(res[0].thu_to);
                            $("#modal form #fri_from").val(res[0].fri_from);
                            $("#modal form #fri_to").val(res[0].fri_to);
                            $("#modal form #name .hidden_option").css("display" , "block").text(loop_name).val(res[0].name);
                        },
                    });
                    
                    $(document).on("click" , "#modal .modal-footer #update" ,function(e){
                        e.preventDefault();

                        $.ajax({
                            url: "{{ url('admin/update_doctor_appointments') }}"+'/'+loop_id,
                            type: 'POST',
                            data: $('#modal form').serialize(),
                            success: function(res){
                                console.log(res);
                                $("#modal").modal("hide");
                                $("form").trigger("reset");
        
                                $("form #errors-name").text('');
                                
                                
                                location.reload();
                                
                                {{--  if(Session::has('success')){
                                    new Noty({
                                        text: "{{ Session::get('success') }}",
                                        type: 'success'
                                    }).show();
                                }
                                else{

                                }  --}}
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
                                url: "{{ url('admin/delete_doctor_appointments') }}"+'/'+loop_id,
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
