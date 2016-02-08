<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading"><i class="glyphicon glyphicon-picture"></i> <b>Upload Media</b></div>
		<div class="panel-body">
			<?php echo form_open_multipart('adminmedia/uploadmedia');?>
			<?php echo $this->session->flashdata('pesan');?>
			<?php echo $error;?>	
				<table class="table">
					<tr>
						<th width="15%">Please Select File</th>
						<th width="1%">:</th>
						<td width="45%">
						
						<?php echo form_input(array(
							'name'=>'filename',
							'id'=>'filename',
							'class'=>'form-control',
							'value'=>set_value('filename'),
							'type'=>'file'
						));?></td>
					</tr>

					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-primary">
							<i class="glyphicon glyphicon-saved"></i> Upload Media
						</button>
						<?php
							echo anchor('adminmedia','<i class="glyphicon glyphicon-backward"></i> Back',array(
								'class'=>'btn btn-warning'
								));
						?>
						</th>
					</tr>
				</table>
			<?php echo form_close();?>
		</div>	
	</div>
</div>
	    