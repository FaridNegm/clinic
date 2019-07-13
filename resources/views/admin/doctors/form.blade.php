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
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="email" class="form-control" placeholder="{{ trans('app.email') }}" id="email" name="email">
                                <bold class="text-danger" id="errors-email" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>{{ trans('app.password') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="password" class="form-control" placeholder="{{ trans('app.password') }}" id="password" name="password">
                                <bold class="text-danger" id="errors-password" style="display: none;"></bold>
                            </div>                            
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4" id="department">
                                <label>{{ trans('app.department') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="department"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    <option value="السبت">السبت</option>
                                    <option value="الأحد">الأحد</option>
                                    <option value="الإتنين">الإتنين</option>
                                </select>
                                <bold class="text-danger" id="errors-department" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="gender"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    <option value="1">{{ trans('app.male') }}</option>
                                    <option value="2">{{ trans('app.female') }}</option>
                                </select>
                                <bold class="text-danger" id="errors-gender" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-4" id="status">
                                <label>{{ trans('app.status') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select name="status"  class="bootstrap-select" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option selected" style="display: none;"></option>
                                    <option value="1">{{ trans('app.active') }}</option>
                                    <option value="2">{{ trans('app.not_active') }}</option>
                                </select>
                                <bold class="text-danger" id="errors-status" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ trans('app.mobile') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control" placeholder="{{ trans('app.mobile') }}" id="mobile" name="mobile">
                                <bold class="text-danger" id="errors-mobile" style="display: none;"></bold>
                            </div>
                            
                            <div class="col-sm-6">
                                <label>{{ trans('app.phone') }}</label>
                                {{--  <i class=" icon-star-full2 require_input"></i>  --}}
                                <input type="text" class="form-control" placeholder="{{ trans('app.phone') }}" id="phone" name="phone">
                                <bold class="text-danger" id="errors-phone" style="display: none;"></bold>
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