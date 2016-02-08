<?php

class Auth extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->model('m_auth');
  }


  public function index()
	{
		$session = $this->session->userdata('isLogin');

		if($session == FALSE)
		{
			redirect('auth/login');		
		}else
		{
			redirect('depan');     
		}			
	}
	
	public function login(){
		if($this->session->userdata('isLogin') == TRUE){
			redirect('depan');
		}else{
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|max_length[20]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]|md5');
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">','</div>');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('login');
			}else
			{
				$username = $this->input->post('username');	
				$password = $this->input->post('password');

				$cek = $this->m_auth->cek_pengguna($username, $password);
				$set = $this->m_setting->ambil_setting();

				if($cek->num_rows() <> 0)
				{
					$user = $cek->row();
					$this->session->set_userdata('isLogin', TRUE);
					$this->session->set_userdata('id', $user->id);
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('role', $user->role);
					$this->session->set_userdata('namalengkap', $user->nama_lengkap);
					$this->session->set_userdata('logindate', $user->login_date);
					$this->session->set_userdata('ip_login', $user->ip_login);

					//input data terakhir
					$now = date('Y-m-d h:i:s');
					$ip = $_SERVER['REMOTE_ADDR'];
					$data_user = array(
					'login_date'=>$now,
					'ip_login'=>$ip
					);
					
					$this->m_auth->update_data_user($data_user, $username);

					redirect('depan');
				}else
				{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username dan Password salah!</div>');
					redirect('auth/login');
				}	
			}
		}
	}
	
	
	public function logout()
	{
		$this->session->sess_destroy();
		
		redirect('auth/login');
	}

//end of class	
}