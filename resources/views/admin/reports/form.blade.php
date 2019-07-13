{{--  // students_modal  --}}
<div id="students_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title">تقرير الطلاب</h5>
            </div>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ trans('app.from') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="date" class="form-control" placeholder="{{ trans('app.from') }}" id="from" name="from" value="{{ date('m/d/Y') }}">
                                <bold class="text-danger" id="errors-from" style="display: none;"></bold>
                            </div>

                            <div class="col-sm-6">
                                <label>{{ trans('app.to') }}</label>
                                <input type="date" class="form-control" placeholder="{{ trans('app.to') }}" id="to" name="to" value="{{ date('m/d/Y') }}">
                                <bold class="text-danger" id="errors-to" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <select name="gender"  class="form-control">
                                    <option value="---">---</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثي</option>
                                    {{--  <option value="كليهما">كليهما</option>  --}}
                                </select>
                            </div>
                            
                            <div class="col-sm-6" id="education_year">
                                <label>{{ trans('app.education_year') }}</label>
                                <select  name="education_year"  class="form-control">
                                    <option value="---">---</option>
                                    @foreach (App\EducationYear::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="matter">
                                <label>{{ trans('app.matter') }}</label>
                                <select  name="matter" class="form-control">
                                    <option value="---">---</option>
                                    <option value="science">علوم</option>
                                    <option value="history">دراسات</option>
                                    <option value="together">كليهما</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="" type="button" class="btn btn-primary" id="view">عرض التقرير</a>
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{trans('app.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  // absence_modal  --}}
<div id="absence_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title">الحضور والغياب للطلاب</h5>
            </div>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ trans('app.from') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="date" class="form-control" placeholder="{{ trans('app.from') }}" id="from" name="from">
                                <bold class="text-danger" id="errors-from" style="display: none;"></bold>
                            </div>

                            <div class="col-sm-6">
                                <label>{{ trans('app.to') }}</label>
                                <input type="date" class="form-control" placeholder="{{ trans('app.to') }}" id="to" name="to">
                                <bold class="text-danger" id="errors-to" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <select name="gender"  class="form-control">
                                    <option value="---">---</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثي</option>
                                    {{--  <option value="كليهما">كليهما</option>  --}}
                                </select>
                            </div>
                            
                            <div class="col-sm-6" id="education_year">
                                <label>{{ trans('app.education_year') }}</label>
                                <select  name="education_year"  class="form-control">
                                    <option value="---">---</option>
                                    @foreach (App\EducationYear::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="matter">
                                <label>{{ trans('app.matter') }}</label>
                                <select  name="matter" class="form-control">
                                    <option value="---">---</option>
                                    <option value="science">علوم</option>
                                    <option value="history">دراسات</option>
                                    <option value="together">كليهما</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="view">عرض التقرير</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{trans('app.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  // exam_degree_modal  --}}
<div id="exam_degree_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title">درجات الإمتحان للطلاب</h5>
            </div>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ trans('app.from') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="month" class="form-control" placeholder="{{ trans('app.from') }}" id="from" name="from">
                                <bold class="text-danger" id="errors-from" style="display: none;"></bold>
                            </div>

                            <div class="col-sm-6">
                                <label>{{ trans('app.to') }}</label>
                                <input type="month" class="form-control" placeholder="{{ trans('app.to') }}" id="to" name="to">
                                <bold class="text-danger" id="errors-to" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <select name="gender"  class="form-control">
                                    <option value="---">---</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثي</option>
                                    {{--  <option value="كليهما">كليهما</option>  --}}
                                </select>
                            </div>
                            
                            <div class="col-sm-6" id="education_year">
                                <label>{{ trans('app.education_year') }}</label>
                                <select  name="education_year"  class="form-control">
                                    <option value="---">---</option>
                                    @foreach (App\EducationYear::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="matter">
                                <label>{{ trans('app.matter') }}</label>
                                <select  name="matter" class="form-control">
                                    <option value="---">---</option>
                                    <option value="science">علوم</option>
                                    <option value="history">دراسات</option>
                                    <option value="together">كليهما</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="view">عرض التقرير</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{trans('app.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  // students_moneys_modal  --}}
<div id="students_moneys_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title" id="title">فلوس الطلاب</h5>
            </div>

            <form class="m-form m-form--label-align-left- m-form--state-" id="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>{{ trans('app.from') }}</label>
                                <i class=" icon-star-full2 require_input"></i>
                                <input type="month" class="form-control" placeholder="{{ trans('app.from') }}" id="from" name="from">
                                <bold class="text-danger" id="errors-from" style="display: none;"></bold>
                            </div>

                            <div class="col-sm-6">
                                <label>{{ trans('app.to') }}</label>
                                <input type="month" class="form-control" placeholder="{{ trans('app.to') }}" id="to" name="to">
                                <bold class="text-danger" id="errors-to" style="display: none;"></bold>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6" id="gender">
                                <label>{{ trans('app.gender') }}</label>
                                <select name="gender"  class="form-control">
                                    <option value="---">---</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثي</option>
                                    {{--  <option value="كليهما">كليهما</option>  --}}
                                </select>
                            </div>
                            
                            <div class="col-sm-6" id="education_year">
                                <label>{{ trans('app.education_year') }}</label>
                                <select  name="education_year"  class="form-control">
                                    <option value="---">---</option>
                                    @foreach (App\EducationYear::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12" id="matter">
                                <label>{{ trans('app.matter') }}</label>
                                <select  name="matter" class="form-control">
                                    <option value="---">---</option>
                                    <option value="science">علوم</option>
                                    <option value="history">دراسات</option>
                                    <option value="together">كليهما</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="view">عرض التقرير</button>
                    <button type="button" class="btn btn-link" data-dismiss="modal">{{trans('app.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>