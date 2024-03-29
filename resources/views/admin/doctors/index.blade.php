@extends('admin.layouts.app')

@section('title')
    {{ trans('app.Doctors') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <div class="page-header page-header-default">

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ trans('app.Doctors') }}</h4>
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
                    <li class="active">{{ trans('app.Doctors') }}</li>
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
                    <h5 class="panel-title">{{ trans('app.All Doctors') }}</h5>
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
                            <th>{{ trans('app.name') }}</th>
                            <th>{{ trans('app.mobile') }}</th>
                            <th>{{ trans('app.department') }}</th>
                            <th>{{ trans('app.gender') }}</th>
                            <th>{{ trans('app.image') }}</th>
                            <th>{{ trans('app.status') }}</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($all as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td>{{ $item->department }}</td>
                                <td>
                                    @if($item->gender == 1)
                                    <span class="badge bg-info">{{ trans('app.male') }}</span>
                                    @else
                                        <span class="badge bg-pink">{{ trans('app.female') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <img src="{{ url('admin/images/doctors/'.$item->image) }}" style="width:50px;height:50px;border-radius:50%;"/>
                                </td>
                                <td>
                                    @if($item->status == 1)
                                        {{ trans('app.active') }}
                                    @else
                                        <span class="badge bg-warning">{{ trans('app.not_active') }}</span>
                                    @endif
                                </td>
                                <td> 
                                    
                                    <i class="icon-eye text-success-300 preview" data-toggle="modal" data-target="#preview" loop_id="{{ $item->id }}"></i>
                                    
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

    @include('admin/doctors/form')
    @include('admin/doctors/preview')

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
    
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/picker_date_rtl.js"></script>
    {{--  <script src="{{ url('admin') }}/global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>  --}}
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/plugins/media/fancybox.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/gallery.js"></script>

    <script>

            $(document).ready(function(){
                
                // View
                $(document).on("click" , "table .preview" , function(){
                    var loop_id = $(this).attr("loop_id");
                    
                    $("#modal form #name").val("");
                    $("#modal form #email").val("");
                    $("#modal form #password").val("");
                    $("#modal form #address").val("");
                    $("#modal form #phone").val("");
                    $("#modal form #mobile").val("");
                    $("#modal form #image").val("");
                    $("#modal form #gender .hidden_option").css("display" , "none");
                    $("#modal form #department .hidden_option").css("display" , "none");
                    $("#modal form #status .hidden_option").css("display" , "none");
                    $("#modal form .image_hidden").css("display" , "none");

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/show_doctors') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){                            
                            $("#image img").attr("src" , "{{ url('admin/images/doctors') }}"+"/"+res[0].image);
                            $("#image .caption-overflow span a").attr("href" , "{{ url('admin/images/doctors') }}"+"/"+res[0].image);
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

                });

                // Add New
                $("#add_new").click(function(){
                    $("#modal .modal-title").text("{{trans('app.Add')}}");
                    $("#modal .modal-footer #save").css("display" , "inline-block");
                    $("#modal .modal-footer #update").css("display" , "none");
    
                    $("#modal form #name").val("");
                    $("#modal form #email").val("");
                    $("#modal form #password").val("");
                    $("#modal form #address").val("");
                    $("#modal form #phone").val("");
                    $("#modal form #mobile").val("");
                    $("#modal form #image").val("");
                    $("#modal form #gender .hidden_option").css("display" , "none");
                    $("#modal form #department .hidden_option").css("display" , "none");
                    $("#modal form #status .hidden_option").css("display" , "none");
                    $("#modal form .image_hidden").css("display" , "none");
                    
                    $("form #errors-name").text('');
                    $("form #errors-email").text('');
                    $("form #errors-password").text('');
                    $("form #errors-gender").text('');
                    $("form #errors-mobile").text('');
                    $("form #errors-address").text('');
                    $("form #errors-status").text('');
                    $("form #errors-department").text('');

                    $("#modal .modal-footer #save").click(function(e){
                        e.preventDefault();
    
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
    
                        $.ajax({
                        url: "{{url('admin/add_doctors')}}",
                        type: 'POST',
                        data: $("#modal #form").serialize(),
                        {{--  data: $("#modal #form").serialize(),  --}}
                        success: function(res){
                            $("#modal").modal("hide");
                            $("form").trigger("reset");
    
                            $("form #errors-name").text('');
                            $("form #errors-email").text('');
                            $("form #errors-password").text('');
                            $("form #errors-gender").text('');
                            $("form #errors-mobile").text('');
                            $("form #errors-address").text('');
                            $("form #errors-status").text('');
                            $("form #errors-department").text('');
                            
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
                            if(res.responseJSON.errors.email){
                                $("form #errors-email").css('display' , 'block').text(res.responseJSON.errors.email);
                            }else{
                                $("form #errors-email").text('');
                            }
                            if(res.responseJSON.errors.gender){
                                $("form #errors-gender").css('display' , 'block').text(res.responseJSON.errors.gender);
                            }else{
                                $("form #errors-gender").text('');
                            }
                            if(res.responseJSON.errors.address){
                                $("form #errors-address").css('display' , 'block').text(res.responseJSON.errors.address);
                            }else{
                                $("form #errors-address").text('');
                            }
                            if(res.responseJSON.errors.status){
                                $("form #errors-status").css('display' , 'block').text(res.responseJSON.errors.status);
                            }else{
                                $("form #errors-status").text('');
                            }
                            if(res.responseJSON.errors.password){
                                $("form #errors-password").css('display' , 'block').text(res.responseJSON.errors.password);
                            }else{
                                $("form #errors-password").text('');
                            }
                            if(res.responseJSON.errors.mobile){
                                $("form #errors-mobile").css('display' , 'block').text(res.responseJSON.errors.mobile);
                            }else{
                                $("form #errors-mobile").text('');
                            }
                            if(res.responseJSON.errors.department){
                                $("form #errors-department").css('display' , 'block').text(res.responseJSON.errors.department);
                            }else{
                                $("form #errors-department").text('');
                            }
                            if(res.responseJSON.errors.phone){
                                $("form #errors-phone").css('display' , 'block').text(res.responseJSON.errors.phone);
                            }else{
                                $("form #errors-phone").text('');
                            }
                            if(res.responseJSON.errors.mobile){
                                $("form #errors-mobile").css('display' , 'block').text(res.responseJSON.errors.mobile);
                            }else{
                                $("form #errors-mobile").text('');
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
                    $("form #errors-email").text('');
                    $("form #errors-password").text('');
                    $("form #errors-gender").text('');
                    $("form #errors-mobile").text('');
                    $("form #errors-address").text('');
                    $("form #errors-status").text('');
                    $("form #errors-department").text('');
                    $("#modal form .image_hidden").css("display" , "none");

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('admin/edit_doctors') }}"+'/'+loop_id,
                        type: 'get',
                        success: function(res){
                            console.log(res);
                            
                            $("#modal form #name").val(res[0].name);
                            $("#modal form #password").attr("disabled" , "disabled");
                            $("#modal form #email").val(res[0].email);
                            $("#modal form #address").val(res[0].address);
                            $("#modal form #phone").val(res[0].phone);
                            $("#modal form #mobile").val(res[0].mobile);
                            {{--  $("#modal form #image").val(res[0].image);  --}}
                            $("#modal form .image_hidden").css("display" , "block").attr("src" , "{{ url('admin/images/doctors') }}"+"/"+res[0].image);
                            if(res[0].gender == 1)
                                $("#modal form #gender .hidden_option").css("display" , "block").text("{{ trans('app.male') }}").val(res[0].gender);
                            else
                            $("#modal form #gender .hidden_option").css("display" , "block").text("{{ trans('app.female') }}").val(res[0].gender);
                            
                            if(res[0].status == 1)
                                $("#modal form #status .hidden_option").css("display" , "block").text("{{ trans('app.active') }}").val(res[0].status);
                            else
                                $("#modal form #status .hidden_option").css("display" , "block").text("{{ trans('app.not_active') }}").val(res[0].status);

                            $("#modal form #department .hidden_option").css("display" , "block").text(res[0].department).val(res[0].department);
                            
                        },
                    });
                    
                    $(document).on("click" , "#modal .modal-footer #update" ,function(e){
                        e.preventDefault();

                        $.ajax({
                            url: "{{ url('admin/update_doctors') }}"+'/'+loop_id,
                            type: 'POST',
                            data: $('#modal form').serialize(),
                            success: function(res){
                                console.log(res);
                                $("#modal").modal("hide");
                                $("form").trigger("reset");
        
                                $("form #errors-name").text('');
                                $("form #errors-email").text('');
                                $("form #errors-password").text('');
                                $("form #errors-gender").text('');
                                $("form #errors-mobile").text('');
                                $("form #errors-address").text('');
                                $("form #errors-status").text('');
                                $("form #errors-department").text('');
                                
                                
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
                                if(res.responseJSON.errors.email){
                                    $("form #errors-email").css('display' , 'block').text(res.responseJSON.errors.email);
                                }else{
                                    $("form #errors-email").text('');
                                }
                                if(res.responseJSON.errors.gender){
                                    $("form #errors-gender").css('display' , 'block').text(res.responseJSON.errors.gender);
                                }else{
                                    $("form #errors-gender").text('');
                                }
                                if(res.responseJSON.errors.address){
                                    $("form #errors-address").css('display' , 'block').text(res.responseJSON.errors.address);
                                }else{
                                    $("form #errors-address").text('');
                                }
                                if(res.responseJSON.errors.status){
                                    $("form #errors-status").css('display' , 'block').text(res.responseJSON.errors.status);
                                }else{
                                    $("form #errors-status").text('');
                                }
                                if(res.responseJSON.errors.mobile){
                                    $("form #errors-mobile").css('display' , 'block').text(res.responseJSON.errors.mobile);
                                }else{
                                    $("form #errors-mobile").text('');
                                }
                                if(res.responseJSON.errors.department){
                                    $("form #errors-department").css('display' , 'block').text(res.responseJSON.errors.department);
                                }else{
                                    $("form #errors-department").text('');
                                }
                                if(res.responseJSON.errors.phone){
                                    $("form #errors-phone").css('display' , 'block').text(res.responseJSON.errors.phone);
                                }else{
                                    $("form #errors-phone").text('');
                                }
                                if(res.responseJSON.errors.mobile){
                                    $("form #errors-mobile").css('display' , 'block').text(res.responseJSON.errors.mobile);
                                }else{
                                    $("form #errors-mobile").text('');
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
                                url: "{{ url('admin/delete_doctors') }}"+'/'+loop_id,
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
