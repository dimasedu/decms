    <div class="container">
	    	<div class="row">
	    		<div class="col-lg-12 col-sm-12 col-xs-12">
	    			<?php echo form_open('pengguna/tambah');?>
	    				<h4>Tambah Pengguna</h4>
	    				<hr>
	    				<table class="table">
	    					<tr>
	    						<th>Username</th>
	    						<th>:</th>
	    						<td>
	    						<?php echo form_error('username');?>
	    						<?php echo form_input(array(
	    							'name'=>'username',
	    							'id'=>'username',
	    							'class'=>'form-control',
	    							'value'=>set_value('username'),
	    							'autofocus'=>'autofocus'
	    						));?></td>
	    					</tr>
	    					<tr>
	    						<th>Password</th>
	    						<th>:</th>
	    						<td>
	    						<?php echo form_error('password');?>
	    						<?php echo form_input(array(
	    							'name'=>'password',
	    							'id'=>'password',
	    							'class'=>'form-control',
	    							'value'=>set_value('password')
	    						));?></td>
	    					</tr>
	    					
	    					<tr>
	    						<th>Nama Asli</th>
	    						<th>:</th>
	    						<td>
	    						<?php echo form_error('nama');?>
	    						<?php echo form_input(array(
	    							'name'=>'nama',
	    							'id'=>'nama',
	    							'class'=>'form-control',
	    							'value'=>set_value('nama')
	    						));?></td>
	    					</tr>
	    					<tr>
	    						<th>Role</th>
	    						<th>:</th>
	    						<td>
	    						<select name="role" class="form-control">
	    						<?php
	    							$role = array(
	    								'admin'=>'Administrator',
	    								'staff'=>'Staff / Operator'
	    								);
	    							foreach($role as $row=>$value):
	    								echo '<option value="'.$row.'">'.$value.'</option>';
	    								endforeach;
	    						?>
	    						</select>
	    						</td>
	    					</tr>
	    					<tr>
	    						<th>Aktif</th>
	    						<th>:</th>
	    						<td>
	    						<?php echo form_checkbox('aktif',1,TRUE);?> <span class="label label-primary">Ya</span></td>
	    					</tr>
	    					<tr>
	    						<th colspan="3"><?php
	    							echo form_submit(array(
	    							'name'=>'submit',
	    							'value'=>'Simpan Data',
	    							'class'=>'btn btn-success'));		
	    						?>
	    						<?php
	    							echo anchor('pengguna','<i class="glyphicon glyphicon-backward"></i> Kembali',array(
	    								'class'=>'btn btn-danger'
	    								));
	    						?>
	    						</th>
	    					</tr>
	    				</table>
	    			<?php echo form_close();?>
	    		</div>
	    	</div>
	    