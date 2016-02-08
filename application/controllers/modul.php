<?php

class Modul extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_modul', 'modul');
	}


	function index()
	{
		redirect('user');
	}


	function tambah($user)
	{
		$this->form_validation->set_rules('mod_master','UserID','required');

		if($this->form_validation->run() == FALSE){
			$data['query'] = $this->modul->tampil_pengguna($user);
			//$data['menu'] = $this->m_modul->tampil_menu($this->session->userdata('id'));

			$this->load->view('head');
			$this->load->view('pengguna/pengguna_privillage_tambah', $data);
			$this->load->view('foot');
		}else{

			$mod_master = $this->input->post('mod_master');
			$mod_kesiswaan = $this->input->post('mod_kesiswaan');
			$mod_transaksi = $this->input->post('mod_transaksi');
			$mod_rekapitulasi = $this->input->post('mod_rekapitulasi');
			
			//master
			$mst_program = $this->input->post('mst_program');
			$mst_subprogram = $this->input->post('mst_subprogram');

			//kesiswaan
			$sis_siswa = $this->input->post('sis_siswa');
			$sis_kelas = $this->input->post('sis_kelas');
			$sis_naik = $this->input->post('sis_naik');
			$sis_tinggal = $this->input->post('sis_tinggal');
			$sis_pindah = $this->input->post('sis_pindah');
			$sis_deaktif = $this->input->post('sis_deaktif');
			$sis_lulus = $this->input->post('sis_lulus');

			//transaksi
			$trs_rab = $this->input->post('trs_rab');
			$trs_kas = $this->input->post('trs_kas');
			$trs_guru = $this->input->post('trs_guru');
			$trs_honor = $this->input->post('trs_honor');
			$trs_bank = $this->input->post('trs_bank');
			$trs_pajak = $this->input->post('trs_pajak');

			//rekapitulasi
			$rek_k1 = $this->input->post('rek_k1');
			$rek_k2 = $this->input->post('rek_k2');
			$rek_k3 = $this->input->post('rek_k3');
			$rek_k4 = $this->input->post('rek_k4');
			$rek_k5 = $this->input->post('rek_k5');
			$rek_k6 = $this->input->post('rek_k6');
			$rek_k7 = $this->input->post('rek_k7');
			$rek_k7a = $this->input->post('rek_k7a');
			$rek_02 = $this->input->post('rek_02');
			$rek_03 = $this->input->post('rek_03');

			$now = date('Y-m-d H:i:s');

			

			$data = array(
				'userid'=>$user,
				'mod_master'=>$mod_master,
				'mod_kesiswaan'=>$mod_kesiswaan,
				'mod_transaksi'=>$mod_transaksi,
				'mod_rekapitulasi'=>$mod_rekapitulasi,
				'mst_program'=>$mst_program,
				'mst_subprogram'=>$mst_subprogram,
				'sis_siswa'=>$sis_siswa,
				'sis_kelas'=>$sis_kelas,
				'sis_naik'=>$sis_naik,
				'sis_pindah'=>$sis_pindah,
				'sis_tinggal'=>$sis_tinggal,
				'sis_deaktif'=>$sis_deaktif,
				'sis_lulus'=>$sis_lulus,
				'trs_rab'=>$trs_rab,
				'trs_kas'=>$trs_kas,
				'trs_guru'=>$trs_guru,
				'trs_honor'=>$trs_honor,
				'trs_pajak'=>$trs_pajak,
				'trs_bank'=>$trs_honor,
				'rek_k1'=>$rek_k1,
				'rek_k2'=>$rek_k2,
				'rek_k3'=>$rek_k3,
				'rek_k4'=>$rek_k4,
				'rek_k5'=>$rek_k5,
				'rek_k6'=>$rek_k6,
				'rek_k7'=>$rek_k7,
				'rek_k7a'=>$rek_k7a,
				'rek_02'=>$rek_02,
				'rek_03'=>$rek_03,
				'create_date'=>$now
				);


				$this->modul->simpan_priv($data);

				$data_user = array('user_privillage'=>1);

				$this->modul->update_user($data_user, $user);
				$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Sukses! </b>Data pengguna berhasil ditambahkan serta Hak Akses pengguna berhasil.</div>');
				redirect('pengguna');	
			
		}
	}


	function edit($user)
	{
		$this->form_validation->set_rules('mod_master','UserID','required');

		if($this->form_validation->run() == FALSE){
			$data['query'] = $this->modul->tampil_pengguna($user);
			$data['mod'] = $this->modul->ambil_modul($user);
			//$data['menu'] = $this->m_modul->tampil_menu($this->session->userdata('id'));

			$this->load->view('head');
			$this->load->view('pengguna/pengguna_privillage_edit', $data);
			$this->load->view('foot');
		}else{

			$mod_master = $this->input->post('mod_master');
			$mod_kesiswaan = $this->input->post('mod_kesiswaan');
			$mod_transaksi = $this->input->post('mod_transaksi');
			$mod_rekapitulasi = $this->input->post('mod_rekapitulasi');
			
			//master
			$mst_program = $this->input->post('mst_program');
			$mst_subprogram = $this->input->post('mst_subprogram');

			//kesiswaan
			$sis_siswa = $this->input->post('sis_siswa');
			$sis_kelas = $this->input->post('sis_kelas');
			$sis_naik = $this->input->post('sis_naik');
			$sis_tinggal = $this->input->post('sis_tinggal');
			$sis_pindah = $this->input->post('sis_pindah');
			$sis_deaktif = $this->input->post('sis_deaktif');
			$sis_lulus = $this->input->post('sis_lulus');

			//transaksi
			$trs_rab = $this->input->post('trs_rab');
			$trs_kas = $this->input->post('trs_kas');
			$trs_guru = $this->input->post('trs_guru');
			$trs_honor = $this->input->post('trs_honor');
			$trs_bank = $this->input->post('trs_bank');
			$trs_pajak = $this->input->post('trs_pajak');

			//rekapitulasi
			$rek_k1 = $this->input->post('rek_k1');
			$rek_k2 = $this->input->post('rek_k2');
			$rek_k3 = $this->input->post('rek_k3');
			$rek_k4 = $this->input->post('rek_k4');
			$rek_k5 = $this->input->post('rek_k5');
			$rek_k6 = $this->input->post('rek_k6');
			$rek_k7 = $this->input->post('rek_k7');
			$rek_k7a = $this->input->post('rek_k7a');
			$rek_02 = $this->input->post('rek_02');
			$rek_03 = $this->input->post('rek_03');

			$now = date('Y-m-d H:i:s');
			$updateby = $this->session->userdata('id');

			

			$data = array(
				'mod_master'=>$mod_master,
				'mod_kesiswaan'=>$mod_kesiswaan,
				'mod_transaksi'=>$mod_transaksi,
				'mod_rekapitulasi'=>$mod_rekapitulasi,
				'mst_program'=>$mst_program,
				'mst_subprogram'=>$mst_subprogram,
				'sis_siswa'=>$sis_siswa,
				'sis_kelas'=>$sis_kelas,
				'sis_naik'=>$sis_naik,
				'sis_pindah'=>$sis_pindah,
				'sis_tinggal'=>$sis_tinggal,
				'sis_deaktif'=>$sis_deaktif,
				'sis_lulus'=>$sis_lulus,
				'trs_rab'=>$trs_rab,
				'trs_kas'=>$trs_kas,
				'trs_guru'=>$trs_guru,
				'trs_honor'=>$trs_honor,
				'trs_pajak'=>$trs_pajak,
				'trs_bank'=>$trs_honor,
				'rek_k1'=>$rek_k1,
				'rek_k2'=>$rek_k2,
				'rek_k3'=>$rek_k3,
				'rek_k4'=>$rek_k4,
				'rek_k5'=>$rek_k5,
				'rek_k6'=>$rek_k6,
				'rek_k7'=>$rek_k7,
				'rek_k7a'=>$rek_k7a,
				'rek_02'=>$rek_02,
				'rek_03'=>$rek_03,
				'update_date'=>$now,
				'update_by'=>$updateby
				);


				$this->modul->edit_priv($data, $user);
				$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Sukses! </b> Update Hak Akses berhasil.</div>');
				redirect('pengguna');	
			
		}
	}

//end of class	
}