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
				<div class="panel-heading"><i class="glyphicon glyphicon-cog"></i> <b>Web Setting</b></div>
				<div class="panel-body">
				<?php echo form_open('setting/index/'.$this->uri->segment(3));?>
				<?php echo $this->session->flashdata('pesan');?>
			
				<table class="table">
					<tr>
						<th width="15%">Sitename</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('nama');?>
						<?php echo form_input(array(
							'name'=>'nama',
							'id'=>'nama',
							'class'=>'form-control input-sm',
							'value'=>$query->site_name,
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
							'value'=>$query->description
						));?>
						</td>
					</tr>
					<tr>
						<th width="15%">Front Text</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('front');?>
						<?php echo form_textarea(array(
							'name'=>'front',
							'id'=>'front',
							'class'=>'form-control input-sm',
							'value'=>$query->front_text
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Call Number</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('telp');?>
						<?php echo form_input(array(
							'name'=>'telp',
							'id'=>'telp',
							'class'=>'form-control input-sm',
							'value'=>$query->callnumber
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Address</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('alamat');?>
						<?php echo form_input(array(
							'name'=>'alamat',
							'id'=>'alamat',
							'class'=>'form-control input-sm',
							'value'=>$query->address
						));?>
						</td>
					</tr>
					<tr>
                        <th width="15%">Logo</th>
                        <th width="1%">:</th>
                        <th width="45%">

                        	<div class="col-md-3 col-sm-6 col-xs-12">
                        		<img src="<?php echo base_url();?>uploads/<?php echo $query->logo;?>" width="140" class="img-responsive img-square">
                        	</div>	
                           <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" name="featuredimage" value="<?php echo $query->logo;?>" id="featuredimage" class="form-control" readonly="readonly"  required />
                           </div>
                           <div class="col-md-2 col-sm-6 col-xs-12">
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
						<th width="15%">Online?</th>
						<th width="1%">:</th>
						<td width="45%">
					
						<?php 
						if($query->web_status == 1){
							$pil = TRUE;
						}else{
							$pil = FALSE;
						}

						echo form_checkbox(array(
							'name'=>'online',
							'id'=>'online',
							'value'=>1,
							'checked'=>$pil
						));?> <span class="label label-info">Yes It is!</span>
						</td>
					</tr>

					<tr>
						<th width="15%">Admin Email</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('email');?>
						<?php echo form_input(array(
							'name'=>'email',
							'id'=>'email',
							'class'=>'form-control input-sm',
							'value'=>$query->admin_email
						));?>
						</td>
					</tr>
					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save Setting
						</button>
						
						</th>
					</tr>
				</table>
			<?php echo form_close();?>
			</div>
		</div>	
	</div>
</div>
