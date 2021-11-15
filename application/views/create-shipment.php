	<div class='container'>
		<div class='row'>
			<form class='form-horizontal' role='form'>
				<div class='space'></div>
				<h2 class='h2'>
					<i class='glyphicon glyphicon-th'></i>
					Create Shipment
				</h2>
				<hr class='hr hr-dotted' />
				<div class='form-group'>
					<div class='col-sm-3'>
						<label class='control-label'>Date</label>
						<div class='input-group'>
							<span class='input-group-addon'>
								<i class='glyphicon glyphicon-calendar'></i>
							</span>
							<input type='text' class='form-control' id='shipmentDate' placeholder='yyyy-mm-dd'/>
						</div>
					</div>
					<div class='col-sm-5'></div>
					<div class='col-sm-4'>
						<label class='control-label'>Customer</label>
						<div class='input-group'>
							<span class='input-group-addon'>
								<i class='glyphicon glyphicon-user'></i>
							</span>
							<input type='text' class='form-control' id='shipmentCustomer' placeholder='Customer'/>
						</div>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-12'>
						<label class='control-label'>Description</label>
						<textarea class='form-control' rows='2' id='shipmentDescription' placeholder='Enter description here'></textarea>
					</div>
				</div>
				<div class='row'>
					<div class='col-sm-6'>
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
											<input type='text' class='form-control' id='shipmentOrigin' placeholder='Origin'/>
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
											<input type='text' class='form-control' id='shipmentOriginCompany' placeholder='Company'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-home'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginAddress' placeholder='Address'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-road'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginCity' placeholder='City'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginProvince' placeholder='Province'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginCountry' placeholder='Country'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-asterisk'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginZip' placeholder='Zip/Postal'/>
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
											<input type='text' class='form-control' id='shipmentOriginContact' placeholder='Contact Name'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-earphone'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginPhone' placeholder='Phone'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-envelope'></i>
											</span>
											<input type='text' class='form-control' id='shipmentOriginEmail' placeholder='E-mail'/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class='col-sm-6'>
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
											<input type='text' class='form-control' id='shipmentDestination' placeholder='Destination'/>
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
											<input type='text' class='form-control' id='shipmentDestinationCompany' placeholder='Company'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-home'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationAddress' placeholder='Address'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-road'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationCity' placeholder='City'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationProvince' placeholder='Province'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-globe'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationCountry' placeholder='Country'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-asterisk'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationZip' placeholder='Zip/Postal'/>
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
											<input type='text' class='form-control' id='shipmentDestinationContact' placeholder='Contact Name'/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-earphone'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationPhone' placeholder='Phone'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-envelope'></i>
											</span>
											<input type='text' class='form-control' id='shipmentDestinationEmail' placeholder='E-mail'/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='form-group'>
					<div class='col-sm-3'>
						<label class='control-label'>Service</label>
						<div class='input-group'>
							<span class='input-group-addon'>
								<i class='glyphicon glyphicon-cog'></i>
							</span>
							<input type='text' class='form-control' id='shipmentService' placeholder='service'/>
						</div>
					</div>
				</div>
				<div class='panel panel-default'>
					<div class='panel-body'>
						<div class='row'>
							<div class='col-sm-3'>
								<label class='control-label'>Item Description</label>
								<div class='input-group'>
									<span class='input-group-addon'>
										<i class='glyphicon glyphicon-star'></i>
									</span>
									<input type='text' class='form-control' id='shipmentItem' placeholder='Item Description'/>
								</div>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>Qty</label>
								<input type='text' class='form-control' id='shipmentItemQuantity'/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>L (cm)</label>
								<input type='text' class='form-control' id='shipmentItemLength'/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>W (cm)</label>
								<input type='text' class='form-control' id='shipmentItemWidth'/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>H (cm)</label>
								<input type='text' class='form-control' id='shipmentItemHeight'/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>A.W.</label>
								<input type='text' class='form-control' id='shipmentItemWeight'/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>V.W.</label>
								<input type='text' class='form-control' id='shipmentItemVolumeWeight' readonly/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>C.W.</label>
								<input type='text' class='form-control' id='shipmentItemChargeable' readonly/>
							</div>
							<div class='col-sm-1'>
								<label class='control-label'>V (cm<sup>3</sup>)</label>
								<input type='text' class='form-control' id='shipmentItemVolume' readonly/>
							</div>
							<div class='col-sm-1 text-right'>
								<label class='control-label'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
								<a id="bAddItems" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
				<table id="contoh" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Item Description</th>
							<th>L (cm)</th>
							<th>W (cm)</th>
							<th>H (cm)</th>
							<th>A.W.</th>
							<th>V.W.</th>
							<th>C.W.</th>
							<th>V (cm<sup>3</sup></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Item Description</th>
							<th>L (cm)</th>
							<th>W (cm)</th>
							<th>H (cm)</th>
							<th>A.W.</th>
							<th>V.W.</th>
							<th>C.W.</th>
							<th>V (cm<sup>3</sup></th>
						</tr>
					</tfoot>
				</table>
				<div class='form-group'>
					<div class='col-sm-10'>
						<label class='control-label'>Note</label>
						<div class='input-group'>
							<span class='input-group-addon'>
								<i class='glyphicon glyphicon-pushpin'></i>
							</span>
							<input type='text' class='form-control' id='shipmentNote' placeholder='Note here'/>
						</div>
					</div>
					<div class='col-sm-2 text-right'>
						<label class='control-label'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<a id="bSave" class="btn btn-success form-control"><i class="glyphicon glyphicon-ok small icon-white"></i> Submit</a>
					</div>
				</div>
			</form>
		</div>
	</div>
