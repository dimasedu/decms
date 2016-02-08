<table class="table table-striped">
	<tr class="info">
		<th>No.</th>
		<th>File Name</th>
		<th>Type</th>
		<th>File Size</th>
		<th>File Measure</th>
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
					<td><?php echo $row->media_type;?></td>
					<td><?php echo number_format($row->media_size,0,",",".");?> Kb</td>
					<td><?php echo $row->media_measure;?> px</td>
					
					<td>
						<a href="#" onclick="getfeatimage('<?php echo $row->media_name;?>')" class="btn btn-primary btn-sm">Get It!</a>	
					</td>
				</tr>
				<?php
			endforeach;
		}
	?>
</table>