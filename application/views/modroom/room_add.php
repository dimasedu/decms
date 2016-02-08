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
				<div class="panel-heading"><i class="glyphicon glyphicon-home"></i> <b>Add New Room</b></div>
				<div class="panel-body">
				<?php echo form_open('modroom/addroom');?>
			
				<table class="table">
					<tr>
						<th width="15%">Nama Kamar</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('nama');?>
						<?php echo form_input(array(
							'name'=>'nama',
							'id'=>'nama',
							'class'=>'form-control input-sm',
							'value'=>set_value('nama'),
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Deskripsi</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('deskripsi');?>
						<?php echo form_textarea(array(
							'name'=>'deskripsi',
							'id'=>'deskripsi',
							'class'=>'form-control input-sm',
							'value'=>set_value('deskripsi')
						));?>
						</td>
					</tr>
					<tr>
                        <th width="15%">Featured Image</th>
                        <th width="1%">:</th>
                        <th width="45%">
                           <div class="col-md-6 col-xs-6">
                               <input type="text" name="featuredimage" value="" id="featuredimage" class="form-control" readonly="readonly"  />
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
					<tr class="success">
						<th colspan="3">Fitur Kamar</th>
					</tr>
					<tr>
						<th width="15%">Luar Kamar</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'luas',
							'id'=>'luas',
							'class'=>'form-control input-sm',
							'required'=>'required'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Tempat Tidur</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'tempat',
							'id'=>'tempat',
							'class'=>'form-control input-sm',
							'required'=>'required'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Lainnya</th>
						<th width="1%">:</th>
						<td width="45%">
						<input type="checkbox" name="ac" value="1"  /> <span class="label label-primary">Full AC</span><br><br>
						
						<input type="checkbox" name="wifi" value="1"  /> <span class="label label-primary">Wifi</span><br><br>
						
						<input type="checkbox" name="telpon" value="1"  /> <span class="label label-primary">Akses Telpon Internasional</span><br><br>
						
						<input type="checkbox" name="deposit" value="1"  /> <span class="label label-primary">Safe Deposit Box</span><br><br>
						
						<input type="checkbox" name="lcd" value="1"  /> <span class="label label-primary">TV LCD 32 Inch</span><br><br>
						
						<input type="checkbox" name="teh" value="1"  /> <span class="label label-primary">Fasilitas Teh dan Kopi</span><br><br>

						<input type="checkbox" name="hair" value="1"  /> <span class="label label-primary">Hair Dryer</span><br><br>

						<input type="checkbox" name="shower" value="1"  /> <span class="label label-primary">Kamar Mandi dengan Shower</span><br><br>

						<input type="checkbox" name="mejakerja" value="1"  /> <span class="label label-primary">Meja Kerja</span><br><br>

						<input type="checkbox" name="mineral" value="1"  /> <span class="label label-primary">Air Mineral</span><br><br>
						<input type="checkbox" name="rokok" value="1"  /> <span class="label label-primary">Ruangan Bebas Rokok</span>
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
