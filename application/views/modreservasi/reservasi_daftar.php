<div class="container">
<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="glyphicon glyphicon-comment"></i> <b>Daftar Reservasi via Website</b></div>	
				
				<div class="panel-body">
					<?php echo $this->session->flashdata('pesan');?>
					
					<hr>
					<table class="table table-striped table-hover">
						<tr class="active">
							<th>No.</th>
							<th>Nama</th>
							<th>Identitas</th>
							<th>Cekin</th>
							<th>Cekout</th>
							<th>HP/Telp</th>
							<th>Tipe Kamar</th>
						</tr>
						<?php 
							if(empty($query)){
								echo '<tr class="danger"><th colspan="10">Data is Empty.</th></tr>';
							}else{
								if(!$this->uri->segment(3)){
									$no = 0;
								}else{
									$no = $this->uri->segment(3);
								}
								foreach($query as $row):
									$no++;
									?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row->nama;?><br><span class="label label-info"><?php echo $row->email;?></span></td>
										<td><?php echo $row->no_ktp;?></td>
										<td><span class="label label-success"><?php echo date('d-m-Y', strtotime($row->cekin));?></span></td>
										<td><span class="label label-danger"><?php echo date('d-m-Y', strtotime($row->cekout));?></span></td>
										<td><?php echo $row->telp;?></td>
										<td><?php echo $row->tipe_kamar;?></td>
									</tr>
									<?php
								endforeach;
							}
						?>
					</table>

					<ul class="pagination pagination-large pull-right">
					<?php echo $halaman;?>
					</ul>
				</div>
		</div>
	</div>
</div>