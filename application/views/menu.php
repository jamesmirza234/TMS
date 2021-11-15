	<div class='navbar navbar-default navbar-fixed-top' role='navigation'>
		<div class='container'>
			<div class='navbar-header'>
				<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='.navbar-collapse'>
					<span class='sr-only'>Toggle navigation</span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</button>
				<a class='navbar-brand' href='#'>Parsel</a>
			</div>
			<div class='navbar-collapse collapse'>
				<ul class='nav navbar-nav'>
					<li><a href='<?php echo $this->config->base_url(); ?>dashboard2.html'>Home</a></li>
					<li class='dropdown'>
						<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Shipment<span class='caret'></span></a>
						<ul class='dropdown-menu' role='menu'>
							<li><a href='<?php echo $this->config->base_url(); ?>create-shipment.html'>Create</a></li>
							<li><a href='<?php echo $this->config->base_url(); ?>view-shipment.html'>View</a></li>
						</ul>
					</li>
					<li class='dropdown'>
						<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Master<span class='caret'></span></a>
						<ul class='dropdown-menu' role='menu'>
<?php
	if ($this->session->userdata('level') < 2) {
?>
							<li><a href='<?php echo $this->config->base_url(); ?>customer.html'>Customer</a></li>
							<li><a href='<?php echo $this->config->base_url(); ?>services.html'>Services</a></li>
							<li><a href='<?php echo $this->config->base_url(); ?>status2.html'>Status</a></li>
<?php
	}
?>
							<li><a href='<?php echo $this->config->base_url(); ?>contact.html'>Contact</a></li>
							<li><a href='<?php echo $this->config->base_url(); ?>items.html'>Items</a></li>
						</ul>
					</li>
<?php
	if ($this->session->userdata('level') < 2) {
?>
					<li class='dropdown'>
						<a class='dropdown-toggle' data-toggle='dropdown' href='#'>Tools<span class='caret'></span></a>
						<ul class='dropdown-menu' role='menu'>
<?php
	if ($this->session->userdata('level') < 1) {
?>
							<li><a href='<?php echo $this->config->base_url(); ?>perusahaan.html'>Company</a></li>
<?php
	}
?>
							<li><a href='<?php echo $this->config->base_url(); ?>mobile-user.html'>Mobile Users</a></li>
							<li><a href='<?php echo $this->config->base_url(); ?>feedback.html'>Feedback</a></li>
						</ul>
					</li>
<?php
	}
?>
				</ul>
				<ul class='nav navbar-nav navbar-right'>

				<li class='dropdown'>
					<a data-toggle='dropdown' class='dropdown-toggle navbar-user' href='javascript:;'>
						<span class='hidden-xs'><?php echo $this->session->userdata('username') ?></span>
						<b class='caret'></b>
					</a>
					<ul class='dropdown-menu pull-right-xs'>
						<li><a href='#' id='bChangePasswd'>Change Password</a></li>
						<li class="divider"></li>
						<li><a href='<?php echo $this->config->base_url(); ?>logout.html'>Logout</a></li>
					</ul>
				</li>
				</ul>
			</div>
		</div>
	</div>
