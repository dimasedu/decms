<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> <b>Categories</b></div>	
				
				<div class="panel-body">
					<?php echo $this->session->flashdata('pesan');?>
					<?php echo anchor('admincategory/addcategory', '<i class="glyphicon glyphicon-plus"></i> Add New',array(
						'class'=>'btn btn-warning'
					));?>
					<hr>
					<table class="table table-striped table-hover">
						<tr class="active">
							<th>Name</th>
							<th>Slug</th>
							<th></th>
						</tr>
						<?php 
							if(empty($query)){
								echo '<tr class="danger"><th colspan="6">Data is Empty.</th></tr>';
							}else{
								
								foreach($query as $row):
									

									
								
									?>
									<tr>
                                        <th><?php echo $row->category_name;?></th>
                                        <th><?php echo $row->slug;?></th>
                                        
                                        <th>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="glyphicon glyphicon-list"></i> Tools <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><?php echo anchor('admincategory/edit/'.$row->id,'<i class="glyphicon glyphicon-pencil"></i> Edit');?></li>
                                                    <li><?php echo anchor('admincategory/delete/'.$row->id,'<i class="glyphicon glyphicon-trash"></i> Delete',array('onclick'=>"return confirm('Are you sure?')"));?></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
									<?php
									
									$child = $this->category->show_child($row->id);

									if(!empty($child)){

										foreach($child as $rowchild):
											?>
											<tr>
												<td><?php echo '&#8212; '.$rowchild->category_name;?></td>
												<td><?php echo $rowchild->slug;?></td>
												
												<td>
													<div class="btn-group">
													  	<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
													    	<i class="glyphicon glyphicon-list"></i> Tools <span class="caret"></span>
													  	</button>
													  	<ul class="dropdown-menu" role="menu">
														    <li><?php echo anchor('admincategory/edit/'.$rowchild->id,'<i class="glyphicon glyphicon-pencil"></i> Edit');?></li>
														    <li><?php echo anchor('admincategory/delete/'.$rowchild->id,'<i class="glyphicon glyphicon-trash"></i> Delete',array('onclick'=>"return confirm('Are you sure?')"));?></li>
														</ul>
													</div>
												</td>
											</tr>
											<?php
										endforeach;
									}
								

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