	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/inc/jquery-1.10.2.min.js'></script>
	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/inc/bootstrap.min.js'></script>
	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/inc/jquery.dataTables.min.js'></script>
	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/inc/jquery-ui.min.js'></script>
	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/inc/jquery.noty.packaged.min.js'></script>
<?php
$scripts = isset ($scripts) ? $scripts : array();

foreach ($scripts as &$value) {
?>
	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/<?php echo $value; ?>'></script>
<?php
}
?>
<?php
if ($this->session->userdata('logged_in')) {
	$this->load->view('modal/change-password');
?>
	<script src='<?php echo $this->config->base_url(); ?>wp-content/js/general.js'></script>
<?php
}
?>
</body>
</html>
