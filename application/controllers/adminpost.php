<?php

class Adminpost extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_post','post');
    }


    function index()
    {
    	$get = $this->db->get('post');
    	$config['base_url'] = site_url().'/post/index';
		$config['per_post'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_post'] = '&raquo;';
    	$config['prev_post'] = '&laquo;';
    	$config['last_post'] = 'Akhir';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->post->show_post($config['per_post'], $this->uri->segment(3))->result();
    	$data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head', $data);
    	$this->load->view('posts/post_view', $data);
    	$this->load->view('foot');
    }


    function addpost()
	{
		$this->form_validation->set_rules('title', 'Title Post','required|trim');
		$this->form_validation->set_rules('textbody', 'Post Body','required|trim');
		$this->form_validation->set_rules('category','Category','required');
		$this->form_validation->set_rules('featuredimage', 'Featured Image','trim');
		$this->form_validation->set_rules('metadesc', 'Meta Description','trim');
		$this->form_validation->set_rules('metaname', 'Meta Name','trim');
		$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

		if($this->form_validation->run() == FALSE){

			$data['categories'] = $this->post->show_category();

			$this->load->view('head');
	    	$this->load->view('posts/post_add', $data);
	    	$this->load->view('foot');
		}else{
			$title = $this->input->post('title');
			$textbody = $this->input->post('textbody');
			$metaname = $this->input->post('metaname');
			$metadesc = $this->input->post('metadesc');
			$category = $this->input->post('category');
			$featuredimage = $this->input->post('featuredimage');
			$now = date('Y-m-d h:i:s');
			$userid = $this->session->userdata('id');

			$data = array(
				'post_title'=>$title,
				'post_text'=>$textbody,
				'meta_title'=>$metaname,
				'meta_desc'=>$metadesc,
				'category_id'=>$category,
				'featimage'=>$featuredimage,
				'publish'=>1,
				'input_date'=>$now,
				'input_by'=>$userid
				);

			$this->post->saving_post($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> New post has been Created.</div>');
		
			redirect('adminpost');
		}
	}


	function edit($id)
	{
		if(!$id){
			redirect('adminpost');
		}else{
			$this->form_validation->set_rules('title', 'Title post','required|trim');
			$this->form_validation->set_rules('textbody', 'post Body','required|trim');
			$this->form_validation->set_rules('featuredimage', 'Featured Image','trim');
			$this->form_validation->set_rules('category','Category','required');
			$this->form_validation->set_rules('metadesc', 'Meta Description','trim');
			$this->form_validation->set_rules('metaname', 'Meta Name','trim');
			$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

			if($this->form_validation->run() == FALSE){
				$data['query'] = $this->post->get_post($id);
				$data['categories'] = $this->post->show_category();			

				$this->load->view('head');
		    	$this->load->view('posts/post_edit', $data);
		    	$this->load->view('foot');
			}else{

				$title = $this->input->post('title');
				$textbody = $this->input->post('textbody');
				$metaname = $this->input->post('metaname');
				$metadesc = $this->input->post('metadesc');
				$category = $this->input->post('category');
				$featuredimage = $this->input->post('featuredimage');
				$now = date('Y-m-d h:i:s');
				$userid = $this->session->userdata('id');

				$data = array(
					'post_title'=>$title,
					'post_text'=>$textbody,
					'meta_title'=>$metaname,
					'meta_desc'=>$metadesc,
					'featimage'=>$featuredimage,
					'category_id'=>$category
					);

				$this->post->update_post($data, $id);
				$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!!</b> Update post is Successfull.</div>');
			
				redirect('adminpost');
			}
		}
	}


	function delete($id)
	{
		if(!$id){
			redirect('adminpost');
		}else{
			
			$this->post->delete_post($id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> That post has been removed</div>');
			
			redirect('adminpost');
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
		$data['query'] = $this->post->show_image();

		$this->load->view('adminpost/featimage_show',$data);

	}


	function ceknama($str){
		$query = $this->fungsiku->ceknama('post', 'namapost', $str);

		if($query <> 0){
			$this->form_validation->set_message('ceknama','Maaf data yang anda masukkan sudah ada di database.');

			return FALSE;
		}else{
			return TRUE;
		}
	}

//end of class
}    