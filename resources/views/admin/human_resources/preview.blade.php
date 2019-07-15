<div id="preview" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title" id="title">{{ trans('app.View') }}</h5>
                </div>
    
                <div class="modal-body" style="padding: 60px 20px;">
                    <div class="row">
                        <div class="col-md-4" id="image" style="height:100%;padding: 20px 10px;">
                                <div class="thumbnail">
                                    <div class="thumb">
                                        <img src="" alt="" style="width:200px;height: 200px;margin:0px auto;border-radius:50%;">                                                        
                                        <div class="caption-overflow">
                                            <span>
                                                <a href="" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            {{--  <img src="" class="img-responsive" />  --}}
                        </div>
                            
                        <div class="col-md-8" id="content">
                            <div class="col-md-6">
                                <div id="id">
                                    <bold>{{ trans('app.id') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="name">
                                    <bold>{{ trans('app.name') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="email">
                                    <bold>{{ trans('app.email') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="mobile">
                                    <bold>{{ trans('app.mobile') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="phone">
                                    <bold>{{ trans('app.phone') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div id="job">
                                    <bold>{{ trans('app.job') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="gender">
                                    <bold>{{ trans('app.gender') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="status">
                                    <bold>{{ trans('app.status') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="address">
                                    <bold>{{ trans('app.address') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                                <div id="birth_date">
                                    <bold>{{ trans('app.birth_date') }}</bold>
                                    : <span style="color:red;"></span>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>