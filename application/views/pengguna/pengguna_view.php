<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
    		<div class="panel-heading"><i class="glyphicon glyphicon-user"></i> <b>Data Pengguna</b></div>
    		<div class="panel-body">
				<?php echo $this->session->flashdata('pesan');?>
				<?php echo anchor('pengguna/tambah', '<i class="glyphicon glyphicon-plus"></i> Tambah Data',array(
					'class'=>'btn btn-warning'
				));?>
				<hr>
				<table class="table table-striped">
					<tr class="info">
						<th>No.</th>
						<th>Username</th>
						<th>Nama Lengkap</th>
						<th>Jabatan</th>
						<th>Status</th>
						<th>Tgl. Login</th>
						<th>Tools</th>
					</tr>
					<?php 
						if(empty($query)){
							echo '<tr class="danger"><th colspan="6">Data tidak tersedia.</th></tr>';
						}else{
							$no = 0;
							foreach($query as $row):
								$no++;
								?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $row->username;?></td>
									<td><?php echo $row->nama_lengkap;?></td>
									<td><?php echo '<span class="label label-info">'.$row->role.'</span>';?></td>
									
									<td><?php if($row->status == 1) echo '<span class="label label-success">Aktif</span>'; else echo '<span class="label label-danger">Tidak</span>';?></td>
									<td><?php echo date('d-m-Y h:i:s',strtotime($row->login_date));?></td>
									<td>
										<div class="btn-group">
										  	<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										    	<i class="glyphicon glyphicon-list"></i> Aksi <span class="caret"></span>
										  	</button>
										  	<ul class="dropdown-menu" role="menu">
											    <li><?php echo anchor('pengguna/ubah/'.$row->id,'<i class="glyphicon glyphicon-pencil"></i> Ubah');?></li>
											    <li><?php 
											    	if($row->status == 1){
											    		echo anchor('pengguna/disable/'.$row->id,
											    '<i class="glyphicon glyphicon-lock"></i> Non-aktifkan',array('onclick'=>"return confirm('Yakin mau non-aktifkan?')"));
											    	}else{
											    		echo anchor('pengguna/enable/'.$row->id,
											    '<i class="glyphicon glyphicon-lock"></i> Aktifkan',array('onclick'=>"return confirm('Yakin mau mengaktifkan kembali?')"));
											    	}?></li>
											</ul>
										</div>
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