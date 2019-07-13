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
                            <div class="col-sm-12">
                                <label>{{ trans('app.date') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="date" class="form-control" placeholder="{{ trans('app.date') }}" id="date" name="date">
                                <bold class="text-danger" id="errors-date" style="display: none;"></bold>
                            </div>                     
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="patient">
                                <label>{{ trans('app.patient') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="patient"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    @foreach (App\patients::where('status' , 1)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <bold class="text-danger" id="errors-patient" style="display: none;"></bold>
                            </div>                     
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="doctor">
                                <label>{{ trans('app.doctor') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="doctor"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    @foreach (App\Doctors::where('status' , 1)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <bold class="text-danger" id="errors-doctor" style="display: none;"></bold>
                                <div class="doctor_appointment" style="display:none;">
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ trans('app.notes') }}</label>
                                {{--  <i class=" icon-star-full2 require_input"></i>  --}}
                                <textarea class="form-control" placeholder="{{ trans('app.notes') }}" id="notes" name="notes" rows="5"></textarea>
                                <bold class="text-danger" id="errors-notes" style="display: none;"></bold>
                            </div>                     
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="appointment_status">
                                <label>{{ trans('app.appointment_status') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="appointment_status"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    <option value="1">{{ trans('app.pending_confirmation') }}</option>
                                    <option value="2">{{ trans('app.confirmed') }}</option>
                                    <option value="3">{{ trans('app.cancelled') }}</option>
                                </select>
                                <bold class="text-danger" id="errors-appointment_status" style="display: none;"></bold>
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