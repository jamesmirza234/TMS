	<div id="modSave" class="modal fade" hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Save Mobile User</h4>
				</div>
				<div class="modal-body">
					<form class='form-horizontal' role='form'>
						<div class='row'>
							<div class='col-sm-12'>
								<label class='control-label gray'>User info</label>
								<div class='form-group' style='display: none;'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-star'></i>
											</span>
											<input type='text' class='form-control' id='mobileID' placeholder='ID'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileUsername' placeholder='Username' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileActive' placeholder='Active' readonly/>
										</div>
									</div>
								</div>
								<label class='control-label gray'>Mobile info</label>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileName' placeholder='Name' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileImei' placeholder='IMEI' readonly/>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileHp' placeholder='Mobile Phone' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-4'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileKey' placeholder='Key' readonly/>
										</div>
									</div>
									<div class='col-sm-8'>
										<button id="bGenerate" type="button" class="btn btn-primary">Generate</button>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-4'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileLat' placeholder='Latitude' readonly/>
										</div>
									</div>
									<div class='col-sm-4'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileLon' placeholder='Longitude' readonly/>
										</div>
									</div>
									<div class='col-sm-4'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='mobileAcc' placeholder='Accuracy' readonly/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-6'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<select class="form-control" id="mobileLevel" placeholder='Level'>
												<option value="1">AO</option>
												<option value="2">TO</option>
												<option value="3">SO</option>
											</select>
										</div>
									</div>
									<div class='col-sm-6'>
										<div class='input-group'>
											<label class="checkbox-inline"><input type="checkbox" id='mobileConnect'>Connect</label>
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
