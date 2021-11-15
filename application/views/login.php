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
				<form method='post' action='<?php echo $this->config->base_url(); ?>index.html' class='navbar-form navbar-right' role='form'>
					<div class='form-group'>
						<input type='text' name='username' placeholder='Username' class='form-control'>
					</div>
					<div class='form-group'>
						<input type='password' name='password' placeholder='Password' class='form-control'>
					</div>
					<button type='submit' class='btn btn-success'>Sign in</button>
				</form>
			</div>
		</div>
	</div>
