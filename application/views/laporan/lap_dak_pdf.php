<?php

$tahun = date('Y');
$pdf = new Cetak();

$pdf->FPDF('L','mm','Legal');
$pdf->AddPage();
$pdf->AliasNbPages();
//$pdf->SetMargins(100,150,100);


$pdf->SetFont('Arial','B','8');
$pdf->Cell(330,4,'LAPORAN KEMAJUAN PER TRIWULAN ',0,0,'C');
$pdf->Ln();
$pdf->Cell(330,4,'DANA ALOKASI KHUSUS (DAK)',0,0,'C');
$pdf->Ln();
$pdf->Cell(330,4,'DINAS PEKERJAAN UMUM KABUPATEN PEMALANG TAHUN ANGGARAN '.$tahun,0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','',8);
$pdf->Cell(50,4,'Propinsi ',0,0);
$pdf->Cell(5,4,':',0,0);
$pdf->Cell(50,4,'Jawa Tengah',0,0);
$pdf->Ln();

$pdf->Cell(50,4,'Kabupaten/Kota ',0,0);
$pdf->Cell(5,4,':',0,0);
$pdf->Cell(50,4,'Kabupaten Pemalang',0,0);
$pdf->Ln();

$pdf->Cell(50,4,'Bulan ',0,0);
$pdf->Cell(5,4,':',0,0);
$pdf->Cell(50,4,$this->fungsiku->bulan_full((int)$bulan),0,0);
$pdf->Ln(8);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(5,20,'No',1,0,'C');
$pdf->Cell(70,20,'KEGIATAN',1,0,'C');
$pdf->SetFont('Arial','B',7);
$pdf->Cell(119,5,'PERENCANAAN KEGIATAN',1,0,'C');

$pdf->SetX(204);
$pdf->SetWidths(array('30'));
$pdf->SetAligns(array('C'));
$pdf->Row(array("PELAKSANAAN KEGIATAN"));

$pdf->SetY($pdf->GetY() - 10);
$pdf->SetX(234);
$pdf->Cell(35,10,'REALISASI',1,0,'C');

$pdf->SetFont('Arial','B',6);
$pdf->SetX(269);
$pdf->SetWidths(array('20','20','20'));
$pdf->SetAligns(array('C','C','C','C','C'));
$pdf->Row(array("Kesesuaian\nsasaran dan\nlokasi\ndengan SKPD","Kesesuaian antara DPA-SKPD dengan petunjuk teknis","Kodefikasi\nMasalah"));

$pdf->Ln();

$pdf->SetFont('Arial','',7);
$pdf->SetY($pdf->GetY() - 20);
$pdf->SetX(85);
$pdf->Cell(26,15,'Volume',1,0,'C');
$pdf->Cell(15,15,'Satuan',1,0,'C');
$pdf->SetX(126);
$pdf->SetWidths(array('25','16','20','17'));
$pdf->SetAligns(array('C','C','C','C'));
$pdf->Row(array("Jumlah\nPenerima\nManfaat","DAK\n(Rp 0.000)","Pendampingan\n(Rp 0.000)","TOTAL\n(Rp 0.000)"));

$pdf->SetY($pdf->GetY() - 10);
$pdf->SetX(204);
$pdf->SetWidths(array('15','15'));
$pdf->SetAligns(array('C','C'));
$pdf->Row(array("Swakelola\n(Rp 0.000)","Kontrak\n(Rp 0.000)"));

$pdf->SetY($pdf->GetY() - 10);
$pdf->SetX(234);
$pdf->Cell(25,4,'Keuangan',1,0,'C');
$pdf->SetX(259);
$pdf->SetWidths(array('10'));
$pdf->SetAligns(array('C'));
$pdf->Row(array("Fisik\n(%)"));

$pdf->Ln();
$pdf->SetY($pdf->GetY() - 11);
$pdf->SetX(234);
$pdf->Cell(15,6,'(Rp 0.000)',1,0,'C');
$pdf->Cell(10,6,'(%)',1,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',7);

$pdf->SetWidths(array('5','70','7','9','10','15','25','16','20','17','15','15','15','10','10','20','20','20'));
$pdf->SetAligns(array('C','L','C','C','C','L','L','R','R','R','R','R','R','R','R'));
$pdf->Row(array(
	'19',
	'Kabupaten Pemalang',
	'keg',
	'paket',
	'unit',
	'',
	'',
	number_format($this->ereport->total_all_dak("dak", $bulan, $tahun),0,",","."),
    number_format($this->ereport->total_all_dak("pendamping",$bulan, $tahun),0,",","."),
    number_format($this->ereport->total_all_dak("dak", $bulan, $tahun) + $this->ereport->total_all_dak("pendamping", $bulan, $tahun),0,",","."),
    number_format($this->ereport->total_all_dak("swakelola", $bulan, $tahun),0,",","."),
    number_format($this->ereport->total_all_dak("kontrak", $bulan, $tahun),0,",","."),
	'-',
	'-',
	'-',
	'-',
	'-',
	'-'
	));
$pdf->SetFont('Arial','B',7);
	if(!empty($head)){
		$no = 0;
		foreach($head as $rowhead):
			$pdf->SetFont('Arial','B',7);
			$no++;
			$pdf->SetWidths(array('5','70','7','9','10','15','25','16','20','17','15','15','15','10','10','20','20','20'));
			$pdf->SetAligns(array('C','L','C','R','R','L','L','R','R','R','R','R','R','R','R'));
					
			$pdf->Row(array(
				$no,
				$rowhead->nama_kegiatan,
				'1',
				$this->ereport->total_lap_dak($rowhead->id),
				number_format($this->ereport->total_lap_dak($rowhead->id,"unit"),0,",","."),
				'keg/pkt/km',
				'Inst, masyarakat',
				number_format($this->ereport->total_lap_dak($rowhead->id,"dak"),0,",","."),
                number_format($this->ereport->total_lap_dak($rowhead->id,"pendamping"),0,",","."),
                number_format($this->ereport->total_lap_dak($rowhead->id,"dak") + $this->ereport->total_lap_dak($rowhead->id,"pendamping"),0,",","."),
                number_format($this->ereport->total_lap_dak($rowhead->id,"swakelola"),0,",","."),
                number_format($this->ereport->total_lap_dak($rowhead->id,"kontrak"),0,",","."),
				'-',
				'-',
				'-',
				'-',
				'-',
				'-'
				));

			$subhead = $this->lap->tampil_dak_subhead($rowhead->id);

			if(!empty($subhead)){
				$nosub = 0;
				foreach($subhead as $rowsub):

					$pdf->SetFont('Arial','',7);
					$nosub++;
					$pdf->SetWidths(array('5','70','7','9','10','15','25','16','20','17','15','15','15','10','10','20','20','20'));
					$pdf->SetAligns(array('C','L','C','R','R','L','L','R','R','R','R','R','R','R','R'));
							
					$pdf->Row(array(
						'',
						$nosub.'. '.$rowsub->nama_kegiatan,
						'1',
						$this->ereport->tampil_paket_dak($rowsub->id),
						number_format($this->ereport->tampil_unit_dak($rowsub->id),0,",","."),
						'keg/pkt/km',
						'Inst, masyarakat',
						number_format($this->ereport->tampil_jumlah_dak($rowsub->id),0,",","."),
						number_format($this->ereport->tampil_pendamping_dak($rowsub->id),0,",","."),
						number_format($this->ereport->tampil_jumlah_dak($rowsub->id) + $this->ereport->tampil_pendamping_dak($rowsub->id),0,",","."),
						'-',
						'-',
						'-',
						'-',
						'-',
						'-',
						'-',
						'-'
						));


					$detail = $this->lap->tampil_dak_detail($rowsub->id);

					if(!empty($detail)){
						$nodet = 0;

						foreach($detail as $rowdet):
							$total = $rowdet->jml_dak + $rowdet->jml_pendamping;
							if($rowdet->swakelola <> 0){ 
								$swakeloladet = number_format($rowdet->swakelola,0,",",".");
							}else{ 
								$swakeloladet = '-';
							}


							if($rowdet->kontrak <> 0){ 
								$kontrakdet = number_format($rowdet->kontrak,0,",",".");
							}else{ 
								$kontrakdet = '-';
							}

							if($rowdet->real_rp <> 0){ 
								$rpdet = number_format($rowdet->real_rp,0,",",".");
							}else{ 
								$rpdet = '-';
							}

							if($rowdet->real_rp <> 0 && $total <> 0){
								$serap_persendet = number_format($rowdet->real_rp/$total*100,2,",",".");
							}else{
								$serap_persendet = "-";
							}


							$pdf->SetFont('Arial','',7);
							$nodet++;
							$pdf->SetWidths(array('5','70','7','9','10','15','25','16','20','17','15','15','15','10','10','20','20','20'));
							$pdf->SetAligns(array('C','L','C','R','R','C','C','R','R','R','R','R','R','R','R'));
							$pdf->Row(array('',
								'   '.$nodet.'. '.$rowdet->nama_kegiatan,
								'',
								$rowdet->vol_paket,
								number_format($rowdet->vol_unit,0,",","."),
								'',
								'',
								number_format($rowdet->jml_dak,0,",","."),
								number_format($rowdet->jml_pendamping,0,",","."),
								number_format($total,0,",","."),
								$swakeloladet,
								$kontrakdet,
								number_format($rowdet->real_rp,0,",","."),
								$serap_persendet,
								number_format($rowdet->real_fisik,2,",","."),
								'',
								'',
								''
								));

						endforeach;	
					}		

					
				endforeach;

			}

		endforeach;
	}
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
$pdf->Output('laporan_dak_'.$this->fungsiku->bulan_full((int)$bulan).'-'.$tahun.'.pdf','I');