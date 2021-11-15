	<div class='container'>
		<div class='row'>
			<form class='form-horizontal' role='form'>
				<div class='space'></div>
				<h2 class='h2'>
					<i class='glyphicon glyphicon-th'></i>
					Dashboard
				</h2>
				<hr class='hr hr-dotted' />
				<div class="panel panel-default">
					<div class="panel-body">
						<div class='row'>
							<div class='col-sm-2'>
								<div class='input-group'>
									<span class='input-group-addon'>
										<i class='glyphicon glyphicon-calendar'></i>
									</span>
									<input type='text' class='form-control' id='historyDate1' placeholder='yyyy-mm-dd'/>
								</div>
							</div>
							<div class='col-sm-2'>
								<div class='input-group'>
									<span class='input-group-addon'>
										<i class='glyphicon glyphicon-calendar'></i>
									</span>
									<input type='text' class='form-control' id='historyDate2' placeholder='yyyy-mm-dd'/>
								</div>
							</div>
							<div class='col-sm-2'>
								<a id="bSent" class="btn btn-danger form-control">Sent [<span id='tSent'>0</span>]</a>
							</div>
							<div class='col-sm-2'>
								<a id="bIntransit" class="btn btn-info form-control">In Transit [<span id='tIntransit'>0</span>]</a>
							</div>
							<div class='col-sm-2'>
								<a id="bDelivered" class="btn btn-success form-control">Delivered [<span id='tDelivered'>0</span>]</a>
							</div>
						</div>
					</div>
				</div>
				<table id="contoh" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
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
			</form>
		</div>
	</div>
