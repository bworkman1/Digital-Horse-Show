<?php
	$error = $this->session->flashdata('error');
	$success = $this->session->flashdata('success');

	if($error) {
		echo '<div class="alert alert-danger auto-dismiss alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			echo '<i class="fa fa-times-circle fa-fw fa-2x pull-left"></i>';
			echo '<p><b>Error: </b>'.$error.'</p>';
		echo '</div>';
	}

	if($success) {
		echo '<div class="alert alert-success auto-dismiss alert-dismissible">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			echo '<i class="fa fa-check-circle fa-fw fa-2x pull-left"></i>';
			echo '<b>Success: </b>'.$success;
		echo '</div>';
	}
	
?>