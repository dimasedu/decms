<?php

class Admincategory extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_category','category');
    }


    function index()
    {
    	$get = $this->db->get_where('post_category', array('enabled'=>1));
    	$config['base_url'] = site_url().'/admincategory/index';
		$config['per_page'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_page'] = '&raquo;';
    	$config['prev_page'] = '&laquo;';
    	$config['last_page'] = 'Akhir';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->category->show_category($config['per_page'], $this->uri->segment(3))->result();
    	$data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head', $data);
    	$this->load->view('posts/category_view', $data);
    	$this->load->view('foot');
    }


    function addcategory()
	{
		$this->form_validation->set_rules('title', 'Category Name','required|trim');
		$this->form_validation->set_rules('slug', 'Slug','required|trim');
		$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

		if($this->form_validation->run() == FALSE){

			$data['parent'] = $this->category->show_category()->result();

			$this->load->view('head');
	    	$this->load->view('posts/category_add', $data);
	    	$this->load->view('foot');
		}else{
			$title = $this->input->post('title');
			$slug = $this->input->post('slug');
			$parent = $this->input->post('parent');
			$now = date('Y-m-d h:i:s');
			$userid = $this->session->userdata('id');

			$data = array(
				'category_name'=>$title,
				'slug'=>$slug,
				'parent_id'=>$parent,
				'input_date'=>$now,
				'input_by'=>$userid,
				'enabled'=>1
				);

			$this->category->saving_category($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> New Category has been Created.</div>');
		
			redirect('admincategory');
		}
	}


	function edit($id)
	{
		if(!$id){
			redirect('admincategory');
		}else{
			$this->form_validation->set_rules('title', 'Category Name','required|trim');
			$this->form_validation->set_rules('slug', 'Slug','required|trim');
			$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

			if($this->form_validation->run() == FALSE){
				$data['query'] = $this->category->get_category($id);
				$data['parent'] = $this->category->show_category()->result();
				

				$this->load->view('head');
		    	$this->load->view('posts/category_edit', $data);
		    	$this->load->view('foot');
			}else{

				$title = $this->input->post('title');
				$slug = $this->input->post('slug');
				$parent = $this->input->post('parent');
				$now = date('Y-m-d h:i:s');
				$userid = $this->session->userdata('id');

				$data = array(
					'category_name'=>$title,
					'slug'=>$slug,
					'parent_id'=>$parent
					);

				$this->category->update_category($data, $id);
				$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!!</b> Update Category is Successfull.</div>');
			
				redirect('admincategory');
			}
		}
	}


	function delete($id)
	{
		if(!$id){
			redirect('admincategory');
		}else{
			
			$data = array('enabled'=>0);

			$this->page->update_page($data, $id);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> Category has been removed</div>');
			
			redirect('admincategory');
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

//end of class
}    