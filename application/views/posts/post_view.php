<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> <b>Manage Post</b></div>	
				
				<div class="panel-body">
					<?php echo $this->session->flashdata('pesan');?>
					<?php echo anchor('adminpost/addpost', '<i class="glyphicon glyphicon-plus"></i> Add New',array(
						'class'=>'btn btn-warning'
					));?>
					<hr>
					<table class="table table-striped table-hover">
						<tr class="active">
							<th>No.</th>
							<th>Title</th>
							<th>Categories</th>
							<th>Create Date</th>
							<th></th>
						</tr>
						<?php 
							if(empty($query)){
								echo '<tr class="danger"><th colspan="6">Data is Empty.</th></tr>';
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
										<td><?php echo $row->post_title;?></td>
										<td><?php echo $row->category_name;?></td>
										<td><?php echo date('d/m/Y H:i:s');?></td>
										
										<td>
											<div class="btn-group">
											  	<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											    	<i class="glyphicon glyphicon-list"></i> Tools <span class="caret"></span>
											  	</button>
											  	<ul class="dropdown-menu" role="menu">
												    <li><?php echo anchor('adminpost/edit/'.$row->id,'<i class="glyphicon glyphicon-pencil"></i> Edit');?></li>
												    <li><?php echo anchor('adminpost/delete/'.$row->id,'<i class="glyphicon glyphicon-trash"></i> Delete',array('onclick'=>"return confirm('Are you sure?')"));?></li>
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