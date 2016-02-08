<?php

class Adminpage extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_page','page');
    }


    function index()
    {
    	$get = $this->db->get('page');
    	$config['base_url'] = site_url().'/page/index';
		$config['per_page'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_page'] = '&raquo;';
    	$config['prev_page'] = '&laquo;';
    	$config['last_page'] = 'Akhir';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->page->show_page($config['per_page'], $this->uri->segment(3))->result();
    	$data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head', $data);
    	$this->load->view('adminpage/page_view', $data);
    	$this->load->view('foot');
    }


    function addpage()
	{
		$this->form_validation->set_rules('title', 'Title Page','required|trim');
		$this->form_validation->set_rules('textbody', 'Page Body','required|trim');
		$this->form_validation->set_rules('featuredimage', 'Featured Image','trim');
		$this->form_validation->set_rules('metadesc', 'Meta Description','trim');
		$this->form_validation->set_rules('metaname', 'Meta Name','trim');
		$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

		if($this->form_validation->run() == FALSE){

			$this->load->view('head');
	    	$this->load->view('adminpage/page_add');
	    	$this->load->view('foot');
		}else{
			$title = $this->input->post('title');
			$textbody = $this->input->post('textbody');
			$metaname = $this->input->post('metaname');
			$metadesc = $this->input->post('metadesc');
			$featuredimage = $this->input->post('featuredimage');
			$now = date('Y-m-d h:i:s');
			$userid = $this->session->userdata('id');

			$data = array(
				'page_title'=>$title,
				'page_body'=>$textbody,
				'meta_title'=>$metaname,
				'meta_description'=>$metadesc,
				'featimage'=>$featuredimage,
				'publish'=>1,
				'input_date'=>$now,
				'input_by'=>$userid
				);

			$this->page->saving_page($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> New Page has been Created.</div>');
		
			redirect('adminpage');
		}
	}


	function editpage($id)
	{
		if(!$id){
			redirect('adminpage');
		}else{
			$this->form_validation->set_rules('title', 'Title Page','required|trim');
			$this->form_validation->set_rules('textbody', 'Page Body','required|trim');
			$this->form_validation->set_rules('featuredimage', 'Featured Image','trim');
			$this->form_validation->set_rules('metadesc', 'Meta Description','trim');
			$this->form_validation->set_rules('metaname', 'Meta Name','trim');
			$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

			if($this->form_validation->run() == FALSE){
				$data['query'] = $this->page->get_page($id);
				

				$this->load->view('head');
		    	$this->load->view('adminpage/page_edit', $data);
		    	$this->load->view('foot');
			}else{

				$title = $this->input->post('title');
				$textbody = $this->input->post('textbody');
				$metaname = $this->input->post('metaname');
				$metadesc = $this->input->post('metadesc');
				$featuredimage = $this->input->post('featuredimage');

				$data = array(
					'page_title'=>$title,
					'page_body'=>$textbody,
					'meta_title'=>$metaname,
					'meta_description'=>$metadesc,
					'featimage'=>$featuredimage
					);

				$this->page->update_page($data, $id);
				$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!!</b> Update Page is Successfull.</div>');
			
				redirect('adminpage');
			}
		}
	}


	function deletepage($id)
	{
		if(!$id){
			redirect('adminpage');
		}else{
			
			$data = array('publish'=>0);

			$this->page->update_page($data, $id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> That Page has been removed</div>');
			
			redirect('adminpage');
		}
	}


	function cari()
	{
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');

		if(empty($kode) && empty($nama)){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger"><b>Error !</b> Silahkan lengkapi kolom pencarian.</div>');
			redirect('kegiatan');

		}elseif(!empty($nama) && strlen($nama) < 3){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger"><b>Error !</b> Silahkan isi kolom Nama Kegiatan dengan minimal 3 karakter.</div>');
			redirect('kegiatan');
		}else{
			$data['query'] = $this->pos->cari_pos($kode, $nama);
			$data['set'] = $this->m_setting->ambil_setting();

			$this->load->view('head', $data);
	    	$this->load->view('pos/pos_cari', $data);
	    	$this->load->view('foot');
		}
	}


	function showfeatimage()
	{
		$data['query'] = $this->page->show_image();

		$this->load->view('adminpage/featimage_show',$data);

	}


	function ceknama($str){
		$query = $this->fungsiku->ceknama('page', 'namapage', $str);

		if($query <> 0){
			$this->form_validation->set_message('ceknama','Maaf data yang anda masukkan sudah ada di database.');

			return FALSE;
		}else{
			return TRUE;
		}
	}

//end of class
}    