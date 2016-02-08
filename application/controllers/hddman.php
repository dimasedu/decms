<?php

class Hddman extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper(array('download','file'));
	}


	function index(){
		redirect('hddman/backup');
	}


	function backup(){
		$now = date('d-m-Y');
		$this->load->dbutil();
		
		$config =  array(
			'format'=>'txt',
			'filename'=>'backup.sql'
			);

		$backup =& $this->dbutil->backup($config);
		$file_name = 'backup-'.$now.'.sql';

		force_download($file_name, $backup);
	}


	function restore(){
		$data['error'] = '';

		$this->load->view('head', $data);
		$this->load->view('setting/restore_form', $data);
		$this->load->view('foot');
	}


	function prosesrestore(){
		$config['upload_path'] = './restoredb/';
		$config['allowed_types'] = 'sql|txt|zip|gzip';
		$config['max_size'] = 0;
		$config['overwrite'] = TRUE;

		$this->load->library('upload');
		$this->upload->initialize($config);


		if(!$this->upload->do_upload('resfile')){
			$this->upload->display_errors('<div class="alert alert-error">', '</div>');
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('head');
			$this->load->view('setting/restore_form', $error);
			$this->load->view('foot');
		}else{
			$datafile = $this->upload->data();
			$namafile = $datafile['file_name'];
			$direktori = "./restoredb/".$namafile;
			$isi_file=file_get_contents($direktori);
			$string_query=rtrim($isi_file, "\n;" );
			$array_query=explode(";", $string_query);

			$tables = $this->db->list_tables();

			foreach($tables as $table){
				$this->db->truncate($table);
			}

			foreach($array_query as $query)
			{
				$this->db->query($query);
			}


			$this->session->set_flashdata('pesan','<div class="alert alert-success"><b>Sukses!</b> Restore Database telah selesai dan berhasil.</div>');
			redirect('hddman/restore');
		}
	}


	function test()
	{
		$tables = $this->db->list_tables();

		foreach($tables as $table):
			echo "'".$table."', <br>";
		endforeach;
	}

//end of class	
}