<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
		<h3>Edit Profil Pengguna</h3>
		<hr>
	  <div class="well well-sm">
	  	<ul>
	  		<li>Silahkan ini data sesuai dengan yang anda inginkan.</li>
	  	</ul>
	  </div>
	  	<?php echo form_open('user/profil');
	  	?>
	  	<table class="table table-striped">
	  		<tr>
	  			<th>Username</th>
	  			<th>:</th>
	  			<th><?php echo form_input(array('name'=>'username','id'=>'username','value'=>$query->username,'class'=>'form-control', 'readonly'=>'readonly'));?></th>
	  		</tr>
	  		<tr>
	  			<th>Nama Anda</th>
	  			<th>:</th>
	  			<th><?php echo form_input(array('name'=>'nama','id'=>'nama','class'=>'form-control', 'required'=>'required'));?></th>
	  		</tr>
	  		<tr>
	  			<th>Password Baru</th>
	  			<th>:</th>
	  			<th><?php echo form_input(array('name'=>'password','id'=>'password','class'=>'form-control', 'required'=>'required'));?></th>
	  		</tr>
	  		<tr>
	  			<th>Password Lagi</th>
	  			<th>:</th>
	  			<th><?php echo form_input(array('name'=>'passlagi','id'=>'passlagi','class'=>'form-control', 'required'=>'required'));?></th>
	  		</tr>
	  		<tr>
	  			<th>&nbsp;</th>
	  			<th>&nbsp;</th>
	  			<th><?php echo form_submit(array('name'=>'submit','id'=>'submit','value'=>'Update Data','class'=>'btn btn-success'));?>
	  			<?php echo anchor('depan', 'Batal',array('class'=>'btn btn-danger'));?>
	  			</th>
	  		</tr>
	  	</table>
	  				
	  	<?php echo form_close();?>
	  
		</div>
	</div>
</div>