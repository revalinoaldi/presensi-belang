<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default card-view">
			<div class="panel-heading">
				<div class="pull-left">
					<h6 class="panel-title txt-dark">Profile</h6>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="table-wrap">
						<table id="footable_2" class="table" data-paging="true" data-filtering="true" data-sorting="true">
							<thead>
								<tr>
									<th data-name="id" data-breakpoints="xs" data-type="number">ID</th>
									<th data-name="firstName">First Name</th>
									<th data-name="lastName">Last Name</th>
									<th data-name="jobTitle" data-breakpoints="xs">Job Title</th>
									<th data-name="startedOn" data-breakpoints="xs sm" data-type="date" data-format-string="MMMM Do YYYY">Started On</th>
									<th data-name="dob" data-breakpoints="xs sm md" data-type="date" data-format-string="MMMM Do YYYY">Date of Birth</th>
								</tr>
							</thead>
							<tbody>
								<tr data-expanded="true">
									<td>1</td>
									<td>Dennise</td>
									<td>Fuhrman</td>
									<td>High School History Teacher</td>
									<td>November 8th 2011</td>
									<td>July 25th 1960</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Elodia</td>
									<td>Weisz</td>
									<td>Wallpaperer Helper</td>
									<td>October 15th 2010</td>
									<td>March 30th 1982</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Raeann</td>
									<td>Haner</td>
									<td>Internal Medicine Nurse Practitioner</td>
									<td>November 28th 2013</td>
									<td>February 26th 1966</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Junie</td>
									<td>Landa</td>
									<td>Offbearer</td>
									<td>October 31st 2010</td>
									<td>March 29th 1966</td>
								</tr>
								<tr>
									<td>5</td>
									<td>Solomon</td>
									<td>Bittinger</td>
									<td>Roller Skater</td>
									<td>December 29th 2011</td>
									<td>September 22nd 1964</td>
								</tr>
								<tr>
									<td>6</td>
									<td>Bar</td>
									<td>Lewis</td>
									<td>Clown</td>
									<td>November 12th 2012</td>
									<td>August 4th 1991</td>
								</tr>
								<tr>
									<td>7</td>
									<td>Usha</td>
									<td>Leak</td>
									<td>Ships Electronic Warfare Officer</td>
									<td>August 14th 2012</td>
									<td>November 20th 1979</td>
								</tr>
								<tr>
									<td>8</td>
									<td>Lorriane</td>
									<td>Cooke</td>
									<td>Technical Services Librarian</td>
									<td>September 21st 2010</td>
									<td>April 7th 1969</td>
								</tr>
								<tr>
									<td>9</td>
									<td>Nelly</td>
									<td>Lusher</td>
									<td>Broadcast Maintenance Engineer</td>
									<td>October 21st 2013</td>
									<td>February 16th 1983</td>
								</tr>
							</tbody>
						</table>

						<!--Editor-->
						<div class="modal fade" id="editor-modal" tabindex="-1" role="dialog" aria-labelledby="editor-title">
							
							<div class="modal-dialog" role="document">
								<form class="modal-content form-horizontal" id="editor">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
										<h5 class="modal-title" id="editor-title">Add Row</h5>
									</div>
									<div class="modal-body">
										<input type="number" id="id" name="id" class="hidden"/>
										<div class="form-group required">
											<label for="firstName" class="col-sm-3 control-label">First Name</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
											</div>
										</div>
										<div class="form-group required">
											<label for="lastName" class="col-sm-3 control-label">Last Name</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
											</div>
										</div>
										<div class="form-group">
											<label for="jobTitle" class="col-sm-3 control-label">Job Title</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Job Title">
											</div>
										</div>
										<div class="form-group required">
											<label for="startedOn" class="col-sm-3 control-label">Started On</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="startedOn" name="startedOn" placeholder="Started On" required>
											</div>
										</div>
										<div class="form-group">
											<label for="dob" class="col-sm-3 control-label">Date of Birth</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Save changes</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									</div>
								</form>
							</div>
						</div>
						<!--/Editor-->
						
					</div>
				</div>
			</div>
		</div>
	</div>
					<!-- /Row -->