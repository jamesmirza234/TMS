	<div class='container'>
		<div class='row'>
			<form class='form-horizontal' role='form'>
				<div class='space'></div>
				<h2 class='h2'>
					<i class='glyphicon glyphicon-th'></i>
					View Shipment
				</h2>
				<hr class='hr hr-dotted' />
				<div class="panel panel-default">
					<div class="panel-body">
						<a id="bEdit" class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i> Update</a>
						<a id="bExport" class="btn btn-success"><i class="glyphicon glyphicon-download icon-white"></i> Export</a>
						<a id="bLabel" class="btn btn-info"><i class="glyphicon glyphicon-tag icon-white"></i> Label</a>
						<a id="bAWB" class="btn btn-warning"><i class="glyphicon glyphicon-barcode icon-white"></i> AWB</a>
						<a id="bPOD" class="btn btn-success"><i class="glyphicon glyphicon-camera icon-white"></i> POD</a>
					</div>
				</div>
				<table id="contoh" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Customer</th>
							<th>Shipment</th>
							<th>Description</th>
							<th>Status</th>
							<th>Origin</th>
							<th>Now At</th>
							<th>Destination</th>
							<th>Collie</th>
							<th>Weight</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Customer</th>
							<th>Shipment</th>
							<th>Description</th>
							<th>Status</th>
							<th>Origin</th>
							<th>Now At</th>
							<th>Destination</th>
							<th>Collie</th>
							<th>Weight</th>
						</tr>
					</tfoot>
				</table>
				<hr class='hr hr-dotted' />
				<div class='row'>
					<div class='col-sm-4'>
						<div class='panel panel-success'>
							<div class='panel-heading'>
								<h3 class='panel-title'>
									<i class='glyphicon glyphicon-log-out'></i>
									&nbsp;Origin
								</h3>
							</div>
							<div class='panel-body'>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOrigin' placeholder='Origin' readonly/>
										</div>
									</div>
								</div>
								<label class='control-label gray'>Address</label>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-off'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginCompany' placeholder='Company' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-home'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginAddress' placeholder='Address' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-road'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginCity' placeholder='City' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginProvince' placeholder='Province' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginCountry' placeholder='Country' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-asterisk'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginZip' placeholder='Zip/Postal' readonly/>
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
											<input type='text' class='form-control' id='shipmentOriginContact' placeholder='Contact Name' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-earphone'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginPhone' placeholder='Phone' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-envelope'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginEmail' placeholder='E-mail' readonly/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<div class='panel panel-info'>
							<div class='panel-heading'>
								<h3 class='panel-title'>
									<i class='glyphicon glyphicon-log-in'></i>
									&nbsp;Destination
								</h3>
							</div>
							<div class='panel-body'>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestination' placeholder='Destination' readonly/>
										</div>
									</div>
								</div>
								<label class='control-label gray'>Address</label>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-off'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationCompany' placeholder='Company' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-home'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationAddress' placeholder='Address' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-road'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationCity' placeholder='City' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationProvince' placeholder='Province' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationCountry' placeholder='Country' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-asterisk'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationZip' placeholder='Zip/Postal' readonly/>
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
											<input type='text' class='form-control' id='shipmentDestinationContact' placeholder='Contact Name' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-earphone'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationPhone' placeholder='Phone' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-envelope'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationEmail' placeholder='E-mail' readonly/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
						<table id="parcel" class="display" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Item #</th>
									<th>Description</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Item #</th>
									<th>Description</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</form>
		</div>
	</div>
