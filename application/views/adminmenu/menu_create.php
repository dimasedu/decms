<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> <b>Create New Menu</b></div>
				<div class="panel-body">
				<?php echo form_open('adminmenu/create');?>
			
				<table class="table">
					<tr>
						<th width="15%">Name</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('title');?>
						<?php echo form_input(array(
							'name'=>'title',
							'id'=>'title',
							'class'=>'form-control input-sm',
							'value'=>set_value('title'),
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save Menu
						</button>
						<?php
							echo anchor('adminmenu','<i class="glyphicon glyphicon-backward"></i> Back',array(
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
</div>
