<script type="text/javascript">
function getfeatimage(featimg){
	$(document).ready(function(){
		$('#featuredimage').val(featimg);
		$('#image-modal').modal('hide');
	});
}

	$(document).ready(function(){

	$('#tampildata').click(function(){

		$.ajax({
			beforeSend : function(html){
				$('#imgresult').html('<p class="text-success">Please Wait......</p>');
				$('#imgresult').fadeOut(2500);
			},
			success : function(data){
				$('#imgresult').show(1000);
				$('#imgresult').load('<?php echo site_url();?>/adminpage/showfeatimage');
			}
		});

	});

});
</script>
<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-home"></i> <b>Edit Picture</b></div>
				<div class="panel-body">
				<?php echo form_open('modgallery/edit/'.$this->uri->segment(3));?>
			
				<table class="table">
					<tr>
						<th width="15%">Title</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('nama');?>
						<?php echo form_input(array(
							'name'=>'nama',
							'id'=>'nama',
							'class'=>'form-control input-sm',
							'value'=>$query->image_title,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Description</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('deskripsi');?>
						<?php echo form_textarea(array(
							'name'=>'deskripsi',
							'id'=>'deskripsi',
							'class'=>'form-control input-sm',
							'value'=>$query->image_description
						));?>
						</td>
					</tr>
					<tr>
                        <th width="15%">Image File</th>
                        <th width="1%">:</th>
                        <th width="45%">
                           <div class="col-md-6 col-xs-6">
                               <input type="text" name="featuredimage" value="<?php echo $query->image_file;?>" id="featuredimage" class="form-control" readonly="readonly"  required />
                           </div>
                           <div class="col-md-2 col-xs-2">
                               <!-- Large modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image-modal" id="tampildata">
                                    <i class="glyphicon glyphicon-search"></i> Search Image
                                </button>

                                <div class="modal fade" id="image-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                          <i class="glyphicon glyphicon-picture"></i> Image Files
                                      </div>
                                      <div class="modal-body">
                                            <span id="imgresult"></span>
                                      </div>
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                           </div>
                        </th>
                    </tr>
					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save Gallery
						</button>
						<?php
							echo anchor('modgallery','<i class="glyphicon glyphicon-backward"></i> Back',array(
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
