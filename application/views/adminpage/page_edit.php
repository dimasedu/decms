<script type="text/javascript">
tinymce.init({
    selector: "#textbody",
     plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
        "charmap code"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | charmap code"
});

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
				<div class="panel-heading"><i class="glyphicon glyphicon-tags"></i> <b>Edit Page</b></div>
				<div class="panel-body">
				<?php echo form_open('adminpage/editpage/'.$this->uri->segment(3));?>
			
				<table class="table">
					<tr>
						<th width="15%">Title</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('title');?>
						<?php echo form_input(array(
							'name'=>'title',
							'id'=>'title',
							'class'=>'form-control input-sm',
							'value'=>$query->page_title,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th>Page Body</th>
						<th>:</th>
						<td>
						<?php echo form_error('textbody');?>
						<?php
							echo form_textarea(array(
								'name'=>'textbody',
								'id'=>'textbody',
								'value'=>$query->page_body
								));
						?>
						
						</td>
					</tr>
					<tr>
						<th width="15%">Meta Title</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('metaname');?>
						<?php echo form_input(array(
							'name'=>'metaname',
							'id'=>'metaname',
							'class'=>'form-control input-sm',
							'value'=>$query->meta_title
						));?>
						</td>
					</tr>
					<tr>
						<th width="15%">Meta Description</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('metadesc');?>
						<?php echo form_input(array(
							'name'=>'metadesc',
							'id'=>'metadesc',
							'class'=>'form-control input-sm',
							'value'=>$query->meta_description
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

					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Save Page
						</button>
						<?php
							echo anchor('jenis','<i class="glyphicon glyphicon-backward"></i> back',array(
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
