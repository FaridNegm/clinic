<!-- Main sidebar -->
			<div class="sidebar sidebar-main" style="z-index: 1000;">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="{{ url('admin') }}/global_assets/images/demo/users/face11.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">Victoria Baker</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<li><a href="{{ url('admin/dashboard') }}"><i class="icon-home4"></i> <span>{{ trans('app.Home') }}</span></a></li>

								<li>
									<a href="#"><i class="fa fa-th-large" style="font-size: 20px;"></i> <span>{{ trans('app.Departments') }}</span></a>
									<ul>
										<li><a href="{{ url('admin/departments') }}" id="layout1">{{ trans('app.All Departments') }}</a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="fa fa-stethoscope" style="font-size: 20px;"></i> <span>{{ trans('app.Doctors') }}</span></a>
									<ul>
										<li><a href="{{ url('admin/doctors') }}" id="layout1">{{ trans('app.All Doctors') }}</a></li>
										<li><a href="{{ url('admin/doctor_appointments') }}" id="layout1">{{ trans('app.All doctor_appointments') }}</a></li>
									</ul>
								</li>
								
								<li>
									<a href="#"><i class="fa fa-wheelchair" style="font-size: 20px;"></i> <span>{{ trans('app.Patients') }}</span></a>
									<ul>
										<li><a href="{{ url('admin/patients') }}" id="layout1">{{ trans('app.All Patients') }}</a></li>
										<li><a href="{{ url('admin/patient_documents') }}" id="layout1">{{ trans('app.patient_documents') }}</a></li>
									</ul>
								</li>
																
								<li>
									<a href="#"><i class=" icon-cog2" style="font-size: 20px;"></i> <span>{{ trans('app.Settings') }}</span></a>
									<ul>
										<li><a href="{{ url('admin/settings') }}" id="layout1">{{ trans('app.Settings') }}</a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-file-check2"></i> <span>{{ trans('app.Reports') }}</span></a>
									<ul>
										<li><a href="{{ url('admin/reports') }}" id="layout1">{{ trans('app.Reports') }}</a></li>
										{{--  <li><a href="{{ url('admin/absences_reports') }}" id="layout1">{{ trans('app.absences') }}</a></li>
										<li><a href="{{ url('admin/exam_degrees_reports') }}" id="layout1">{{ trans('app.exam_degrees') }}</a></li>
										<li><a href="{{ url('admin/students_moneys_reports') }}" id="layout1">{{ trans('app.students_moneys') }}</a></li>  --}}
									</ul>
								</li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->