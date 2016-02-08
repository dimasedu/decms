<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12">
			<div class="panel panel-primary">
    		<div class="panel-heading"><i class="glyphicon glyphicon-lock"></i> <b>Edit Hak Akses Pengguna</b></div>
    		<div class="panel-body">
				<?php 
					echo anchor('user','<i class="glyphicon glyphicon-backward"></i> Kembali',array(
								'class'=>'btn btn-danger'
								));?><br><br>
				<?php echo form_open('modul/edit/'.$query->id)?>
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
									<tr class="active">
										<th colspan="2">
											<?php
												if($mod->mod_master == 1){
													$pilmodmaster = TRUE;
												}else{
													$pilmodmaster = FALSE;
												}
											?>
											<?php echo form_checkbox('mod_master',1, $pilmodmaster);?> Data Master
										</th>
									</tr>
									<tr>
										<td width="20%"><span class="label label-info">Program</span></td>
										<td>
											<?php
												if($mod->mst_program == 1){
													$mst_programy = TRUE;
													$mst_programt = FALSE;
												}else{
													$mst_programt = TRUE;
													$mst_programy = FALSE;
												}
											?>
											<?php echo form_radio('mst_program', 1, $mst_programy);?> Ya&nbsp;
											<?php echo form_radio('mst_program', 0, $mst_programt);?> Tidak
										</td>
									</tr>
									<tr>
										<td><span class="label label-info">Sub Program</span></td>
										<td>
											<?php
												if($mod->mst_subprogram == 1){
													$mst_subprogy = TRUE;
													$mst_subprogt = FALSE;
												}else{
													$mst_subprogt = TRUE;
													$mst_subprogy = FALSE;
												}
											?>
											<?php echo form_radio('mst_subprogram', 1, $mst_subprogy);?> Ya&nbsp;
											<?php echo form_radio('mst_subprogram', 0, $mst_subprogt);?> Tidak
										</td>
									</tr>
									<tr><th colspan="2">&nbsp;</th></tr>
									<tr class="active">
										<th colspan="2">
										<?php
												if($mod->mod_kesiswaan == 1){
													$pilmodsiswa = TRUE;
												}else{
													$pilmodsiswa = FALSE;
												}
											?>
										<?php echo form_checkbox('mod_kesiswaan',1, $pilmodsiswa);?> Kesiswaan
										</th></tr>
									
										<tr>
										<td><span class="label label-info">Data Siswa</span></td>
										<td>
											<?php
												if($mod->sis_siswa == 1){
													$sisway = TRUE;
													$siswat = FALSE;
												}else{
													$sisway = FALSE;
													$siswat = TRUE;
												}
											?>
											<?php echo form_radio('sis_siswa', 1, $sisway);?> Ya&nbsp;
											<?php echo form_radio('sis_siswa', 0, $siswat);?> Tidak
										</td>
									</tr>

									<tr>
										<td><span class="label label-info">Data Kelas</span></td>
										<td>
											<?php
												if($mod->sis_kelas == 1){
													$kelasy = TRUE;
													$kelast = FALSE;
												}else{
													$kelasy = FALSE;
													$kelast = TRUE;
												}
											?>
											<?php echo form_radio('sis_kelas', 1, $kelasy);?> Ya&nbsp;
											<?php echo form_radio('sis_kelas', 0, $kelast);?> Tidak
										</td>
									</tr>

									<tr>
										<td><span class="label label-info">Kenaikan Kelas</span></td>
										<td>
											<?php
												if($mod->sis_naik == 1){
													$naikkelasy = TRUE;
													$naikkelast = FALSE;
												}else{
													$naikkelasy = FALSE;
													$naikkelast = TRUE;
												}
											?>
											<?php echo form_radio('sis_naik', 1, $naikkelasy);?> Ya&nbsp;
											<?php echo form_radio('sis_naik', 0, $naikkelast);?> Tidak
										</td>
									</tr>
									<tr>
										<td><span class="label label-info">Tinggal Kelas</span></td>
										<td>
											<?php
												if($mod->sis_tinggal == 1){
													$tinggalkelasy = TRUE;
													$tinggalkelast = FALSE;
												}else{
													$tinggalkelasy = FALSE;
													$tinggalkelast = TRUE;
												}
											?>
											<?php echo form_radio('sis_tinggal', 1, $tinggalkelasy);?> Ya&nbsp;
											<?php echo form_radio('sis_tinggal', 0, $tinggalkelast);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Pindah Kelas</span></td>
										<td>
											<?php
												if($mod->sis_pindah == 1){
													$pindahkelasy = TRUE;
													$pindahkelast = FALSE;
												}else{
													$pindahkelasy = FALSE;
													$pindahkelast = TRUE;
												}
											?>
											<?php echo form_radio('sis_pindah', 1, $pindahkelasy);?> Ya&nbsp;
											<?php echo form_radio('sis_pindah', 0, $pindahkelast);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Deaktif Siswa</span></td>
										<td>
											<?php
												if($mod->sis_deaktif == 1){
													$deaktify = TRUE;
													$deaktift = FALSE;
												}else{
													$deaktify = FALSE;
													$deaktift = TRUE;
												}
											?>
											<?php echo form_radio('sis_deaktif', 1, $deaktify);?> Ya&nbsp;
											<?php echo form_radio('sis_deaktif', 0, $deaktift);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Kelulusan Siswa</span></td>
										<td>
											<?php
												if($mod->sis_lulus == 1){
													$lulusy = TRUE;
													$lulust = FALSE;
												}else{
													$lulusy = FALSE;
													$lulust = TRUE;
												}
											?>
											<?php echo form_radio('sis_lulus', 1, $lulusy);?> Ya&nbsp;
											<?php echo form_radio('sis_lulus', 0, $lulust);?> Tidak</td>
									</tr>


									<tr><th colspan="2">&nbsp;</th></tr>
									<tr class="active"><th colspan="2">
									<?php
										if($mod->mod_transaksi == 1){
											$pilmodtrans = TRUE;
										}else{
											$pilmodtrans = FALSE;
										}
									?>
									<?php echo form_checkbox('mod_transaksi',1, $pilmodtrans);?> Transaksi</th></tr>
									<tr>
										<td><span class="label label-info">Rancangan Anggaran Belanjar</span></td>
										<td>
											<?php
												if($mod->trs_rab == 1){
													$raby = TRUE;
													$rabt = FALSE;
												}else{
													$raby = FALSE;
													$rabt = TRUE;
												}
											?>
											<?php echo form_radio('trs_rab', 1, $raby);?> Ya&nbsp;
											<?php echo form_radio('trs_rab', 0, $rabt);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Transaksi Kas</span></td>
										<td>
											<?php
												if($mod->trs_kas == 1){
													$kasy = TRUE;
													$kast = FALSE;
												}else{
													$kasy = FALSE;
													$kast = TRUE;
												}
											?>
											<?php echo form_radio('trs_kas', 1, $kasy);?> Ya&nbsp;
											<?php echo form_radio('trs_kas', 0, $kast);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Data Guru</span></td>
										<td>
											<?php
												if($mod->trs_guru == 1){
													$guruy = TRUE;
													$gurut = FALSE;
												}else{
													$guruy = FALSE;
													$gurut = TRUE;
												}
											?>
											<?php echo form_radio('trs_guru', 1, $guruy);?> Ya&nbsp;
											<?php echo form_radio('trs_guru', 0, $gurut);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Honor Guru</span></td>
										<td>
											<?php
												if($mod->trs_honor == 1){
													$honory = TRUE;
													$honort = FALSE;
												}else{
													$honory = FALSE;
													$honort = TRUE;
												}
											?>
											<?php echo form_radio('trs_honor', 1, $honory);?> Ya&nbsp;
											<?php echo form_radio('trs_honor', 0, $honort);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Transaksi Pajak</span></td>
										<td>
											<?php
												if($mod->trs_pajak == 1){
													$pajaky = TRUE;
													$pajakt = FALSE;
												}else{
													$pajaky = FALSE;
													$pajakt = TRUE;
												}
											?>
											<?php echo form_radio('trs_pajak', 1, $pajaky);?> Ya&nbsp;
											<?php echo form_radio('trs_pajak', 0, $pajakt);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Transaksi Bank</span></td>
										<td>
											<?php
												if($mod->trs_bank == 1){
													$banky = TRUE;
													$bankt = FALSE;
												}else{
													$banky = FALSE;
													$bankt = TRUE;
												}
											?>
											<?php echo form_radio('trs_bank', 1, $banky);?> Ya&nbsp;
											<?php echo form_radio('trs_bank', 0, $bankt);?> Tidak</td>
									</tr>

									<tr><th colspan="2">&nbsp;</th></tr>
									<tr class="active"><th colspan="2">
										<?php
												if($mod->mod_rekapitulasi == 1){
													$pilmodrek = TRUE;
												}else{
													$pilmodrek = FALSE;
												}
											?>

										<?php echo form_checkbox('mod_rekapitulasi',1, $pilmodrek);?> Rekapitulasi</th>
									</tr>

									<tr>
										<td><span class="label label-info">Laporan BOS-K1</span></td>
										<td>
											<?php
												if($mod->rek_k1 == 1){
													$k1y = TRUE;
													$k1t = FALSE;
												}else{
													$k1y = FALSE;
													$k1t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k1', 1, $k1y);?> Ya&nbsp;
											<?php echo form_radio('rek_k1', 0, $k1t);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-info">Laporan BOS-K2</span></td>
										<td>
											<?php
												if($mod->rek_k2 == 1){
													$k2y = TRUE;
													$k2t = FALSE;
												}else{
													$k2y = FALSE;
													$k2t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k2', 1, $k2y);?> Ya&nbsp;
											<?php echo form_radio('rek_k2', 0, $k2t);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-info">Laporan BOS-K3</span></td>
										<td>
											<?php
												if($mod->rek_k3 == 1){
													$k3y = TRUE;
													$k3t = FALSE;
												}else{
													$k3y = FALSE;
													$k3t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k3', 1, $k3y);?> Ya&nbsp;
											<?php echo form_radio('rek_k3', 0, $k3t);?> Tidak</td>
									</tr>
									<tr>
										<td><span class="label label-info">Laporan BOS-K4</span></td>
										<td>
											<?php
												if($mod->rek_k4 == 1){
													$k4y = TRUE;
													$k4t = FALSE;
												}else{
													$k4y = FALSE;
													$k4t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k4', 1, $k4y);?> Ya&nbsp;
											<?php echo form_radio('rek_k4', 0, $k4t);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-info">Laporan BOS-K5</span></td>
										<td>
											<?php
												if($mod->rek_k5 == 1){
													$k5y = TRUE;
													$k5t = FALSE;
												}else{
													$k5y = FALSE;
													$k5t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k5', 1, $k5y);?> Ya&nbsp;
											<?php echo form_radio('rek_k5', 0, $k5t);?> Tidak</td>
									</tr>


									<tr>
										<td><span class="label label-info">Laporan BOS-K6</span></td>
										<td>
											<?php
												if($mod->rek_k6 == 1){
													$k6y = TRUE;
													$k6t = FALSE;
												}else{
													$k6y = FALSE;
													$k6t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k6', 1, $k6y);?> Ya&nbsp;
											<?php echo form_radio('rek_k6', 0, $k6t);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-info">Laporan BOS-K7</span></td>
										<td>
											<?php
												if($mod->rek_k7 == 1){
													$k7y = TRUE;
													$k7t = FALSE;
												}else{
													$k7y = FALSE;
													$k7t = TRUE;
												}
											?>
											<?php echo form_radio('rek_k7', 1, $k7y);?> Ya&nbsp;
											<?php echo form_radio('rek_k7', 0, $k7t);?> Tidak</td>
									</tr>
									

									<tr>
										<td><span class="label label-info">Laporan BOS-K7a</span></td>
										<td>
											<?php
												if($mod->rek_k7a == 1){
													$k7ay = TRUE;
													$k7at = FALSE;
												}else{
													$k7ay = FALSE;
													$k7at = TRUE;
												}
											?>
											<?php echo form_radio('rek_k7a', 1, $k7ay);?> Ya&nbsp;
											<?php echo form_radio('rek_k7a', 0, $k7at);?> Tidak</td>
									</tr>

									<tr>
										<td><span class="label label-info">Laporan BOS-02a</span></td>
										<td>
											<?php
												if($mod->rek_02 == 1){
													$rek2y = TRUE;
													$rek2t = FALSE;
												}else{
													$rek2y = FALSE;
													$rek2t = TRUE;
												}
											?>
											<?php echo form_radio('rek_02', 1, $rek2y);?> Ya&nbsp;
											<?php echo form_radio('rek_02', 0, $rek2t);?> Tidak</td>
									</tr>
									

									<tr>
										<td><span class="label label-info">Laporan BOS-03</span></td>
										<td>
											<?php
												if($mod->rek_03 == 1){
													$rek3y = TRUE;
													$rek3t = FALSE;
												}else{
													$rek3y = FALSE;
													$rek3t = TRUE;
												}
											?>
											<?php echo form_radio('rek_03', 1, $rek3y);?> Ya&nbsp;
											<?php echo form_radio('rek_03', 0, $rek3t);?> Tidak</td>
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