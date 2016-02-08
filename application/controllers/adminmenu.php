<?php

class Adminmenu extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	saya_masuk();
    	saya_admin();
    	$this->load->model('m_menu','menu');
    }


    function index()
    {
    	$data['head'] = $this->menu->show_heads();

    	$this->load->view('head');
    	$this->load->view('adminmenu/menu_view', $data);
    	$this->load->view('foot');
    }


    function makingdefault($id)
    {
    	if(!$id || empty($id)){
    		redirect('adminmenu');
    	}else{
    		$data = array('comment_approved'=>1);

    		$this->com->update_comment($data, $id);
    		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b>Comment has been approved.</div>');
		
			redirect('adminmenu');
    	}
    }



    function create()
    {
    	$this->form_validation->set_rules('title','Menu Name','required');
    	$this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

    	if($this->form_validation->run() == FALSE){

			$this->load->view('head');
	    	$this->load->view('adminmenu/menu_create');
	    	$this->load->view('foot');
		}else{
			$title = $this->input->post('title');
			$now = date('Y-m-d h:i:s');
			$userid = $this->session->userdata('id');

			$data = array(
				'head_name'=>$title,
				'input_date'=>$now,
				'input_by'=>$userid
				);

			$this->menu->saving_menu($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> New Menu has been Created.</div>');
		
			redirect('adminmenu');
		}
    }


    function edit($id)
    {
        if(!$id || empty($id)){
            redirect('adminmenu');
        }else{

           if(!isset($_POST['simpan'])){

            $data['query'] = $this->menu->get_menu($id);
            $data['detail'] = $this->menu->get_menu_detail($id);
            
            $this->load->view('head');
            $this->load->view('adminmenu/menu_edit',$data);
            $this->load->view('foot');
           
           }else{
                $title = $this->input->post('title');
                $orderan = $this->input->post('menuorder');
                $default = $this->input->post('menudefault');
                $menuid = $this->input->post('menuid');

                //update menuhead
                $datahead = array(
                    'head_name'=>$title,
                    'default_menu'=>$default
                    );

                $this->menu->update_menu($datahead, $id);

                foreach($menuid as $row=>$value):
                    $menuidx = $menuid[$row];
                    $orderx = $orderan[$row];

                    $datadetail = array(
                       'menu_order'=>$orderx
                       );

                    $this->menu->update_detailmenu($datadetail, $menuidx);
                endforeach;
               

                $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> Data is successfully update.</div>');
        
                redirect('adminmenu');

           }
        }
    }

 
    function adddetail($id)
    {
        $this->form_validation->set_rules('displayname','Display Name','required');
        $this->form_validation->set_error_delimiters('<span class="label label-danger"><b>','</b></span>');

        if($this->form_validation->run() == FALSE){
            $data['categories'] = $this->menu->show_category();
            $data['pages'] = $this->menu->show_page();
            $data['parents'] = $this->menu->show_parent();

            $this->load->view('head');
            $this->load->view('adminmenu/menu_addmenu',$data);
            $this->load->view('foot');
        }else{

            $displayname = $this->input->post('displayname');
            $menutype = $this->input->post('menutype');
            $category = $this->input->post('category');
            $page = $this->input->post('pages');
            $url = $this->input->post('urllink');
            $parent = $this->input->post('parent');
            $order = (int)$this->menu->get_order();
            $now = date('Y-m-d h:i:s');

            if($menutype == "page"){
                $expage = explode("|", $page);
                $pageid = $expage[0];
                $pagename = $expage[1];

                $urltitle = url_title($pagename,"-",TRUE);
                $link = "page/".$pageid."/".$urltitle;

            }elseif($menutype == "category"){
                $excat = explode("|", $category);
                $catid = $excat[0];
                $catname = $excat[1];
                $link = "category/".$catname;
            
            }elseif($menutype == "link"){
                $link = $url;
            }  


            $data = array(
                'menu_head_id'=>$id,
                'menu_type'=>$menutype,
                'menu_name'=>$displayname,
                'menu_link'=>$link,
                'menu_parent'=>$parent,
                'menu_order'=>$order,
                );

            $this->menu->saving_detailmenu($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> New Menu has been Created.</div>');
        
            redirect('adminmenu/edit/'.$id);
        }
        
    }


    function deletedetail($headmenu, $menuid)
    {
        if(!$headmenu || empty($headmenu)){
            redirect('adminmenu/edit/'.$headmenu);
        }else{

            $this->menu->delete_detailmenu($menuid);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> Data has been permanent deleted.</div>');
        
            redirect('adminmenu/edit/'.$headmenu);
        }
    }

    

//end of class
}    