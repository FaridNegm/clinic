@extends('admin.layouts.app')

@section('title')
    {{ trans('app.reserve_appointment') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <div class="page-header page-header-default">

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ trans('app.reserve_appointment') }}</h4>
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
                    <li class="active">{{ trans('app.reserve_appointment') }}</li>
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
                    <h5 class="panel-title">{{ trans('app.All reserve_appointment') }}</h5>
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
                            <th>{{ trans('app.date') }}</th>
                            <th>{{ trans('app.patient') }}</th>
                            <th>{{ trans('app.doctor') }}</th>
                            <th>{{ trans('app.appointment_status') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->patient_name['name'] }}</td>
                                <td>{{ $item->doctor_name['name'] }}</td>
                                <td>
                                    @if($item->appointment_status == 1)
                                        <span class="badge bg-brown-400">{{ trans('app.pending_confirmation') }}</span>
                                    @elseif($item->appointment_status == 2)
                                        <span class="badge bg-success">{{ trans('app.confirmed') }}</span>
                                    @else
                                        <span class="badge bg-danger-400">{{ trans('app.cancelled') }}</span>
                                    @endif
                                </td>
                                <td> 
                                    
                                    {{--  <i class="icon-eye text-success-300 preview" data-toggle="modal" data-target="#preview" loop_id="{{ $item->id }}"></i>  --}}
                                    
                                    <i class="icon-pencil3 text-blue-800 edit" data-toggle="modal" data-target="#modal" patient_name="{{ $item->patient_name['name'] }}" doctor_name="{{ $item->doctor_name['name'] }}" loop_id="{{ $item->id }}"></i>
                                    
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

    @include('admin/reserve_appointment/form')
    @include('admin/reserve_appointment/preview')

@endsection

@section('footer')

    @include('Admin/layouts/message')
            
	<script src="{{ url('admin') }}/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script src="{{ url('admin') }}/global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_basic.js"></script>
    {{--  <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>  --}}

    <script>

            $(document).ready(function(){
                
                // View
                {{--  $(document).on("click" , "table .preview" , function(){
                    var loop_id = $(this).attr("loop_id");
                    
                    $("#modal form #date").val("");
                    $("#modal form #patient").val("");
                    $("#modal form #doctor").val("");
                    $("#modal form #notes").val("");
                    $("#modal form #appointment_status .hidden_option").css("display" , "none");

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/show_reserve_appointment') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){                            
                            $("#image img").attr("src" , "{{ url('admin/images/reserve_appointment') }}"+"/"+res[0].image);
                            $("#image .caption-overflow span a").attr("href" , "{{ url('admin/images/reserve_appointment') }}"+"/"+res[0].image);
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
    
                    $("#modal form #date").val("");
                    $("#modal form #patient").val("");
                    $("#modal form #doctor").val("");
                    $("#modal form #notes").val("");
                    $("#modal form #appointment_status .hidden_option").css("display" , "none");
                    
                    $("form #errors-date").text('');
                    $("form #errors-patient").text('');
                    $("form #errors-doctor").text('');
                    $("form #errors-appointment_status").text('');

                    $("#modal .modal-footer #save").click(function(e){
                        e.preventDefault();
    
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
    
                        $.ajax({
                        url: "{{url('admin/add_reserve_appointment')}}",
                        type: 'POST',
                        data: $("#modal #form").serialize(),
                        success: function(res){
                            $("#modal").modal("hide");
                            $("form").trigger("reset");
    
                            $("form #errors-date").text('');
                            $("form #errors-patient").text('');
                            $("form #errors-doctor").text('');
                            $("form #errors-appointment_status").text('');
                            
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
                            if(res.responseJSON.errors.date){
                                $("form #errors-date").css('display' , 'block').text(res.responseJSON.errors.date);
                            }else{
                                $("form #errors-date").text('');
                            }
                            if(res.responseJSON.errors.patient){
                                $("form #errors-patient").css('display' , 'block').text(res.responseJSON.errors.patient);
                            }else{
                                $("form #errors-patient").text('');
                            }
                            if(res.responseJSON.errors.doctor){
                                $("form #errors-doctor").css('display' , 'block').text(res.responseJSON.errors.doctor);
                            }else{
                                $("form #errors-doctor").text('');
                            }
                            if(res.responseJSON.errors.appointment_status){
                                $("form #errors-appointment_status").css('display' , 'block').text(res.responseJSON.errors.appointment_status);
                            }else{
                                $("form #errors-appointment_status").text('');
                            }
                        }
                        });
                    });
                });
    
    
                // Edit
                $(document).on("click", "table tbody tr .edit", function(e){
                    e.preventDefault();
                    var loop_id = $(this).attr("loop_id");
                    var patient_name = $(this).attr("patient_name");
                    var doctor_name = $(this).attr("doctor_name");

                    $("#modal #title").text("{{trans('app.Edit')}}");
                    $("#modal .modal-footer #save").css("display" , "none");
                    $("#modal .modal-footer #update").css("display" , "inline-block");

                    $("form #errors-date").text('');
                    $("form #errors-patient").text('');
                    $("form #errors-doctor").text('');
                    $("form #errors-appointment_status").text('');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/edit_reserve_appointment') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){
                            console.log(res);
                            
                            $("#modal form #date").val(res[0].date);
                            $("#modal form #patient .hidden_option").css("display" , "block").text(patient_name).val(res[0].patient);
                            $("#modal form #doctor .hidden_option").css("display" , "block").text(doctor_name).val(res[0].doctor);
                            $("#modal form #notes").val(res[0].notes);
                            
                            if(res[0].appointment_status == 1)
                                $("#modal form #appointment_status .hidden_option").css("display" , "block").text("{{ trans('app.pending_confirmation') }}").val(res[0].appointment_status);

                            else if(res[0].appointment_status == 2)
                                $("#modal form #appointment_status .hidden_option").css("display" , "block").text("{{ trans('app.confirmed') }}").val(res[0].appointment_status);

                            else
                                $("#modal form #appointment_status .hidden_option").css("display" , "block").text("{{ trans('app.cancelled') }}").val(res[0].appointment_status);
                            
                        },
                    });
                    
                    $(document).on("click" , "#modal .modal-footer #update" ,function(e){
                        e.preventDefault();

                        $.ajax({
                            url: "{{ url('admin/update_reserve_appointment') }}"+'/'+loop_id,
                            type: 'POST',
                            data: $('#modal form').serialize(),
                            success: function(res){
                                console.log(res);
                                $("#modal").modal("hide");
                                $("form").trigger("reset");
        
                                $("form #errors-name").text('');
                                $("form #errors-status").text('');
                                
                                
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
                                if(res.responseJSON.errors.date){
                                    $("form #errors-date").css('display' , 'block').text(res.responseJSON.errors.date);
                                }else{
                                    $("form #errors-date").text('');
                                }
                                if(res.responseJSON.errors.patient){
                                    $("form #errors-patient").css('display' , 'block').text(res.responseJSON.errors.patient);
                                }else{
                                    $("form #errors-patient").text('');
                                }
                                if(res.responseJSON.errors.doctor){
                                    $("form #errors-doctor").css('display' , 'block').text(res.responseJSON.errors.doctor);
                                }else{
                                    $("form #errors-doctor").text('');
                                }
                                if(res.responseJSON.errors.appointment_status){
                                    $("form #errors-appointment_status").css('display' , 'block').text(res.responseJSON.errors.appointment_status);
                                }else{
                                    $("form #errors-appointment_status").text('');
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
                                url: "{{ url('admin/delete_reserve_appointment') }}"+'/'+loop_id,
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

                // Get Doctor Appointments
                $(document).on("change" , "#modal #form #doctor select" , function(){
                    $("#modal #form #doctor .doctor_appointment").css("display" , "none");
                    $("#modal #form #doctor .doctor_appointment").html("");

                    var doctor_id = $(this).val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/get_doctor_appointments') }}"+"/"+doctor_id,
                        type: "get",
                        success: function(res){
                            console.log(res);
                            for(key in res){
                                $("#modal #form #doctor .doctor_appointment").css("display" , "block");
                                $("#modal #form #doctor .doctor_appointment").append(`
                                    <br><br>
                                    <ul>
                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.sat") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].sat_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].sat_to+`</span>
                                        </li>
                                        
                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.sun") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].sun_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].sun_to+`</span>
                                        </li>

                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.mon") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].mon_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].mon_to+`</span>
                                        </li>

                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.tue") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].tue_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].tue_to+`</span>
                                        </li>

                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.wen") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].wen_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].wen_to+`</span>
                                        </li>

                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.thu") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].thu_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].thu_to+`</span>
                                        </li>
                                        
                                        <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> {{ trans("app.fri") }} -- <span class="from">{{ trans("app.From") }}: `+res[key].fri_from+`</span> : <span class="to">{{ trans("app.To") }}: `+res[key].fri_to+`</span>
                                        </li>

                                    </ul>
                                `);
                            }
                        },
                        error: function(res){
                            console.log(res);
                        },
                    });
                });
            });
    
        </script>

@endsection
{{--  
    
    <li style="color: #685df5;padding:4px;font-weight:bold;">
                                            <i class="fa fa-calendar"></i> <span class="from">{{ trans("app.From") }}: 10 AM</span> - <span class="to">{{ trans("app.To") }}: 3 PM</span>
                                        </li>--}}