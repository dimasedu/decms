<?php

class Modcomments extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_comment','com');
    }


    function index()
    {
    	$get = $this->db->get('post');
    	$config['base_url'] = site_url().'/post/index';
		$config['per_post'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_post'] = '&raquo;';
    	$config['prev_post'] = '&laquo;';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->com->show_comments($config['per_post'], $this->uri->segment(3));
    	$data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head', $data);
    	$this->load->view('modcomments/comment_view', $data);
    	$this->load->view('foot');
    }


    function approve($id)
    {
    	if(!$id || empty($id)){
    		redirect('modcomments');
    	}else{
    		$data = array('comment_approved'=>1);

    		$this->com->update_comment($data, $id);
    		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b>Comment has been approved.</div>');
		
			redirect('modcomments');
    	}
    }



    function reply()
    {
    	$this->form_validation->set_rules('replytext','Reply Text','required');
    	$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

    	if($this->form_validation->run() == FALSE){

    		$data['query'] = $this->com->get_comment($id);

			$this->load->view('head');
	    	$this->load->view('modcomments/comment_reply', $data);
	    	$this->load->view('foot');
		}else{
			$title = $this->input->post('title');
			$slug = $this->input->post('slug');
			$now = date('Y-m-d h:i:s');
			$userid = $this->session->userdata('id');

			$data = array(
				'category_name'=>$title,
				'slug'=>$slug,
				'input_date'=>$now,
				'input_by'=>$userid,
				'enabled'=>1
				);

			$this->category->saving_category($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> New Category has been Created.</div>');
		
			redirect('admincategory');
		}
    }

    

//end of class
}    