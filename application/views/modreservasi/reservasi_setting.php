<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> <b>Reservasi Setting</b></div>
				<div class="panel-body">
				<?php echo form_open('modreservasi/index/');?>
				<?php echo $this->session->flashdata('pesan');?>
				<hr>
				<?php echo anchor('modreservasi/daftar','<i class="glyphicon glyphicon-list"></i> Lihat Daftar',array('target'=>'_blank','class'=>'btn btn-warning btn-sm'));?>
				<?php //echo anchor('modreservasi/cetak','<i class="glyphicon glyphicon-print"></i> Cetak Reservasi',array('target'=>'_blank','class'=>'btn btn-primary btn-sm'));?>
				<br><br>
				
				<table class="table">
					<tr>
						<th width="15%">Admin Email</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('emailadmin');?>
						<?php echo form_input(array(
							'name'=>'adminemail',
							'id'=>'adminemail',
							'class'=>'form-control input-sm',
							'value'=>$query->email_admin,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Enabled</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php 
							if($query->enabled == 1){
								$pil = TRUE;
							}else{
								$pil = FALSE;
							}
							
							echo form_checkbox(array(
							'name'=>'enabled',
							'id'=>'enabled',
							'value'=>1,
							'checked'=>$pil
						));?> <span class="label label-primary">Yes It is!</span>
						</td>
					</tr>
					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save Setting
						</button>
						
						</th>
					</tr>
				</table>
			<?php echo form_close();?>
			</div>
		</div>	
	</div>
</div>
