<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
    		<div class="panel-heading"><i class="glyphicon glyphicon-lock"></i> <b>Tambah Hak Akses Pengguna</b></div>
    		<div class="panel-body">
				<?php 
					echo anchor('user','<i class="glyphicon glyphicon-backward"></i> Kembali',array(
								'class'=>'btn btn-danger'
								));?><br><br>
				<?php echo form_open('modul/tambah/'.$query->id);?>
					<table class="table table-striped">
						<tr>
							<th>Username</th>
							<th>:</th>
							<th>
							<?php echo $query->username;?>
							</th>
						</tr>
						<tr class="success">
							<th colspan="3">Daftar Hak Akses</th>
						</tr>
						<tr>
							<th width="20%">Modul</th>
							<th>:</th>
							<td>
							<div style="height:500px; overflow:auto;">
								<table class="table table-bordered">
									<tr class="active"><th colspan="2"><?php echo form_checkbox('mod_master',1, TRUE);?> Data Master</th></tr>
									<tr>
										<td width="20%"><span class="label label-primary">Program</span></td>
										<td>
											<?php echo form_radio('mst_program', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('mst_program', 0);?> Tidak
										</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Sub Program</span></td>
										<td><?php echo form_radio('mst_subprogram', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('mst_subprogram', 0);?> Tidak</td>
									</tr>

									<tr><th colspan="2">&nbsp;</th></tr>
									<tr class="active"><th colspan="2"><?php echo form_checkbox('mod_transaksi',1, TRUE);?> Keuangan</th></tr>
									<tr>
										<td><span class="label label-primary">Rancangan Anggaran Belanja</span></td>
										<td><?php echo form_radio('trs_rab', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('trs_rab', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Transaksi Kas</span></td>
										<td><?php echo form_radio('trs_kas', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('trs_kas', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Data Guru</span></td>
										<td><?php echo form_radio('trs_guru', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('trs_guru', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Honor Guru</span></td>
										<td><?php echo form_radio('trs_honor', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('trs_honor', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Transaksi Pajak</span></td>
										<td><?php echo form_radio('trs_pajak', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('trs_pajak', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Transaksi Bank</span></td>
										<td><?php echo form_radio('trs_bank', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('trs_bank', 0);?> Tidak</td>
									</tr>


									<tr><th colspan="2">&nbsp;</th></tr>
									<tr class="active"><th colspan="2"><?php echo form_checkbox('mod_kesiswaan',1, TRUE);?> Kesiswaan</th></tr>
									
									<tr>
										<td><span class="label label-primary">Data Siswa</span></td>
										<td><?php echo form_radio('sis_siswa', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_siswa', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Data Kelas</span></td>
										<td><?php echo form_radio('sis_kelas', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_kelas', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Kenaikan Kelas</span></td>
										<td><?php echo form_radio('sis_naik', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_naik', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Tinggal Kelas</span></td>
										<td><?php echo form_radio('sis_tinggal', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_tinggal', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Pindah Kelas</span></td>
										<td><?php echo form_radio('sis_pindah', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_pindah', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Deaktif Siswa</span></td>
										<td><?php echo form_radio('sis_deaktif', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_deaktif', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Kelulusan Siswa</span></td>
										<td><?php echo form_radio('sis_lulus', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('sis_lulus', 0);?> Tidak</td>
									</tr>



									<tr><th colspan="2">&nbsp;</th></tr>
									<tr class="active"><th colspan="2"><?php echo form_checkbox('mod_rekapitulasi',1, TRUE);?> Rekapitulasi</th></tr>
									<tr>
										<td><span class="label label-primary">Laporan BOS-K1</span></td>
										<td><?php echo form_radio('rek_k1', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k1', 0);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-primary">Laporan BOS-K2</span></td>
										<td><?php echo form_radio('rek_k2', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k2', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-K3</span></td>
										<td><?php echo form_radio('rek_k3', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k3', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-K4</span></td>
										<td><?php echo form_radio('rek_k4', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k4', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-K5</span></td>
										<td><?php echo form_radio('rek_k5', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k5', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-K6</span></td>
										<td><?php echo form_radio('rek_k6', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k6', 0);?> Tidak</td>
									</tr>
									
									<tr>
										<td><span class="label label-primary">Laporan BOS-K7</span></td>
										<td><?php echo form_radio('rek_k7', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k7', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-K7a</span></td>
										<td><?php echo form_radio('rek_k7a', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_k7a', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-02a</span></td>
										<td><?php echo form_radio('rek_02', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_02', 0);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-primary">Laporan BOS-03</span></td>
										<td><?php echo form_radio('rek_03', 1, TRUE);?> Ya&nbsp;
											<?php echo form_radio('rek_03', 0);?> Tidak</td>
									</tr>
								</table>	
							</div>							
							</td>
						</tr>
						<tr>
							<th colspan="3">
								<?php echo form_submit(array(
													'name'=>'submit',
													'id'=>'submit', 
													'value'=>'Simpan Data', 
													'class'=>'btn btn-success'));?>
													

								</th>
							</tr>

					</table>
				
				</form>
			</div>
		</div>
	</div>
</div>