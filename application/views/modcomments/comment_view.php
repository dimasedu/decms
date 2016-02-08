<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-comment"></i> <b>Manage Comment</b></div>	
				
				<div class="panel-body">
					<?php echo $this->session->flashdata('pesan');?>
					
					<hr>
					<table class="table table-striped table-hover">
						<tr class="active">
							<th>No.</th>
							<th>Author</th>
							<th>Comment</th>
							<th>Status</th>
							<th>Talking About</th>
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
										<td><?php echo $row->comment_author;?><br><span class="label label-info"><?php echo $row->comment_email;?></span></td>
										<td><?php echo $row->comment_text;?></td>
										<td>
										<?php 
											if($row->comment_approved == 1){
												echo '<span class="label label-success">Approved</span>';
											}else{
												echo '<span class="label label-danger">Unapproved</span>';
											}
										?></td>
										<td><?php echo $row->post_title;?></td>
										<td><?php echo date('d/m/Y H:i:s', strtotime($row->input_date));?></td>
										
										<td>
											<div class="btn-group">
											  	<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											    	<i class="glyphicon glyphicon-list"></i> Tools <span class="caret"></span>
											  	</button>
											  	<ul class="dropdown-menu" role="menu">
											  		<?php 
														if($row->comment_approved == 0){
															?>
															<li><?php echo anchor('modcomments/approve/'.$row->id,'<i class="glyphicon glyphicon-ok"></i> Approve');?></li>
												    
															<?php
														}
													?>
												    <li><?php echo anchor('modcomments/reply/'.$row->id,'<i class="glyphicon glyphicon-share-alt"></i> Reply');?></li>
												    <li><?php echo anchor('modcomments/delete/'.$row->id,'<i class="glyphicon glyphicon-trash"></i> Delete',array('onclick'=>"return confirm('Are you sure?')"));?></li>
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