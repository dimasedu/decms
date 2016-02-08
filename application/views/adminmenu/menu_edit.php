<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> <b>Edit Menu</b></div>
				<div class="panel-body">
				<?php echo form_open('adminmenu/edit/'.$this->uri->segment(3));?>
			
				<table class="table table-condensed">
					<tr class="active">
						<th width="15%">Menu Name</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'title',
							'id'=>'title',
							'class'=>'form-control input-sm',
							'value'=>$query->head_name,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>


					<tr class="active">
						<th width="15%">Make Default</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php 
						if($query->default_menu == 0){
							$pil = FALSE;
						}else{
							$pil = TRUE;
						}

						echo form_checkbox(array(
							'name'=>'menudefault',
							'id'=>'menudefault',
							'value'=>1,
							'checked'=>$pil
						));?> Yes
						</td>
					</tr>

					</table>
					<hr>
					<?php
						echo anchor('adminmenu/adddetail/'.$query->id,'<i class="glyphicon glyphicon-plus"></i> Add Menu',array(
							'class'=>'btn btn-danger btn-sm'
							));
						?>
					<hr>
					<table class="table table-condensed">
					<tr class="success">
						<th>Display Name</th>
						<th>URL</th>
						<th>Order Number</th>
						<th></th>
					</tr>

					<?php 
						if(!empty($detail)){
							foreach($detail as $row):
								echo form_hidden('menuid[]',$row->id);
								?>
								<tr class="active">
									<td><?php echo $row->menu_name;?></td>
									<td><?php 
										if($row->menu_type == "link"){
											echo $row->menu_link;

										}else{
											echo site_url().'/'.$row->menu_link;
										}
									?></td>
									<td><?php echo form_input(array('value'=>$row->menu_order,'name'=>'menuorder[]','class'=>'form-control input-sm', 'style'=>'width:50px;'));?></td>
									<td>
									<?php echo anchor('adminmenu/deletedetail/'.$query->id.'/'.$row->id,'Delete', array(
										'class'=>'btn btn-sm btn-danger'
									));?>
									</td>
								</tr>
								<?php
								$this->decmslib->menu_child($row->id);
							endforeach;
						}
					?>

					</table>	
					<table class="table table-condensed">
					<tr>
						<th colespan="3">
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
