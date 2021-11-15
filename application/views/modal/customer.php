	<div id="modSave" class="modal fade" hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Save Customer</h4>
				</div>
				<div class="modal-body">
					<form class='form-horizontal' role='form'>
						<div class='row'>
							<div class='col-sm-12'>
								<div class='form-group' style='display: none;'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-star'></i>
											</span>
											<input type='text' class='form-control' id='customerID' placeholder='ID'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='customerName' placeholder='Name'/>
										</div>
									</div>
								</div>
								<label class='control-label gray'>Address</label>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-home'></i>
											</span>
											<input type='text' class='form-control' id='customerAddress' placeholder='Address'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-road'></i>
											</span>
											<input type='text' class='form-control' id='customerCity' placeholder='City'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='customerProvince' placeholder='Province'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='customerCountry' placeholder='Country'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-asterisk'></i>
											</span>
											<input type='text' class='form-control' id='customerZip' placeholder='Zip/Postal'/>
										</div>
									</div>
								</div>
								<label class='control-label gray'>Contact Details</label>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-user'></i>
											</span>
											<input type='text' class='form-control' id='customerContact' placeholder='Contact Name'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-earphone'></i>
											</span>
											<input type='text' class='form-control' id='customerPhone' placeholder='Phone'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-envelope'></i>
											</span>
											<input type='text' class='form-control' id='customerEmail' placeholder='E-mail'/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="bSubmitSave" type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
