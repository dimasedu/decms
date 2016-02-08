<?php

$tahun = date('Y');
$pdf = new Cetak();

$pdf->FPDF('L','mm','Legal');
$pdf->AddPage();
$pdf->AliasNbPages();
//$pdf->SetMargins(100,150,100);


$pdf->SetFont('Arial','B','9');
$pdf->Cell(330,6,'LAPORAN PERKEMBANGAN KEGIATAN DI LINGKUNGAN DINAS PEKERJAAN UMUM KABUPATEN PEMALANG TAHUN ANGGARAN '.$tahun,0,0,'C');
$pdf->Ln();
$pdf->Cell(330,6,'PELAKSANAAN SAMPAI DENGAN BULAN : '.strtoupper(($this->fungsiku->bulan_full((int)$bulan))).' '.$tahun,0,0,'C');
$pdf->Ln(10);
//$pdf->Cell(341,5,'Hal : '.$pdf->PageNo().' dari {nb}',0,0,'R');

$pdf->setFont('Arial','B','7');

$pdf->SetWidths(array('7','40'));
$pdf->SetAligns(array('C','C'));
$pdf->Row(array("No.",
	"Kode Program dan\nKegiatan\n "));
$pdf->SetY($pdf->GetY()-15);
$pdf->SetX($pdf->GetX()+47);
$pdf->Cell(75,15,'Program dan Kegiatan',1,0,'C');
$pdf->Cell(50,15,'Anggaran',1,0,'C');
$pdf->Cell(45,6,'Pelaksanaan Kegiatan',1,0,'C');
$pdf->Cell(45,6,'Realisasi Penyerapan',1,0,'C');
$pdf->SetWidths(array('15','15','15','13','13'));
$pdf->SetAligns(array('C','C','C','C','C'));
$pdf->Row(array('Realisasi Fisik',
	"Target Serapan\nper Bulan",
	"Kesenjangan per bulan",
	"Sudah\nLap",
	"Belum\nLap"));

$pdf->Ln();

$pdf->SetY($pdf->GetY()-14);
$pdf->SetX($pdf->GetX()+172);
$pdf->Cell(21,9,'Swakelola',1,0,'C');
$pdf->Cell(24,9,'Kontrak',1,0,'C');
$pdf->Cell(30,9,'Rp',1,0,'C');
$pdf->Cell(15,9,'%',1,0,'C');

$pdf->Ln();

$pdf->setFont('Arial','B','7');
$pdf->SetWidths(array('7','40','75','25','25','21','24','30','15','15','15','15','13','13'));
$pdf->SetAligns(array('C','L','L','R','R','R','R','R','R','R','R','R','R','R'));
$pdf->Row(array(
		'15',
		$set->kode_instansi,
		'Dinas Pekerjaan Umum',
		'-',
		'-',
		'-',
		'-',
		'-',
		'-',
		'-',
		'-',
		'-',
		'-',
		'-'
	));




foreach($head as $row):
	$angg_ubah = $this->ereport->lap_anggaran($row->id, $bulan, $tahun,'ubah');
	$serapan = $this->ereport->lap_anggaran($row->id, $bulan, $tahun,'serap');
	$target = $this->ereport->target_head($row->id, $bulan, $tahun);
	if($angg_ubah <> 0 && $serapan <> 0){
		$persen_serap = number_format(round($serapan/$angg_ubah * 100),2,",",".");
		$selisih = number_format($persen_serap - $target,2,",",".");
	}else{
		$persen_serap = "-";
		$selisih = "-";
	}
	$pdf->setFont('Arial','B','7');
	$pdf->SetWidths(array('7','40','75','25','25','21','24','30','15','15','15','15','13','13'));
	$pdf->SetAligns(array('C','L','L','R','R','R','R','R','R','R','R','R','R','R'));
	$pdf->Row(array(
			'',
			$set->kode_instansi.'.'.$row->kode,
			$row->nama_kegiatan,
			number_format($this->ereport->lap_anggaran($row->id, $bulan, $tahun),0,",","."),
			number_format($this->ereport->lap_anggaran($row->id, $bulan, $tahun,'ubah'),0,",","."),
			number_format($this->ereport->lap_anggaran($row->id, $bulan, $tahun,'swakelola'),0,",","."),
			number_format($this->ereport->lap_anggaran($row->id, $bulan, $tahun,'kontrak'),0,",","."),
			number_format($this->ereport->lap_anggaran($row->id, $bulan, $tahun,'serap'),0,",","."),
			$persen_serap,
			number_format($this->ereport->realfisik_head($row->id, $bulan, $tahun),2,",","."),
			number_format($this->ereport->target_head($row->id, $bulan, $tahun),2,",","."),
			$selisih,
			'-',
			'-'
		));

	$subheads = $this->lap->tampil_subhead($row->id);
	if(!empty($subheads)){

		foreach($subheads as $subhead):
			$pdf->SetWidths(array('7','40','75','25','25','21','24','30','15','15','15','15','13','13'));
			$pdf->SetAligns(array('C','L','L','R','R','R','R','R','R','R','R','R','R','R'));
			
			if($subhead->auto_jml == "1"){
				$pdf->setFont('Arial','B','7');
				$awalsubhead = $this->ereport->lap_subhead_tot($subhead->id, $bulan, $tahun);
				$ubahsubhead = $this->ereport->lap_subhead_tot($subhead->id, $bulan, $tahun,"ubah");
				$swakelolasubhead = $this->ereport->lap_subhead_tot($subhead->id, $bulan, $tahun,"swakelola");
				$kontraksubhead = $this->ereport->lap_subhead_tot($subhead->id, $bulan, $tahun, "kontrak");
				$serapsubhead = $this->ereport->lap_subhead_tot($subhead->id, $bulan, $tahun,"serap");
				
			}else{
				$pdf->setFont('Arial','','7');
				$awalsubhead = $this->ereport->lap_subhead($subhead->id, $bulan,$tahun);
				$ubahsubhead = $this->ereport->lap_subhead($subhead->id, $bulan,$tahun,"ubah");
				$swakelolasubhead = $this->ereport->lap_subhead($subhead->id, $bulan,$tahun,"swakelola");
				$kontraksubhead = $this->ereport->lap_subhead($subhead->id, $bulan,$tahun,"kontrak");
				$serapsubhead = $this->ereport->lap_subhead($subhead->id, $bulan,$tahun,"serap");
				
			}

			
			if($ubahsubhead <> 0 && $serapsubhead <> 0){
				$serappersen_subhead = $serapsubhead/$ubahsubhead*100;
			}else{
				$serappersen_subhead = 0;
			}

			$realfisik_subhead = $this->ereport->realfisik_subhead($subhead->id, $bulan,$tahun);
			$target_subhead = $this->ereport->target_subhead($subhead->id, $bulan,$tahun);
			$selisih_subhead = $realfisik_subhead - $target_subhead;



			$pdf->Row(array(
				'',
				$subhead->kode,
				$subhead->nama_detail,
				number_format($awalsubhead,0,",","."),
				number_format($ubahsubhead,0,",","."),
				number_format($swakelolasubhead,0,",","."),
				number_format($kontraksubhead,0,",","."),
				number_format($serapsubhead,0,",","."),
				number_format($serappersen_subhead,2,",","."),
				number_format($realfisik_subhead,2,",","."),
				number_format($target_subhead,2,",","."),
				number_format($selisih_subhead,2,",","."),
				'-',
				'-'
			));

		$details = $this->lap->tampil_detail($subhead->id);
		if(!empty($details)){
			$cek = 0;
			foreach($details as $detail):
				$pdf->SetWidths(array('7','40','75','25','25','21','24','30','15','15','15','15','13','13'));
				$pdf->SetAligns(array('C','R','L','R','R','R','R','R','R','R','R','R','R','R'));

				if($detail->auto_jml == 1){
					$pdf->setFont('Arial','B','7');
					$awaldet = $this->ereport->lap_subhead_tot($detail->id, $bulan, $tahun);
					$ubahdet = $this->ereport->lap_subhead_tot($detail->id, $bulan, $tahun,"ubah");
					$swakeloladet = $this->ereport->lap_subhead_tot($detail->id, $bulan, $tahun,"swakelola");
					$kontrakdet = $this->ereport->lap_subhead_tot($detail->id, $bulan, $tahun, "kontrak");
					$serapdet = $this->ereport->lap_subhead_tot($detail->id, $bulan, $tahun,"serap");
				}else{
					$pdf->setFont('Arial','','7');
					$awaldet = $this->ereport->lap_subhead($detail->id, $bulan,$tahun);
					$ubahdet = $this->ereport->lap_subhead($detail->id, $bulan,$tahun,"ubah");
					$swakeloladet = $this->ereport->lap_subhead($detail->id, $bulan,$tahun,"swakelola");
					$kontrakdet = $this->ereport->lap_subhead($detail->id, $bulan,$tahun,"kontrak");
					$serapdet = $this->ereport->lap_subhead($detail->id, $bulan,$tahun,"serap");

				}

				if($ubahdet <> 0 && $serapdet <> 0){
					$serappersen_det = $serapdet/$ubahdet*100;
				}else{
					$serappersen_det = 0;
				}

				$realfisik_det = $this->ereport->realfisik_subhead($detail->id, $bulan,$tahun);
				$target_det = $this->ereport->target_subhead($detail->id, $bulan,$tahun);
				$selisih_det = $realfisik_det - $target_det;

				$pdf->Row(array(
					'',
					$detail->kode,
					$detail->nama_detail,
					number_format($awaldet,0,",","."),
					number_format($ubahdet,0,",","."),
					number_format($swakeloladet,0,",","."),
					number_format($kontrakdet,0,",","."),
					number_format($serapdet,0,",","."),
					number_format($serappersen_det,2,",","."),
					number_format($realfisik_det,2,",","."),
					number_format($target_det,2,",","."),
					number_format($selisih_det,2,",","."),
					'-',
					'-'
				));

				$subdetails = $this->lap->tampil_detail($detail->id);
				if(!empty($subdetails)){
					$cek = 0;
					foreach($subdetails as $subdetail):
						$pdf->SetWidths(array('7','40','75','25','25','21','24','30','15','15','15','15','13','13'));
						$pdf->SetAligns(array('C','R','L','R','R','R','R','R','R','R','R','R','R','R'));

						if($subdetail->auto_jml == 1){
							$pdf->setFont('Arial','B','7');
							$awalsubdet = $this->ereport->lap_subhead_tot($subdetail->id, $bulan, $tahun);
							$ubahsubdet = $this->ereport->lap_subhead_tot($subdetail->id, $bulan, $tahun,"ubah");
							$swakelolasubdet = $this->ereport->lap_subhead_tot($subdetail->id, $bulan, $tahun,"swakelola");
							$kontraksubdet = $this->ereport->lap_subhead_tot($subdetail->id, $bulan, $tahun, "kontrak");
							$serapsubdet = $this->ereport->lap_subhead_tot($subdetail->id, $bulan, $tahun,"serap");
						}else{
							$pdf->setFont('Arial','','7');
							$awalsubdet = $this->ereport->lap_subhead($subdetail->id, $bulan,$tahun);
							$ubahsubdet = $this->ereport->lap_subhead($subdetail->id, $bulan,$tahun,"ubah");
							$swakelolasubdet = $this->ereport->lap_subhead($subdetail->id, $bulan,$tahun,"swakelola");
							$kontraksubdet = $this->ereport->lap_subhead($subdetail->id, $bulan,$tahun,"kontrak");
							$serapsubdet = $this->ereport->lap_subhead($subdetail->id, $bulan,$tahun,"serap");

						}

						if($ubahdet <> 0 && $serapdet <> 0){
							$serappersen_subdet = $serapdet/$ubahdet*100;
						}else{
							$serappersen_subdet = 0;
						}

						$realfisik_subdet = $this->ereport->realfisik_subhead($subdetail->id, $bulan,$tahun);
						$target_subdet = $this->ereport->target_subhead($subdetail->id, $bulan,$tahun);
						$selisih_subdet = $realfisik_det - $target_det;

						$pdf->Row(array(
							'',
							$subdetail->kode,
							$subdetail->nama_detail,
							number_format($awalsubdet,0,",","."),
							number_format($ubahsubdet,0,",","."),
							number_format($swakelolasubdet,0,",","."),
							number_format($kontraksubdet,0,",","."),
							number_format($serapsubdet,0,",","."),
							number_format($serappersen_subdet,2,",","."),
							number_format($realfisik_subdet,2,",","."),
							number_format($target_subdet,2,",","."),
							number_format($selisih_subdet,2,",","."),
							'-',
							'-'
						));

						$subsubdetails = $this->lap->tampil_detail($subdetail->id);
						if(!empty($subsubdetails)){
							$cek = 0;
							foreach($subsubdetails as $subsubdetail):
								$pdf->SetWidths(array('7','40','75','25','25','21','24','30','15','15','15','15','13','13'));
								$pdf->SetAligns(array('C','R','L','R','R','R','R','R','R','R','R','R','R','R'));

								if($subsubdetail->auto_jml == 1){
									$pdf->setFont('Arial','B','7');
									$awalsubsubdet = $this->ereport->lap_subhead_tot($subsubdetail->id, $bulan, $tahun);
									$ubahsubsubdet = $this->ereport->lap_subhead_tot($subsubdetail->id, $bulan, $tahun,"ubah");
									$swakelolasubsubdet = $this->ereport->lap_subhead_tot($subsubdetail->id, $bulan, $tahun,"swakelola");
									$kontraksubsubdet = $this->ereport->lap_subhead_tot($subsubdetail->id, $bulan, $tahun, "kontrak");
									$serapsubsubdet = $this->ereport->lap_subhead_tot($subsubdetail->id, $bulan, $tahun,"serap");
								}else{
									$pdf->setFont('Arial','','7');
									$awalsubsubdet = $this->ereport->lap_subhead($subsubdetail->id, $bulan,$tahun);
									$ubahsubsubdet = $this->ereport->lap_subhead($subsubdetail->id, $bulan,$tahun,"ubah");
									$swakelolasubsubdet = $this->ereport->lap_subhead($subsubdetail->id, $bulan,$tahun,"swakelola");
									$kontraksubsubdet = $this->ereport->lap_subhead($subsubdetail->id, $bulan,$tahun,"kontrak");
									$serapsubsubdet = $this->ereport->lap_subhead($subsubdetail->id, $bulan,$tahun,"serap");

								}

								if($ubahdet <> 0 && $serapdet <> 0){
									$serappersen_subsubdet = $serapdet/$ubahdet*100;
								}else{
									$serappersen_subsubdet = 0;
								}

								$realfisik_subsubdet = $this->ereport->realfisik_subhead($subsubdetail->id, $bulan,$tahun);
								$target_subsubdet = $this->ereport->target_subhead($subsubdetail->id, $bulan,$tahun);
								$selisih_subsubdet = $realfisik_det - $target_det;

								$pdf->Row(array(
									'',
									$subsubdetail->kode,
									$subsubdetail->nama_detail,
									number_format($awalsubsubdet,0,",","."),
									number_format($ubahsubsubdet,0,",","."),
									number_format($swakelolasubsubdet,0,",","."),
									number_format($kontraksubsubdet,0,",","."),
									number_format($serapsubsubdet,0,",","."),
									number_format($serappersen_subsubdet,2,",","."),
									number_format($realfisik_subsubdet,2,",","."),
									number_format($target_subsubdet,2,",","."),
									number_format($selisih_subsubdet,2,",","."),
									'-',
									'-'
								));

							endforeach;
						}
					endforeach;
				}
			endforeach;
			}	
		endforeach;
		}	
	endforeach;

	$pdf->SetFont('Arial','',8);
	$pdf->Ln(8);
	$pdf->SetX(230);
	$pdf->Cell(40,6,'Pemalang, '.date('d').' '.$this->fungsiku->bulan_full(intval(date('m'))).' '.date('Y'),0,0,'C');
	$pdf->Ln();
	$pdf->SetX(230);
	$pdf->Cell(40,5,'KEPALA DINAS PEKERJAAN UMUM',0,0,'C');
	$pdf->Ln();
	$pdf->SetX(230);
	$pdf->Cell(40,5,'KABUPATEN PEMALANG',0,0,'C');
	$pdf->Ln(25);

	$pdf->SetX(230);
	$pdf->Cell(40,5,'Ir. SUDARYONO, CES',0,0,'C');
	$pdf->SetFont('Arial','',7);
	$pdf->Ln();
	$pdf->SetX(230);
	$pdf->Cell(40,4,'Pembina Utama Muda',0,0,'C');
	$pdf->Ln();
	$pdf->SetX(230);
	$pdf->Cell(40,4,'NIP. 196000722 1990002 1 001',0,0,'C');

//the output
$pdf->Output('laporan_kegiatan_'.$tahun.'.pdf','I');