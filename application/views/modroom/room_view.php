<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-home"></i> <b>Manage Rooms</b></div>	
				
				<div class="panel-body">
					<?php echo $this->session->flashdata('pesan');?>
				<?php echo anchor('modroom/addroom', '<i class="glyphicon glyphicon-plus"></i> Add Room',array(
					'class'=>'btn btn-warning'
				));?>
					
					<hr>
					<table class="table table-striped table-hover">
						<tr class="active">
							<th>No.</th>
							<th>Nama Kamar</th>
							<th>Fitur</th>
							<th>Create Date</th>
							<th></th>
						</tr>
						<?php 
							if(empty($query)){
								echo '<tr class="danger"><th colspan="7">Data is Empty.</th></tr>';
							}else{
								if(!$this->uri->segment(3)){
									$no = 0;
								}else{
									$no = $this->uri->segment(3);
								}
								foreach($query as $row):
									$no++;
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row->nama_kamar;?></td>
										<td><?php echo "";?></td>
										<td><?php echo date('d/m/Y H:i:s', strtotime($row->input_date));?></td>
										
										<td>
											<div class="btn-group">
											  	<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											    	<i class="glyphicon glyphicon-list"></i> Tools <span class="caret"></span>
											  	</button>
											  	<ul class="dropdown-menu" role="menu">
											  		
												    <li><?php echo anchor('modroom/edit/'.$row->id,'<i class="glyphicon glyphicon-share-alt"></i> Edit');?></li>
												    <li><?php echo anchor('modroom/delete/'.$row->id,'<i class="glyphicon glyphicon-trash"></i> Delete',array('onclick'=>"return confirm('Are you sure?')"));?></li>
												</ul>
											</div>
										</td>
									</tr>
									<?php
								endforeach;
							}
						?>
					</table>

					<ul class="pagination pagination-large pull-right">
					<?php echo $halaman;?>
					</ul>
				</div>
		</div>
	</div>
</div>