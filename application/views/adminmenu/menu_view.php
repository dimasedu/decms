<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i> <b>Manage Menu</b></div>	
				
				<div class="panel-body">
					<?php echo $this->session->flashdata('pesan');?>
					<?php echo anchor('adminmenu/create', '<i class="glyphicon glyphicon-plus"></i> Create Menu',array(
						'class'=>'btn btn-warning'
					));?>
					<hr>
					<table class="table table-striped table-hover">
						<tr class="active">
							<th>No.</th>
							<th>Menu Name</th>
							<th>Default</th>
							<th>Create Date</th>
							<th></th>
						</tr>
						<?php 
							if(empty($head)){
								echo '<tr class="danger"><th colspan="7">Data is Empty.</th></tr>';
							}else{
								if(!$this->uri->segment(3)){
									$no = 0;
								}else{
									$no = $this->uri->segment(3);
								}
								foreach($head as $row):
									$no++;
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo anchor('adminmenu/edit/'.$row->id,$row->head_name);?></td>
										<td>
										<?php 
											if($row->default_menu == 1){
												echo '<span class="label label-success">Yes</span>';
											}else{
												echo '';
											}
										?></td>
										<td><?php echo date('d/m/Y H:i:s', strtotime($row->input_date));?></td>
									</tr>
									<?php
								endforeach;
							}
						?>
					</table>
				</div>
		</div>
	</div>
</div>