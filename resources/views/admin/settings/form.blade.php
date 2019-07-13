<div id="modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title"></h5>
            </div>

            <br><br>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form" enctype="multipart/form-data">
                @csrf

                <div class="panel panel-flat">
                    <div class="panel-body">
                        <div class="tabbable">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#default-pill1" data-toggle="tab">{{ trans('app.basic_information') }}</a></li>
                                <li><a href="#default-pill2" data-toggle="tab">{{ trans('app.images_and_colors') }}</a></li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="default-pill1"> 
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>{{ trans('app.Name') }}</label>
                                                    <input type="text" placeholder="{{ trans('app.Name') }}" id="name" name="name" class="form-control">
                                                    <i class=" icon-star-full2 require_input"></i>
                                                    <bold class="text-danger" id="errors-name" style="display: none;"></bold>
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <label>{{ trans('app.Email') }}</label>
                                                    <input type="email" placeholder="{{ trans('app.Email') }}" id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>{{ trans('app.owner_name') }}</label>
                                                    <input type="text" placeholder="{{ trans('app.owner_name') }}" id="owner_name" name="owner_name" class="form-control">
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <label>{{ trans('app.slogen') }}</label>
                                                    <input type="text" placeholder="{{ trans('app.slogen') }}" id="slogen" name="slogen" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>{{ trans('app.phone_num') }}</label>
                                                    <input type="text" placeholder="{{ trans('app.phone_num') }}" id="phone_num" name="phone_num" class="form-control">
                                                </div>
                                                
                                                <div class="col-sm-6">
                                                    <label>{{ trans('app.Mobile') }}</label>
                                                    <input type="text" placeholder="{{ trans('app.Mobile') }}" id="mobile" name="mobile" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>{{ trans('app.Address') }}</label>
                                                    <textarea class="form-control" placeholder="{{ trans('app.Address') }}" id="address" name="address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="default-pill2"> 
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <label>{{ trans('app.image') }}</label>
                                                    <input type="file" placeholder="{{ trans('app.image') }}" id="image" name="image" class="form-control">
                                                    <input type="hidden" id="df_image" name="df_image" class="form-control" value="">
                                                </div>
                                                <div class="col-sm-2">
                                                    <img id="setting_image" src="" width="90px" height="85px" style="border-radius: 10px; margin:2px 0px;display: none;"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="main_background">
                                                <div class="row">
                                                    <div class="col-md-3 all_images">
                                                        <img src="{{ url('admin/back_images/1.jpg') }}" style="width:100%;height:80px;"/>
                                                        <i class=" icon-x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label>{{ trans('app.colors') }}</label>
                                                    <div class="main_colors">
                                                        <select name="theme"  class="form-control main_colors">
                                                            <option value="" selected class="hidden_option" style="display: none;"></option>
                                                            <option class="color1" value="#00969d" selected  style="background-color:#00969d;"></option>
                                                            <option class="color3" value="#e821c9" style="background-color:#e821c9;"></option>
                                                            <option class="color4" value="#4231e4" style="background-color:#4231e4;"></option>
                                                            <option class="color5" value="#ad3" style="background-color:#ad3;"></option>
                                                            <option class="color6" value="#3e2828" style="background-color:#3e2828;"></option>
                                                            <option class="color7" value="#e41313" style="background-color:#e41313;"></option>
                                                            <option class="color8" value="#43a047" style="background-color:#43a047;"></option>
                                                            <option class="color9" value="#e4cc2d" style="background-color:#e4cc2d;"></option>
                                                            <option class="color2" value="#2196f3" style="background-color:#2196f3;"></option>
                                                            <option class="color10" value="#ff774d" style="background-color:#ff774d;"></option>
                                                        </select>
                                                        {{-- <div class="row">
                                                            <div class="color1 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#00969d;"></div>
                                                            <div class="color2 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#2196f3;"></div>
                                                            <div class="color3 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#e821c9;"></div>
                                                            <div class="color4 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#4231e4;"></div>
                                                            <div class="color5 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#ad3;"></div>
                                                            <div class="color6 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#3e2828;"></div>
                                                            <div class="color7 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:red;"></div>
                                                            <div class="color8 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#43a047;"></div>
                                                            <div class="color9 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#e4cc2d;"></div>
                                                            <div class="color10 col-xs-2" name="theme" style="height:40px;margin:2px;background-color:#ff774d;"></div>
                                                        </div> --}}
                                                    </div>
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

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>