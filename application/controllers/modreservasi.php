<?php

class Modreservasi extends CI_Controller{
	
	function __construct()
    {
    	parent::__construct();
    	$this->load->model('m_reservasi','reservasi');
    	$this->load->library('reginalib');
    }


    function index()
    {
    	saya_masuk();
    	saya_admin();
    	$this->form_validation->set_rules('adminemail','Email Admin','required|trim');
    	$this->form_validation->set_error_delimiters('<span class="label label-danger">','</span>');

    	if($this->form_validation->run() == FALSE){
    		
    		$data['query'] = $this->reservasi->get_reservasi();

    		$this->load->view('head');
    		$this->load->view('modreservasi/reservasi_setting', $data);
    		$this->load->view('foot');
    	}else{

    		$adminemail = $this->input->post('adminemail');
    		$enabled = $this->input->post('enabled');

    		$data = array('email_admin'=>$adminemail,'enabled'=>$enabled);

    		$this->reservasi->update_reservasi($data);
    		$this->session->set_flashdata('pesan','<div class="alert alert-success" id="pesan"><b>Success !</b> Your Setting has been saved.</div>');
		
			redirect('modreservasi');
    	}
    }



    function roombooking()
    {
    	$cek = $this->reservasi->get_reservasi();

    	if($cek->enabled == 1){
    		$data['cekin'] = $this->input->post('checkin');
	    	$data['cekout'] = $this->input->post('checkout');
	    	$data['rooms'] = $this->reservasi->show_rooms();
            $data['set'] = $this->m_setting->ambil_setting();

	    	$this->load->view('themes/regina/head', $data);
	    	$this->load->view('themes/regina/booking_room', $data);
	    	$this->load->view('themes/regina/foot');
    	}else{
    		?>
    		<script type="text/javascript">
    		alert('Mohon maaf untuk sementara proses booking online tidak dapat dilakukan. Silahkan hubungi kami pada nomor telepon yang tersedia.');
    		history.go(-1);
    		</script>
    		<?php
    	}
    }


    function roombooked()
    {
    	//if(!isset($_POST['submit'])){
    	//	redirect('home');
    	//}else{

    		$nama = $this->input->post('name');
    		$email = $this->input->post('email');
    		$noid = $this->input->post('noid');
    		$telp = $this->input->post('telp');
    		$cekin = $this->input->post('cekin');
    		$cekout = $this->input->post('cekout');
    		$kamar = $this->input->post('kamar');
    		$cek = $this->reservasi->get_reservasi();
            $now = date("Y-m-d h:i:s");

            $data_email = array(
                'nama'=>$nama,
                'email'=>$email,
                'no_ktp'=>$noid,
                'telp'=>$telp,
                'cekin'=>$cekin,
                'cekout'=>$cekout,
                'tipe_kamar'=>$kamar,
                'input_date'=>$now
                );

            $this->reservasi->simpan_daftar($data_email);           

    		$this->load->library('email');

    		$config['wordwrap'] = TRUE;
    		$this->email->initialize($config);

    		//ke FO
    		$this->email->from('admin@reginahotel-pemalang.com');
    		$this->email->to($cek->email_admin);
    		$this->email->subject('Hallo Bos! Ada permintaan reservasi.');
    		$emailtext = "
    		Dear FO,

    		Berikut data permintaan reservasi :
    		Nama Lengkap : $nama 
    		Alamat Email : $email 
    		NO. Identitas : $noid 
    		HP/Telp : $telp 
    		Checkin : ".date('d/m/Y', strtotime($cekin))." 
    		Checkout : ".date('d/m/Y', strtotime($cekout))." 
    		Tipe Kamar : $kamar

    		Follow Up segera untuk mendapatkan kepastian dari Customer.
    		

    		Terima Kasih,
    		Regrads,


    		Admin Sistem Reservasi Web
    		";
    		$this->email->message($emailtext);
    		$this->email->send();


    		//ke pelanggan
    		$this->email->from($cek->email_admin);
    		$this->email->to($email);
    		$this->email->subject('R-gina Office : Terima kasih telah melakukan revervasi');
    		$emailcus = "
    		Dear Customer,

    		Berikut data permintaan reservasi :
    		Nama Lengkap : $nama 
    		Alamat Email : $email 
    		NO. Identitas : $noid 
    		HP/Telp : $telp 
    		Checkin : ".date('d/m/Y', strtotime($cekin))."
    		Checkout : ".date('d/m/Y', strtotime($cekout))."
    		Tipe Kamar : $kamar

    		Staff kami akan menghubungi anda segera.
    		

    		Terima Kasih,
    		Regrads,


    		Customer Service R-gina Hotel
    		";
    		$this->email->message($emailcus);
    		$this->email->send();

    		
            $this->email->print_debugger();

            redirect('home');

    	//}
    }


    function test()
    {
        $this->load->library('email');

        $this->email->from('admin@reginahotel-pemalang.com','Admin Regina');
        $this->email->to('edudimas1@gmail.com');
        $this->email->subject('Test aja');
        $this->email->message('test');
        $this->email->send();

        $this->email->print_debugger();
    }


    function daftar()
    {
        $get = $this->db->get('mod_reservasi_list');
        $config['base_url'] = site_url().'/modreservasi/daftar';
        $config['per_page'] = 30;
        $config['total_rows'] = $get->num_rows();
        $config['next_page'] = '&raquo;';
        $config['prev_page'] = '&laquo;';

        $this->pagination->initialize($config);

        $data['halaman'] = $this->pagination->create_links();
        $data['query'] = $this->reservasi->show_reservasi($config['per_page'], $this->uri->segment(3));
        $data['set'] = $this->m_setting->ambil_setting();

        $this->load->view('head', $data);
        $this->load->view('modreservasi/reservasi_daftar', $data);
        $this->load->view('foot');
    }
//end of class	
}