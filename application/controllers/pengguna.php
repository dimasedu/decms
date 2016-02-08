<?php 

class Pengguna extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_pengguna','pengguna');
	}


	function index(){
		$get = $this->db->get('users');

		$config['base_url'] = site_url().'/pengguna/index';
		$config['per_page'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_page'] = '&raquo;';
    	$config['prev_page'] = '&laquo;';
    	$config['first_page'] = 'Awal';
    	$config['last_page'] = 'Akhir';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->pengguna->tampilpengguna($config['per_page'], $this->uri->segment(3));
		//$data['menu'] = $this->m_modul->tampil_menu($this->session->userdata('id'));

    	$this->load->view('head', $data);
    	$this->load->view('pengguna/pengguna_view', $data);
    	$this->load->view('foot');
	}


	function tambah(){
		$this->form_validation->set_rules('username','Username', 'required|min_length[5]|max_length[20]|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('password','Password', 'required|min_length[5]|max_length[20]|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('nama','Nama Anda', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_message('min_length','%s minimal 5 karakter.');
		$this->form_validation->set_message('max_length','%s maximal 20 karakter.');
		$this->form_validation->set_message('alpha_numeric','%s harus terdiri dari huruf dan angka');
		
		if($this->form_validation->run() == FALSE){

			$this->load->view('head');
			$this->load->view('pengguna/pengguna_tambah');
			$this->load->view('foot');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			$aktif = $this->input->post('aktif');
			$role = $this->input->post('role');

			$data = array(
				'username'=> $username,
				'password'=>md5($password),
				'nama_lengkap'=>$nama,
				'role'=>$role,
				'status'=>$aktif);

			$this->pengguna->simpan_pengguna($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Sukses! </b>Data barang berhasil ditambahkan.</div>');
			
			redirect('modul/tambah/'.$username);
		}
	}


	function ubah($id){
		$this->form_validation->set_rules('username','Username', 'required|min_length[5]|max_length[20]|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('password','Password', 'min_length[5]|max_length[20]|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('nama','Nama Anda', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');
		$this->form_validation->set_message('required','%s tidak boleh kosong.');
		$this->form_validation->set_message('min_length','%s minimal 5 karakter.');
		$this->form_validation->set_message('max_length','%s maximal 20 karakter.');
		$this->form_validation->set_message('alpha_numeric','%s harus terdiri dari huruf dan angka');
		
		if($this->form_validation->run() == FALSE){
			$data['query'] = $this->pengguna->ambil_pengguna($id);

			$this->load->view('head');
			$this->load->view('pengguna/pengguna_ubah', $data);
			$this->load->view('foot');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama = $this->input->post('nama');
			$aktif = $this->input->post('aktif');
			$role = $this->input->post('role');

			if(!empty($password)){
				$data = array(
				'username'=> $username,
				'password'=>md5($password),
				'nama_lengkap'=>$nama,
				'role'=>$role,
				'status'=>$aktif);				
			}else{
				$data = array(
				'username'=> $username,
				'nama_lengkap'=>$nama,
				'aktif'=>$aktif,
				'role'=>$role);

			}

			$this->pengguna->ubah_pengguna($data, $id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Sukses! </b>Data Pengguna berhasil diubah.</div>');
			
			redirect('pengguna');
		}
	}


	function disable($id){
		$data = array(
			'status'=>0
			);

		$this->pengguna->ubah_pengguna($data, $id);
		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Sukses! </b>Data Pengguna berhasil dinon-aktifkan.</div>');
			
			redirect('pengguna');
	}


	function enable($id){
		$data = array(
			'status'=>1
			);

		$this->pengguna->ubah_pengguna($data, $id);
		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Sukses! </b>Data Pengguna berhasil dinon-aktifkan.</div>');
			
			redirect('pengguna');
	}

//end of class
}	