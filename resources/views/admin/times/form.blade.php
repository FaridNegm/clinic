<div id="modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title"></h5>
            </div>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form" action="{{url('save')}}" method="get" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ trans('app.from') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control pickatime" placeholder="{{ trans('app.from') }}" id="from" name="from">
                                <bold class="text-danger" id="errors-from" style="display: none;"></bold>
                            </div>

                            <div class="col-sm-6">
                                <label>{{ trans('app.to') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="text" class="form-control pickatime" placeholder="{{ trans('app.to') }}" id="to" name="to">
                                <bold class="text-danger" id="errors-to" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6" id="day">
                                <label>{{ trans('app.day') }}</label>
                                <i class="icon-star-full2 require_input"></i>
                                <select  name="day"  class="bootstrap-select selected" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option" style="display: none;"></option>
                                    <option value="السبت">السبت</option>
                                    <option value="الأحد">الأحد</option>
                                    <option value="الإتنين">الإتنين</option>
                                    <option value="الثلاثاء">الثلاثاء</option>
                                    <option value="الأربعاء">الأربعاء</option>
                                    <option value="الخميس">الخميس</option>
                                    <option value="الجمعه">الجمعه</option>
                                </select>
                                
                                <bold class="text-danger" id="errors-day" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select  name="gender"  class="bootstrap-select selected" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option" style="display: none;"></option>
                                    <option value="بنين">بنين</option>
                                    <option value="بنات">بنات</option>
                                    <option value="كليهما">كليهما</option>
                                </select>
                                
                                <bold class="text-danger" id="errors-gender" style="display: none;"></bold>
                            </div>

                            <div class="col-sm-6" id="matter">
                                <label>{{ trans('app.matter') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <select  name="matter" class="bootstrap-select selected" data-live-search="true" data-width="100%">
                                    <option value=""  class="hidden_option" style="display: none;"></option>
                                    <option value="علوم">علوم</option>
                                    <option value="دراسات">دراسات</option>
                                    <option value="كليهما">كليهما</option>
                                </select>
                                
                                <bold class="text-danger" id="errors-matter" style="display: none;"></bold>
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