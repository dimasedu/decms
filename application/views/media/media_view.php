<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
    		<div class="panel-heading"><i class="glyphicon glyphicon-picture"></i> <b>Data Media</b></div>
    		<div class="panel-body">
				<?php echo $this->session->flashdata('pesan');?>
				<?php echo anchor('adminmedia/addmedia', '<i class="glyphicon glyphicon-plus"></i> Upload File',array(
					'class'=>'btn btn-warning'
				));?>
				<hr>
				<div style="width:1100px; overflow:auto;">
				<table class="table table-striped">
					<tr class="info">
						<th>No.</th>
						<th>File Name</th>
						<th>Type</th>
						<th>File Size</th>
						<th>File Measure</th>
						<th>URL</th>
						<th>Upload Date</th>
						<th></th>
					</tr>
					<?php 
						if(empty($query)){
							echo '<tr class="danger"><th colspan="7">Data is Empty.</th></tr>';
						}else{
							$no = 0;
							foreach($query as $row):
								$no++;
								?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row->media_name;?></td>
									<td><span class="label label-primary"><?php echo $row->media_type;?></span></td>
									<td><span class="label label-warning"><?php echo number_format($row->media_size,0,",",".");?> Kb</span></td>
									<td><span class="label label-success"><?php echo $row->media_measure;?> px</span></td>
									<td><?php echo base_url().'uploads/'.$row->media_name;?></td>
									<td><?php echo date('d/m/Y H:i:s', strtotime($row->input_date));?></td>
									
									<td>
										<?php echo anchor('adminmedia/delete/'.$row->id,'<i class="glyphicon glyphicon-trash"></i> Delete', array('class'=>'btn btn-info btn-sm','onclick'=>"return confirm('Becareful! If you continue this action this file will be permanent delete. Are you sure?')"));?></li>
											
									</td>
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
</div>