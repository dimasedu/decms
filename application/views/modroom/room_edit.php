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
				<div class="panel-heading"><i class="glyphicon glyphicon-home"></i> <b>Edit Room</b></div>
				<div class="panel-body">
				<?php echo form_open('modroom/edit/'.$this->uri->segment(3));?>
			
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
							'value'=>$query->nama_kamar,
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
							'value'=>$query->nama_kamar
						));?>
						</td>
					</tr>
					<tr>
                        <th width="15%">Featured Image</th>
                        <th width="1%">:</th>
                        <th width="45%">
                           <div class="col-md-6 col-xs-6">
                               <input type="text" name="featuredimage" value="<?php echo $query->featimage;?>" id="featuredimage" class="form-control" readonly="readonly"  />
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
						<th width="15%">Luas Kamar</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_input(array(
							'name'=>'luas',
							'id'=>'luas',
							'class'=>'form-control input-sm',
							'required'=>'required',
							'value'=>$query->area
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
							'required'=>'required',
							'value'=>$query->bed_desc
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Lainnya</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php 

						if($query->ac == 1){
							$cekac = 'checked="checked"';
						}else{
							$cekac = '';
						}

						?>
						<input type="checkbox" name="ac" value="1"  <?php echo $cekac;?>/> <span class="label label-primary">Full AC</span><br><br>
						
						<?php 

						if($query->wifi == 1){
							$cekwi = 'checked="checked"';
						}else{
							$cekwi = '';
						}

						?>
						<input type="checkbox" name="wifi" value="1"  <?php echo $cekwi;?>/> <span class="label label-primary">Wifi</span><br><br>
						
						<?php 


						if($query->telpon == 1){
							$cektel = 'checked="checked"';
						}else{
							$cektel = '';
						}

						?>
						<input type="checkbox" name="telpon" value="1"  <?php echo $cektel;?>/> <span class="label label-primary">Akses Telpon Internasional</span><br><br>
						

						<?php 

						if($query->deposit == 1){
							$cekdep = 'checked="checked"';
						}else{
							$cekdep = '';
						}

						?>
						<input type="checkbox" name="deposit" value="1" <?php echo $cekdep;?> /> <span class="label label-primary">Safe Deposit Box</span><br><br>
						

						<?php 

						if($query->lcd == 1){
							$ceklcd = 'checked="checked"';
						}else{
							$ceklcd = '';
						}

						?>
						<input type="checkbox" name="lcd" value="1"  <?php echo $ceklcd;?>/> <span class="label label-primary">TV LCD 32 Inch</span><br><br>
						

						<?php 

						if($query->teh == 1){
							$cekteh = 'checked="checked"';
						}else{
							$cekteh = '';
						}

						?>
						<input type="checkbox" name="teh" value="1"  <?php echo $cekteh;?>/> <span class="label label-primary">Fasilitas Teh dan Kopi</span><br><br>


						<?php 

						if($query->hair == 1){
							$cekhair = 'checked="checked"';
						}else{
							$cekhair = '';
						}

						?>
						<input type="checkbox" name="hair" value="1" <?php echo $cekhair;?> /> <span class="label label-primary">Hair Dryer</span><br><br>


						<?php 

						if($query->shower == 1){
							$cekshow = 'checked="checked"';
						}else{
							$cekshow = '';
						}

						?>
						<input type="checkbox" name="shower" value="1" <?php echo $cekshow;?> /> <span class="label label-primary">Kamar Mandi dengan Shower</span><br><br>


						<?php 

						if($query->mejakerja == 1){
							$cekmeja = 'checked="checked"';
						}else{
							$cekmeja = '';
						}

						?>
						<input type="checkbox" name="mejakerja" value="1" <?php echo $cekmeja;?> /> <span class="label label-primary">Meja Kerja</span><br><br>


						<?php 

						if($query->mineral == 1){
							$cekair = 'checked="checked"';
						}else{
							$cekair = '';
						}

						?>
						<input type="checkbox" name="mineral" value="1" <?php echo $cekair;?>/> <span class="label label-primary">Air Mineral</span><br><br>
						

						<?php 

						if($query->rokok == 1){
							$cekrok = 'checked="checked"';
						}else{
							$cekrok = '';
						}

						?>
						<input type="checkbox" name="rokok" value="1" <?php echo $cekrok;?> /> <span class="label label-primary">Ruangan Bebas Rokok</span>
						
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
