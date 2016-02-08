<?php

class Modroom extends CI_Controller{

    function __construct()
    {
    	parent::__construct();
    	$this->load->model('m_room','room');
        $this->load->library('reginalib');
    }


    function index()
    {
        saya_masuk();
        saya_admin();
    	$get = $this->db->get('mod_kamar');
        $config['base_url'] = site_url().'/modroom/index';
        $config['per_page'] = 30;
        $config['total_rows'] = $get->num_rows();
        $config['next_page'] = '&raquo;';
        $config['prev_page'] = '&laquo;';

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['query'] = $this->room->show_rooms($config['per_page'], $this->uri->segment(3));
        $data['set'] = $this->m_setting->ambil_setting();

    	$this->load->view('head');
    	$this->load->view('modroom/room_view', $data);
    	$this->load->view('foot');
    }



    function addroom(){
        saya_masuk();
        saya_admin();

        $this->form_validation->set_rules('nama','Nama Kamar','required|trim');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
        $this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');

        if($this->form_validation->run() == FALSE){
            
            $this->load->view('head');
            $this->load->view('modroom/room_add');
            $this->load->view('foot');
        
        }else{

            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $luas = $this->input->post('luas');
            $tempat = $this->input->post('tempat');
            $ac = $this->input->post('ac');
            $wifi = $this->input->post('wifi');
            $telpon = $this->input->post('telpon');
            $deposit = $this->input->post('deposit');
            $lcd = $this->input->post('lcd');
            $teh = $this->input->post('teh');
            $hair = $this->input->post('hair');
            $shower = $this->input->post('shower');
            $mejakerja = $this->input->post('mejakerja');
            $mineral = $this->input->post('mineral');
            $rokok = $this->input->post('rokok');
            $featimage = $this->input->post('featuredimage');
            $now = date('Y-m-d h:i:s');
            $userid = $this->session->userdata('id');

            $data = array(
                'nama_kamar'=>$nama,
                'deskripsi'=>$deskripsi,
                'bed_desc'=>$tempat,
                'area'=>$luas,
                'ac'=>$ac,
                'wifi'=>$wifi,
                'telpon'=>$telpon,
                'deposit'=>$deposit,
                'lcd'=>$lcd,
                'teh'=>$teh,
                'hair'=>$hair,
                'shower'=>$shower,
                'mejakerja'=>$mejakerja,
                'mineral'=>$mineral,
                'rokok'=>$rokok,
                'featimage'=>$featimage,
                'input_date'=>$now,
                'input_by'=>$userid
                );

            $this->room->saving_room($data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> Data has been successfull insert.</div>');
            redirect('modroom');
            
            //echo var_dump($fiturkamar);
        }
    }



    function edit($id)
    {
        if(!$id || empty($id)){
            redirect('modroom');
        }else{

            saya_masuk();
            saya_admin();

            $this->form_validation->set_rules('nama','Nama Kamar','required|trim');
            $this->form_validation->set_rules('deskripsi','Deskripsi','required|trim');
            $this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');

            if($this->form_validation->run() == FALSE){
                
                $data['query'] = $this->room->get_room($id);

                $this->load->view('head');
                $this->load->view('modroom/room_edit', $data);
                $this->load->view('foot');
            
            }else{

                $nama = $this->input->post('nama');
                $deskripsi = $this->input->post('deskripsi');
                $luas = $this->input->post('luas');
                $tempat = $this->input->post('tempat');

                $ac = $this->input->post('ac');
                $wifi = $this->input->post('wifi');
                $telpon = $this->input->post('telpon');
                $deposit = $this->input->post('deposit');
                $lcd = $this->input->post('lcd');
                $teh = $this->input->post('teh');
                $hair = $this->input->post('hair');
                $shower = $this->input->post('shower');
                $mejakerja = $this->input->post('mejakerja');
                $mineral = $this->input->post('mineral');
                $rokok = $this->input->post('rokok');

                $featimage = $this->input->post('featuredimage');
                $now = date('Y-m-d h:i:s');
                $userid = $this->session->userdata('id');

                $fiturkamar = implode(",", $fitur);

                $data = array(
                    'nama_kamar'=>$nama,
                    'deskripsi'=>$deskripsi,
                    'bed_desc'=>$tempat,
                    'area'=>$luas,
                    'ac'=>$ac,
                    'wifi'=>$wifi,
                    'telpon'=>$telpon,
                    'deposit'=>$deposit,
                    'lcd'=>$lcd,
                    'teh'=>$teh,
                    'hair'=>$hair,
                    'shower'=>$shower,
                    'mejakerja'=>$mejakerja,
                    'mineral'=>$mineral,
                    'rokok'=>$rokok,
                    'featimage'=>$featimage,
                    'input_date'=>$now,
                    'input_by'=>$userid
                    );

                $this->room->update_room($data, $id);
                $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> Data has been updated.</div>');
                redirect('modroom');
                
                //echo var_dump($fiturkamar);
            }

        }
    }



    function delete($id)
    {
        saya_masuk();
        saya_admin();
        if(!$id || empty($id)){
            redirect('modroom');
        }else{

            $this->room->delete_room($id);

            $this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success!</b> Data has been deleted.</div>');
            redirect('modroom');
        }
    }


    //ini untuk front page

    function showroom()
    {
        $data['rooms'] = $this->room->show_rooms(null, null);
        $data['set'] = $this->m_setting->ambil_setting();

        $this->load->view('themes/regina/head', $data);
        $this->load->view('themes/regina/rooms', $data);
        $this->load->view('themes/regina/foot');
    }

//end of class
}    