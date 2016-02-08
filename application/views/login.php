<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $this->config->item('app_name');?> - <?php echo $this->config->item('app_version');?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<nav class="navbar navbar-inverse" role="navigation">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#"><i class="glyphicon glyphicon-book"></i> <?php echo $this->config->item('app_name');?></a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li class="active"><a href="#"><?php echo date('d F Y')?></a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	    </nav>
	    <div class="container">
	    	<div class="row">
		    	<div class="col-lg-12 col-sm-12 col-xs-12">
		    		<?php echo form_open('auth/login');?>
		    		<fieldset>
		    			<legend>Form Login</legend>
		    		</fieldset>
		    		<?php echo validation_errors();?>
		    		<?php echo $this->session->flashdata('pesan');?>
		    		<label>Username</label>		    		
		    		<?php echo form_input(array(
		    			'name'=>'username',
		    			'id'=>'username',
		    			'placeholder'=>'Masukkan Username',
		    			'class'=>'form-control input-lg',
		    			'autofocus'=>'autofocus',
		    			'autocomplete'=>'off'
		    		));?><br>
		    		<label>Password</label>		    		
		    		<?php echo form_password(array(
		    			'name'=>'password',
		    			'id'=>'password',
		    			'placeholder'=>'Masukkan Password',
		    			'class'=>'form-control input-lg',
		    			'autocomplete'=>'off'
		    		));?>
		    		<br>
		    		<?php
		    		echo form_submit(array(
		    			'name'=>'submit',
		    			'value'=>'Login',
		    			'class'=>'btn btn-success btn-lg'
		    			));
		    		?>
		    		<?php
		    		echo form_reset(array(
		    			'name'=>'reset',
		    			'value'=>'Ulangi',
		    			'class'=>'btn btn-danger btn-lg'
		    			));
		    		?>
		    		<?php echo form_close();?>
		    	<hr>
		    	<footer>
		    		<p><?php echo $this->config->item('app_name');?> webbased application &copy; 2015<br>
		    		Powered by <b><?php echo anchor('http://desoftware.web.id','DE SOFTWARE TEGAL', array('target'=>'_blank'));?></b></p>
	    			<small>Page rendered in <strong>{elapsed_time}</strong> seconds</small>
	    		</footer>
		    	</div>
	    	</div>
	    </div>
	    
	</body>
</html>