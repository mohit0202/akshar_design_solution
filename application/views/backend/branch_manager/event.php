<section id="main">
	<!-- START Bootstrap Navbar -->
	<div class="navbar navbar-static-top">
		<div class="navbar-inner">
			<!-- Breadcrumb -->
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a><span class="divider"></span>
				</li>
				<li class="active">
					Event
				</li>
			</ul>
			<!--/ Breadcrumb -->
		</div>
	</div>
	<!--/ END Bootstrap Navbar -->

	<!-- START Content -->
	<div class="container-fluid">
		<!-- START Row -->
		<div class="row-fluid">
			<!-- START Page/Section header -->
			<div class="span12">
				<div class="page-header line1">
					<h4>Event <small>This is the place where everything started</small></h4>
				</div>
			</div>
			<!--/ END Page/Section header -->
		</div>
		<!--/ END Row -->
		<!--Page Content Here  -->
		<div id="Branch">

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Form Validation - Inline -->

				<form class="modal container hide fade modal-overflow in form-horizontal span12 widget shadowed yellow" style="left:-10%;" aria-hidden="false" id="form_event">
					<header>
						<h4 class="title">Form Validation - Inline</h4>
						<ul class="nav nav-tabs nav-stacked pull-right">
							<li>
								<a role="button" data-dismiss="modal" aria-hidden="true" href="#"><span class="icon icone-close"></span>close</a>
							</li>
						</ul>

					</header>
					<section class="body" >
						<div class="alert alert-error hide">
							<button class="close" data-dismiss="alert"></button>
							You have some form errors. Please check below.
						</div>
						<div class="alert alert-success hide">
							<button class="close" data-dismiss="alert"></button>
							Your form validation is successful!
						</div>

						<div class="body-inner">
							<h3 class="form-section">Event Info</h3>
							<!-- Event Type -->
							<div class="control-group">
								<label class="control-label">Event Type<span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="event_type" id="event_type">
										<option value="">Select...</option>
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div><!--/ Event Type -->

							<!-- Start Date -->
							<div class="control-group">
								<label class="control-label">Start Date<span class="required">*</span></label>
								<div class="controls">
									<div class="input-append span6" id="start_date_datepicker">
										<input type="text" name="start_date" id="start_date" class="m-wrap span7">
										<span class="add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div><!--/ Start Date -->

							<!-- End Date -->
							<div class="control-group">
								<label class="control-label">End Date<span class="required">*</span></label>
								<div class="controls">
									<div class="input-append span6" id="end_date_datepicker">
										<input type="text" name="end_date" id="end_date" class="m-wrap span7">
										<span class="add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div><!--/ End Date -->

							<!-- Description -->
							<div class="control-group">
								<label class="control-label">Description<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="description" id="description" class="span8"/>
								</div>
							</div><!--/ Description	 -->

							<h3 class="form-section">Event Venue</h3>

							<!-- Street -->
							<div class="control-group">
								<label class="control-label">Street<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="street_1" id="street_1" class="span8"/>
								</div>

							</div>
							<div class="control-group">
								<label class="control-label"><span class="required"></span></label>
								<div class="controls">
									<input type="text" name="street_2" id="street_2" class="span8"/>
								</div>
							</div><!--/ Street -->
							<!-- City -->
							<div class="control-group">
								<label class="control-label">City<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="city" id="city" class="span8"/>
								</div>
							</div><!--/ City -->
							<!-- State -->
							<div class="control-group">
								<label class="control-label">State<span class="required">*</span></label>
								<div class="controls">
									<div class="span4">
										<select class="span12" name="state" id="state">
											<option value="">Select...</option>
											<option value="Category 1">Category 1</option>
											<option value="Category 2">Category 2</option>
											<option value="Category 3">Category 5</option>
											<option value="Category 4">Category 4</option>
										</select>
									</div>
									<div class="span4">
										<input type="text" name="pin_code" id="pin_code" class="span12"/>
									</div>
								</div>
							</div><!--/ State -->

							<h3 class="form-section">Other Info</h3>

							<!-- Organize By -->
							<div class="control-group">
								<label class="control-label">Organize By<span class="required">*</span></label>
								<div class="controls">
									<input type="text" name="organize_by" id="organize_by" class="span8"/>
								</div>
							</div><!--/ Organize By -->

							<!-- Faculty -->
							<div class="control-group">
								<label class="control-label">Responsible Person <span class="required">*</span></label>
								<div class="controls">
									<select class="span4" name="responsible_person" id="responsible_person">
										<option value="">Select...</option>
										<option value="Category 1">Category 1</option>
										<option value="Category 2">Category 2</option>
										<option value="Category 3">Category 5</option>
										<option value="Category 4">Category 4</option>
									</select>
								</div>
							</div><!--/ Faculty -->

							<!-- Form Action -->
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
								<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div><!--/ Form Action -->
						</div>
					</section>
				</form>
				<!--/ END Form Validation - Inline -->
			</div>
			<!--/ END Row -->

			<!-- START Row -->
			<div class="row-fluid">
				<!-- START Datatable 2 -->
				<div class="span12 widget lime">
					<header>
						<h4 class="title"><span class="icon icone-crop"></span>Rich DataTable</h4>
						<!-- START Label/Badge -->
						<span class="label label-important">-21 Outdated Browser</span>
						<!--/ END Label/Badge -->
						<ul class="nav nav-tabs nav-stacked pull-right">
							<li>
								<a role="button" data-toggle="modal" href="#form_event"><span class="icon icone-home"></span> Add Event</a>
							</li>
						</ul>
						<!-- START Button Group -->
						<div class="btn-group pull-right">
							<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">
								With Selected <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li>
									<a href="#">Option 1</a>
								</li>
								<li>
									<a href="#">Option 2</a>
								</li>
								<li>
									<a href="#">Option 3</a>
								</li>
							</ul>
						</div>
						<!--/ END Button Group -->
					</header>
					<section class="body">
						<div class="body-inner">
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="tblEvent">
									<thead>
										<tr>
											<th style="width:8px;">
											<input type="checkbox" class="group-checkable" data-set="#tblBranch .checkboxes" />
											</th>
											<th>EventDate</th>
											<th class="hidden-480">Address</th>
											<th class="hidden-480">Organize by</th>
											<th class="hidden-480">Description</th>
											<th class="hidden-480">Edit</th>
											<th >View</th>
										</tr>
									</thead>
									<tbody>
										<tr class="odd gradeX">
											<td>
											<input type="checkbox" class="checkboxes" value="1" />
											</td>
											<td>shuxer</td>
											<td class="hidden-480"><a href="mailto:shuxer@gmail.com">shuxer@gmail.com</a></td>
											<td class="hidden-480">120</td>
											<td class="hidden-480"></td>
											<td class="center hidden-480">12 Jan 2012</td>
											<td ><span class="label label-success">Approved</span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</section>
				</div>
				<!--/ END Datatable 2 -->
			</div>
			<!--/ END Row -->

		</div>
		<!--Page Content End  -->
	</div>
	<!--/ END Content -->
</section>