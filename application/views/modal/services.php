	<div id="modSave" class="modal fade" hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">Save Service</h4>
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
											<input type='text' class='form-control' id='serviceID' placeholder='ID'/>
										</div>
									</div>
								</div>
								<div class='form-group'>
									<div class='col-sm-12'>
										<div class='input-group'>
											<span class='input-group-addon'>
												<i class='glyphicon glyphicon-tree-deciduous'></i>
											</span>
											<input type='text' class='form-control' id='serviceName' placeholder='Name'/>
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
