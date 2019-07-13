<div id="modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title"></h5>
            </div>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="name">
                                <label>{{ trans('app.doctor') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="name" class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    @foreach (App\Doctors::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <bold class="text-danger" id="errors-name" style="display: none;"></bold>
                            </div>                     
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.sat') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="sat_from" name="sat_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="sat_to" name="sat_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.sun') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="sun_from" name="sun_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="sun_to" name="sun_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.mon') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="mon_from" name="mon_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="mon_to" name="mon_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.tue') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="tue_from" name="tue_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="tue_to" name="tue_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.wen') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="wen_from" name="wen_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="wen_to" name="wen_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.thu') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="thu_from" name="thu_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="thu_to" name="thu_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    
                    <div class="form-group">
                        <div>
                            <label>{{ trans('app.fri') }}</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="fri_from" name="fri_from">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="fri_to" name="fri_to">
                                </div>
                            </div>
                        </div>                     
                    </div>
                    


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{trans('app.Close')}}</button>
                    <button type="button" class="btn btn-primary" style="display: none;" id="save">{{trans('app.Save')}}</button>
                    <button type="button" class="btn btn-success" style="display: none;" id="update">{{trans('app.Update')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>