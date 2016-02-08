<?php

class Modgallery extends CI_Controller{
	
	function __construct()
    {
    	parent::__construct();
    	$this->load->model('m_gallery','gallery');
    	$this->load->library('reginalib');
    }



    function index()
    {
    	saya_masuk();
    	saya_admin();

    	$get = $this->db->get('mod_gallery');
        $config['base_url'] = site_url().'/modgallery/index';
        $config['per_page'] = 30;
        $config['total_rows'] = $get->num_rows();
        $config['next_page'] = '&raquo;';
        $config['prev_page'] = '&laquo;';

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['query'] = $this->gallery->show_galleries($config['per_page'], $this->uri->segment(3));
        $data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head');
    	$this->load->view('modgallery/gallery_view', $data);
    	$this->load->view('foot');
    }



    function addgallery(){
        saya_masuk();
        saya_admin();

        $this->form_validation->set_rules('nama','Title','required|trim');
        $this->form_validation->set_rules('deskripsi','Description','required|trim');
        $this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');

        if($this->form_validation->run() == FALSE){
            
            $this->load->view('head');
            $this->load->view('modgallery/gallery_add');
            $this->load->view('foot');
        
        }else{

            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $featimage = $this->input->post('featuredimage');
            $now = date('Y-m-d h:i:s');
            $userid = $this->session->userdata('id');

            $data = array(
                'image_title'=>$nama,
                'image_description'=>$deskripsi,
                'image_file'=>$featimage,
                'input_date'=>$now,
                'input_by'=>$userid
                );

            $this->gallery->saving_gallery($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> Data has been successfull insert.</div>');
            redirect('modgallery');
            
            //echo var_dump($fiturkamar);
        }
    }



    function edit($id)
    {
        if(!$id || empty($id)){
            redirect('modgallery');
        }else{

            saya_masuk();
            saya_admin();

            $this->form_validation->set_rules('nama','Nama Kamar','required|trim');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
            $this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');

            if($this->form_validation->run() == FALSE){
                
                $data['query'] = $this->gallery->get_gallery($id);

                $this->load->view('head');
                $this->load->view('modgallery/gallery_edit', $data);
                $this->load->view('foot');
            
            }else{

                $nama = $this->input->post('nama');
	            $deskripsi = $this->input->post('deskripsi');
	            $featimage = $this->input->post('featuredimage');
	            $now = date('Y-m-d h:i:s');
	            $userid = $this->session->userdata('id');

	            $data = array(
	                'image_title'=>$nama,
	                'image_description'=>$deskripsi,
	                'image_file'=>$featimage
	                );


                $this->gallery->update_gallery($data, $id);
                $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> Data has been updated.</div>');
                redirect('modgallery');
                
                //echo var_dump($fiturkamar);
            }

        }
    }



    function delete($id)
    {
        saya_masuk();
        saya_admin();
        if(!$id || empty($id)){
            redirect('modgallery');
        }else{

            $this->gallery->delete_gallery($id);

            $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> Data has been deleted.</div>');
            redirect('modgallery');
        }
    }


    //ini untuk front page

    function show()
    {
        $data['set'] = $this->m_setting->ambil_setting();

        $this->load->view('themes/'.$data['set']->themes.'/head', $data);
        $this->load->view('themes/'.$data['set']->themes.'/gallery');
        $this->load->view('themes/'.$data['set']->themes.'/foot');
    }


    function get_pict()
    {
        $data['set'] = $this->m_setting->ambil_setting();
        $data['galleries'] = $this->gallery->show_galleries(null, null);
        
        $this->load->view('themes/'.$data['set']->themes.'/gallery_frame', $data);
    }

//end of class
}    