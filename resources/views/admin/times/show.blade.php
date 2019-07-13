<div id="show" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title" id="title">{{ trans('app.View') }}</h5>
                </div>
    
                <form class="m-form m-form--label-align-left- m-form--state-" id="form" action="{{url('save')}}" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="label_show">{{ trans('app.Branche') }}</label>
                                    <p id="p_name" class="p_show"></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">    
                                <div class="col-sm-12">
                                    <label class="label_show">{{ trans('app.Phone') }}</label>
                                    <p id="p_phone" class="p_show"></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="label_show">{{ trans('app.In_Charge_Name') }}</label>
                                    <p id="p_in_charge_name" class="p_show"></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="label_show">{{ trans('app.Address') }}</label>
                                    <p id="p_address" class="p_show"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>