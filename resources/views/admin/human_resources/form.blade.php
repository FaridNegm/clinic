<div id="modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
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
                            <div class="col-sm-4">
                                <label>{{ trans('app.name') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control" placeholder="{{ trans('app.name') }}" id="name" name="name">
                                <bold class="text-danger" id="errors-name" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>{{ trans('app.email') }}</label>
                                <!-- <i class=" icon-star-full2 require_input"></i> -->
                                <input type="email" class="form-control" placeholder="{{ trans('app.email') }}" id="email" name="email">
                                <bold class="text-danger" id="errors-email" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>{{ trans('app.password') }}</label>
                                <!-- <i class=" icon-star-full2 require_input"></i> -->
                                <input type="password" class="form-control" placeholder="{{ trans('app.password') }}" id="password" name="password">
                                <bold class="text-danger" id="errors-password" style="display: none;"></bold>
                            </div>                            
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4" id="job">
                                <label>{{ trans('app.job') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="job"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option" style="display: none;"></option>
                                    <option value="3">{{ trans("app.pharmacist") }}</option>
                                    <option value="4">{{ trans("app.accountant") }}</option>
                                    <option value="2">{{ trans("app.energy") }}</option>
                                    <option value="1">{{ trans("app.nurse") }}</option>
                                    <option value="6">{{ trans("app.receptionist") }}</option>
                                    <option value="7">{{ trans("app.assistant") }}</option>
                                    <option value="5">{{ trans("app.clean_worker") }}</option>
                                </select>
                                <bold class="text-danger" id="errors-job" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="gender"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option" style="display: none;"></option>
                                    <option value="1">{{ trans('app.male') }}</option>
                                    <option value="2">{{ trans('app.female') }}</option>
                                </select>
                                <bold class="text-danger" id="errors-gender" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4" id="status">
                                <label>{{ trans('app.status') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="status"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option" style="display: none;"></option>
                                    <option value="1">{{ trans('app.active') }}</option>
                                    <option value="2">{{ trans('app.not_active') }}</option>
                                </select>
                                <bold class="text-danger" id="errors-status" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>{{ trans('app.mobile') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control" placeholder="{{ trans('app.mobile') }}" id="mobile" name="mobile">
                                <bold class="text-danger" id="errors-mobile" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>{{ trans('app.phone') }}</label>
                                {{--  <i class=" icon-star-full2 require_input"></i>  --}}
                                <input type="text" class="form-control" placeholder="{{ trans('app.phone') }}" id="phone" name="phone">
                                <bold class="text-danger" id="errors-phone" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>{{ trans('app.birth_date') }}</label>
                                {{--  <i class=" icon-star-full2 require_input"></i>  --}}
                                <input type="date" class="form-control" placeholder="{{ trans('app.birth_date') }}" id="birth_date" name="birth_date">
                                <bold class="text-danger" id="errors-birth_date" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ trans('app.address') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control" placeholder="{{ trans('app.address') }}" id="address" name="address">
                                <bold class="text-danger" id="errors-address" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ trans('app.image') }}</label>
                                <input type="file" class="file-input" data-main-class="input-group" data-show-upload="false" id="image" name="image">
                                <input type="hidden" class="df_image" id="df_image" name="df_image">
                                <img src="" class="image_hidden img-responsive" style="display: none;width:36%;height:300px;margin: 30px auto 10px;border-radius: 50%;" />
                                <bold class="text-danger" id="errors-image" style="display: none;"></bold>
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