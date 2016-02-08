<script type="text/javascript">
	$(document).ready(function(){

		$('#title').blur(function(){
			var str = $('#title').val();
			var ganti = str.replace(' ','-');
			var kecil = ganti.toLowerCase();

			$('#slug').val(kecil);
		});

	});
</script>
<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> <b>Add New Category</b></div>
				<div class="panel-body">
				<?php echo form_open('admincategory/addcategory');?>
			
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
						<th width="15%">Slug</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('slug');?>
						<?php echo form_input(array(
							'name'=>'slug',
							'id'=>'slug',
							'class'=>'form-control input-sm',
							'value'=>set_value('slug')
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Parent</th>
						<th width="1%">:</th>
						<td width="45%">
						
							<select name="parent" id="parent" class="form-control input-sm">
								<option value="0">None</option>

								<?php
									foreach($parent as $row):
										echo '<option value="'.$row->id.'">'.$row->category_name.'</option>';

									endforeach;
								?>
							</select>

						</td>
					</tr>
					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save Category
						</button>
						<?php
							echo anchor('admincategory','<i class="glyphicon glyphicon-backward"></i> Back',array(
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
