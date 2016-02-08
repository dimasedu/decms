<?php

class Modproduk extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk','produk');
	}


	function index()
	{
		saya_masuk();
		saya_admin();

		$get = $this->produk->show_produk();
    	$config['base_url'] = site_url().'/modproduk/index';
		$config['per_page'] = 30;
		$config['total_rows'] = $get->num_rows();
		$config['next_page'] = '&raquo;';
    	$config['prev_page'] = '&laquo;';
    	$config['last_page'] = 'Akhir';

    	$this->pagination->initialize($config);

    	$data['halaman'] = $this->pagination->create_links();
    	$data['query'] = $this->produk->show_produk($config['per_page'], $this->uri->segment(3))->result();
    	$data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head', $data);
    	$this->load->view('modproduk/produk_view', $data);
    	$this->load->view('foot');
	}


	function tambah()
	{
		saya_masuk();
		saya_admin();

		$this->form_validation->set_rules('judul','Judul','required');

		if($this->form_validation->run() == FALSE){

			$data['set'] = $this->m_setting->ambil_setting();
			$data['category'] = $this->produk->show_category();

			$this->load->view('head', $data);
    		$this->load->view('modproduk/produk_tambah', $data);
    		$this->load->view('foot');
		}else{
			
			$judul = $this->input->post('judul');
			$deskripsi = $this->input->post('deskripsi');
			$kategori = $this->input->post('kategori');
			$image1 = $this->input->post('image1');
			$image2 = $this->input->post('image2');
			$image3 = $this->input->post('image3');
			$image4 = $this->input->post('image4');
			$image5 = $this->input->post('image5');
			$image6 = $this->input->post('image6');
			$image7 = $this->input->post('image7');
			$image8 = $this->input->post('image8');
			$now = date('Y-m-d H:i:s');

			$data = array(
				'produk_title'=>$judul,
				'produk_desc'=>$deskripsi,
				'produk_cat'=>$kategori,
				'produk_image1'=>$image1,
				'produk_image2'=>$image2,
				'produk_image3'=>$image3,
				'produk_image4'=>$image4,
				'produk_image5'=>$image5,
				'produk_image6'=>$image6,
				'produk_image7'=>$image7,
				'produk_image8'=>$image8,
				'publish'=>1,
				'input_date'=>$now
				);
			$this->produk->simpan_produk($data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Berhasil!</b> Produk berhasil ditambahkan</div>');
			redirect('modproduk');

		}	
	}


	function edit($id)
	{
		saya_masuk();
		saya_admin();

		if(!$id || empty($id)){
			redirect('modproduk');
		}else{

			$this->form_validation->set_rules('judul','Judul','required');

			if($this->form_validation->run() == FALSE){

				$data['set'] = $this->m_setting->ambil_setting();
				$data['category'] = $this->produk->show_category();
				$data['query'] = $this->produk->ambil_produk($id);

				$this->load->view('head', $data);
	    		$this->load->view('modproduk/produk_edit', $data);
	    		$this->load->view('foot');
			}else{
				
				$judul = $this->input->post('judul');
				$deskripsi = $this->input->post('deskripsi');
				$image1 = $this->input->post('image1');
				$image2 = $this->input->post('image2');
				$image3 = $this->input->post('image3');
				$image4 = $this->input->post('image4');
				$image5 = $this->input->post('image5');
				$image6 = $this->input->post('image6');
				$image7 = $this->input->post('image7');
				$image8 = $this->input->post('image8');
				$now = date('Y-m-d H:i:s');

				$data = array(
					'produk_title'=>$judul,
					'produk_desc'=>$deskripsi,
					'produk_image1'=>$image1,
					'produk_image2'=>$image2,
					'produk_image3'=>$image3,
					'produk_image4'=>$image4,
					'produk_image5'=>$image5,
					'produk_image6'=>$image6,
					'produk_image7'=>$image7,
					'produk_image8'=>$image8,
					'publish'=>1,
					);
				$this->produk->update_produk($data, $id);
				$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Berhasil!</b> Produk berhasil diupdate</div>');
				redirect('modproduk');

			}	
		}
	}


	function hapus($id)
	{
		saya_masuk();
		saya_admin();

		if(!$id || empty($id)){
			redirect('modproduk');
		}else{
			$this->produk->delete_produk($id);

			$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Berhasil!</b> Produk berhasil dihapus</div>');
				redirect('modproduk');
		}
	}


	#================================================
	#
	# SHOW THE PRODUCT
	#
	#================================================

	function show($id)
    {
        $data['set'] = $this->m_setting->ambil_setting();
        $data['query'] = $this->produk->ambil_produk($id);

        $this->load->view('themes/'.$data['set']->themes.'/head', $data);
        $this->load->view('themes/'.$data['set']->themes.'/produk_show');
        $this->load->view('themes/'.$data['set']->themes.'/foot');
    }


    function get_pict($id)
    {
        $data['set'] = $this->m_setting->ambil_setting();
        $data['query'] = $this->produk->ambil_produk($id);
        
        $this->load->view('themes/'.$data['set']->themes.'/produk_frame', $data);
    }

//end of class	
}