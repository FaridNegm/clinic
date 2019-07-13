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
                                <label>{{ trans('app.name') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control" placeholder="{{ trans('app.name') }}" id="name" name="name">
                                <bold class="text-danger" id="errors-name" style="display: none;"></bold>
                            </div>                     
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>{{ trans('app.description') }}</label>
                                {{--  <i class=" icon-star-full2 require_input"></i>  --}}
                                <textarea class="form-control" placeholder="{{ trans('app.description') }}" id="description" name="description" rows="5"></textarea>
                                <bold class="text-danger" id="errors-description" style="display: none;"></bold>
                            </div>                     
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="status">
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