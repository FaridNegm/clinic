@extends('admin.layouts.app')

@section('title')
    {{ trans('app.patient_documents') }}
@endsection

@section('header')
    <link href="{{ url('admin') }}/assets/vendors/custom/datatables/datatables.bundle.rtl.css" rel="stylesheet" type="text/css" />
    <style>
        #add_new{
            color: #FFF;
        }
        
        #add_new:hover{
            color: #FFF;
            background-color: orangered;
            border: 1px solid orangered;
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper" id="app2">

        <div class="page-header page-header-default">

            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">{{ trans('app.patient_documents') }}</h4>
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
                    <li class="active">{{ trans('app.patient_documents') }}</li>
                </ul>

                <ul class="breadcrumb-elements" style="margin: 10px;">
                    <li>
                        <a href="{{ url('admin/patient_documents') }}" type="button" class="btn bg-blue-800 btn-icon btn-float" id="add_new">
                            <i class=" icon-arrow-left16 position-left"></i> 
                        </a>

                        {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal" id="add_new"><i class=" icon-plus3 position-left"></i> {{ trans('app.Add') }}</button>  --}}
                    </li>
                </ul>
            </div>
        </div>

        <div class="content">

            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">{{ trans('app.All patient_documents') }}</h5>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>

                    <div class="modal-body" style="padding: 60px 20px;">
                                      
                        <div class="top col-md-12">
                            <div class="row">
                                <div class="date col-md-4">
                                    <bold>{{ trans('app.date') }}</bold>
                                    : <span style="color:red;">{{ $data['date'] }}</span>
                                </div> 
                                <div class="patient col-md-4">
                                    <bold>{{ trans('app.patient') }}</bold>
                                    : <span style="color:red;">{{ $data['patient_name']['name'] }}</span>
                                </div> 
                                <div class="doctor col-md-4">
                                    <bold>{{ trans('app.doctor') }}</bold>
                                    : <span style="color:red;">{{ $data['doctor_name']['name'] }}</span>
                                </div> 
                            </div>
                        </div>

                        <div class="bottom" style="margin: 60px 0px 30px;">
                            <div class="row">
                                @foreach ($data_each as $item)  
                                    @foreach(json_decode($item->files) as $img)
                                        <div class="col-lg-3 col-sm-6">
                                            @if(strpos($img , '.jpg'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <img src="{{ url('admin/images/patient_documents/'.$img) }}" alt="" style="height: 200px;">                                                        
                                                        <div class="caption-overflow">
                                                            <span>
                                                                <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.png'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <img src="{{ url('admin/images/patient_documents/'.$img) }}" alt="" style="height: 200px;">                                                        
                                                        <div class="caption-overflow">
                                                            <span>
                                                                <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.jpeg'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <img src="{{ url('admin/images/patient_documents/'.$img) }}" alt="" style="height: 200px;">                                                        
                                                        <div class="caption-overflow">
                                                            <span>
                                                                <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.gif'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <img src="{{ url('admin/images/patient_documents/'.$img) }}" alt="" style="height: 200px;">                                                        
                                                        <div class="caption-overflow">
                                                            <span>
                                                                <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.pdf'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <i class=" icon-file-pdf" style="font-size: 200px;color:red;"></i>                                                   
                                                        <div class="caption-overflow">
                                                            <span>
                                                                {{--  <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>  --}}

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.xlsx'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <i class=" icon-file-excel" style="font-size: 200px;color:red;"></i>                                                   
                                                        <div class="caption-overflow">
                                                            <span>
                                                                {{--  <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>  --}}

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.docx'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <i class="icon-file-word" style="font-size: 200px;color:red;"></i>                                                   
                                                        <div class="caption-overflow">
                                                            <span>
                                                                {{--  <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>  --}}

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif (strpos($img , '.txt'))
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <i class="icon-file-text2" style="font-size: 200px;color:red;"></i>                                                   
                                                        <div class="caption-overflow">
                                                            <span>
                                                                {{--  <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>  --}}

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="thumbnail">
                                                    <div class="thumb">
                                                        <img src="{{ url('admin/images/patient_documents/'.$img) }}" alt="" style="height: 200px;">                                                        
                                                        <div class="caption-overflow">
                                                            <span>
                                                                <a href="{{ url('admin/images/patient_documents/'.$img) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>

                                                                <a download href="{{ url('admin/images/patient_documents/'.$img) }}" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-download4"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                
            </div>

            @include('admin/layouts/footer')

        </div>

    </div>

@endsection

@section('footer')

	<script src="{{ url('admin') }}/global_assets/js/plugins/media/fancybox.min.js"></script>
    <script src="{{ url('admin') }}/global_assets/js/demo_pages/gallery.js"></script>
    
@endsection

