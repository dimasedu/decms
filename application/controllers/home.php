<?php

class Home extends CI_Controller
{

		
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_home','home');
		$this->load->library('reginalib');
	}


	function index()
	{
		$data['set'] = $this->m_setting->ambil_setting();
		$data['slide'] = $this->home->show_slide();
		
		$this->load->view('themes/'.$data['set']->themes.'/head', $data);
		$this->load->view('themes/'.$data['set']->themes.'/home_body', $data);
		$this->load->view('themes/'.$data['set']->themes.'/foot');
	}


	function page($id)
	{
		if(!$id || empty($id)){
			redirect('home');
		}else{
			$data['page'] = $this->home->get_page($id);
			$data['set'] = $this->m_setting->ambil_setting();
		
			$this->load->view('themes/'.$data['set']->themes.'/head', $data);
			$this->load->view('themes/'.$data['set']->themes.'/page', $data);
			$this->load->view('themes/'.$data['set']->themes.'/foot');
		}
	}


	function category($slug)
	{
		if(!$slug || empty($slug)){
			redirect('home');
		}else{

			$data['categories'] = $this->home->get_categories($slug);
			$data['cat_name'] = str_replace("-", " ", $slug);
			$data['set'] = $this->m_setting->ambil_setting();

			$this->load->view('themes/'.$data['set']->themes.'/head', $data);
			$this->load->view('themes/'.$data['set']->themes.'/category', $data);
			$this->load->view('themes/'.$data['set']->themes.'/foot');

		}
	}



	function post($id)
	{
		if(!$id || empty($id)){
			redirect('home');
		}else{
			$data['post'] = $this->home->get_post($id);
			$data['set'] = $this->m_setting->ambil_setting();

			$this->db->query("UPDATE post SET hit = (hit + 1) WHERE id = '$id'");
		
			$this->load->view('themes/'.$data['set']->themes.'/head', $data);
			$this->load->view('themes/'.$data['set']->themes.'/post', $data);
			$this->load->view('themes/'.$data['set']->themes.'/foot');
		}
	}


	function contact()
	{
		$data['set'] = $this->m_setting->ambil_setting();

		$this->load->view('themes/'.$data['set']->themes.'/head', $data);
		$this->load->view('themes/'.$data['set']->themes.'/contact');
		$this->load->view('themes/'.$data['set']->themes.'/foot');
	}


	function contactsend()
	{
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$telp = $this->input->post('telp');
		$pesan = $this->input->post('pesan');


		$this->load->library('email');

		$this->email->from($email, $nama);
		$this->email->to('tanya@nissan-tegal.com');
		$this->email->cc('edudimas1@gmail.com');
		#$this->email->bcc('them@their-example.com');

		$this->email->subject('Pesan dari pengguna website NISSAN TEGAL');
		$this->email->message($pesan);

		$this->email->send();

		$this->session->set_flashdata('pesan','<div class="alert alert-success"><b>Sukses!</b> Pesan anda berhasil dikirim.</div>');
		redirect('home/contact');
	}


//end of class	
}