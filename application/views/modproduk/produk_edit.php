<script type="text/javascript">
tinymce.init({
    selector: "#deskripsi",
     plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<div class="container">
<div class="row">
	<div class="col-lg-12 col-sm-12 col-xs-12">
		
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-home"></i> <b>Add New Produk</b></div>
				<div class="panel-body">
				<?php echo form_open('modproduk/tambah');?>
				<div class="well well-sm">
					Pastikan sebelumnya file gambar sudah terupload. Jika belum mengupload file silahkan klik tombol berikut <?php echo anchor('adminmedia','Upload File',array('class'=>'btn btn-warning btn-sm','target'=>'_blank'));?>
				</div>
				<table class="table">
					<tr>
						<th width="15%">Title</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_error('judul');?>
						<?php echo form_input(array(
							'name'=>'judul',
							'id'=>'judul',
							'class'=>'form-control input-sm',
							'value'=>$query->produk_title,
							'autofocus'=>'autofocus'
						));?>
						</td>
					</tr>

					<tr>
						<th width="15%">Kategori</th>
						<th width="1%">:</th>
						<td width="45%">
						<select name="kategori" id="kategori" class="form-control" required>
							<option value="">--Pilih--</option>
							<?php
								foreach($category as $row):
									if($row->produk_cat == $row->slug){
										$select = 'selected="selected"';
									}else{
										$select = "";
									}

									echo '<option value="'.$row->slug.'" '.$select.'>'.$row->category_name.'</option>';
								endforeach;
							?>
						</select>
						</td>
					</tr>

					<tr>
						<th width="15%">Description</th>
						<th width="1%">:</th>
						<td width="45%">
						<?php echo form_textarea(array(
							'name'=>'deskripsi',
							'id'=>'deskripsi',
							'class'=>'form-control input-sm',
							'required'=>'required',
							'value'=>$row->produk_desc
						));?>
						</td>
					</tr>
					<tr>
                        <th width="15%">Gambar 1</th>
                        <th width="1%">:</th>
                        <th width="45%">
                        <span class="text-danger"><small>Gambar pertama akan dijadikan gambar utama.</small></span>
                              <input type="text" name="image1" value="" id="image1" class="form-control" value="<?php echo $row->produk_image1;?>"  required />
                           
                        </th>
                    </tr>

                    <?php
                    	for($i=2; $i<=8; $i++){

                    		?>
                    		<tr>
		                        <th width="15%">Gambar <?php echo $i;?></th>
		                        <th width="1%">:</th>
		                        <th width="45%">
		                              <input type="text" name="image<?php echo $i;?>" value="<?php echo $row->produk_image.$i;?>" id="image<?php echo $i;?>" class="form-control"  required />
		                           
		                        </th>
		                    </tr>
                    		<?php
                    	}
                    ?>
					
					<tr>
						<th colspan="3">
						<button type="submit" name="simpan" id="simpan" class="btn btn-info">
							<i class="glyphicon glyphicon-saved"></i> Simpan Data
						</button>
						<?php
							echo anchor('modproduk','<i class="glyphicon glyphicon-backward"></i> Batal',array(
								'class'=>'btn btn-warning',
								'onclick'=>"return confirm('Perhatian data tidak disimpan. Yakin akan membatalkan proses penambahan data?')"
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
