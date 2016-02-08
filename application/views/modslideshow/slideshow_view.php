
<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> <b>Slideshow Banner</b></div>
				<div class="panel-body">
				<div class="well well-sm">Silahkan Copy Paste nama file yang akan dijadikan slide. Ukuran 857 x 567 pixel</div>
				<?php echo form_open('modslideshow');?>
				<?php echo $this->session->flashdata('pesan');?>
				
				<table class="table">
					<tr>
						<th width="15%">Slide 1</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'slide1',
							'id'=>'slide1',
							'class'=>'form-control input-sm',
							'value'=>$query->slide1,
							'autofocus'=>'autofocus'
						));?>
						
						</td>
					</tr>

					<tr>
						<th width="15%">Text 1</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_textarea(array(
							'name'=>'text1',
							'id'=>'text1',
							'class'=>'form-control input-sm',
							'row'=>5,
							'value'=>$query->text1
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Slide 2</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'slide2',
							'id'=>'slide2',
							'class'=>'form-control input-sm',
							'value'=>$query->slide2,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Text 2</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_textarea(array(
							'name'=>'text2',
							'id'=>'text2',
							'value'=>$query->text2,
							'class'=>'form-control input-sm',
							'row'=>5
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Slide 3</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'slide3',
							'id'=>'slide3',
							'class'=>'form-control input-sm',
							'value'=>$query->slide3,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Text 3</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_textarea(array(
							'name'=>'text3',
							'id'=>'text3',
							'value'=>$query->text3,
							'class'=>'form-control input-sm',
							'row'=>5
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Slide 4</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'slide4',
							'id'=>'slide4',
							'class'=>'form-control input-sm',
							'value'=>$query->slide4,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Text 4</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_textarea(array(
							'name'=>'text4',
							'id'=>'text4',
							'value'=>$query->text4,
							'class'=>'form-control input-sm',
							'row'=>5
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Slide 5</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'slide5',
							'id'=>'slide5',
							'class'=>'form-control input-sm',
							'value'=>$query->slide5,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Text 5</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_textarea(array(
							'name'=>'text5',
							'id'=>'text5',
							'value'=>$query->text5,
							'class'=>'form-control input-sm',
							'row'=>5
						));?>
						</td>
					</tr>
					
					<tr>
						<th colspan="3">
						<button type="submit" name="submit" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save SLideshow
						</button>
						
						</th>
					</tr>
				</table>
			<?php echo form_close();?>
			</div>
		</div>	
	</div>
</div>
