<?php 

class M_pengguna extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}



	function tampilpengguna($num, $offset){

		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('users', $num, $offset);

		return $query->result();
	}


	function simpan_pengguna($data){
		$this->db->insert('users', $data);
	}


	function ambil_pengguna($id){
		$query = $this->db->get_where('users', array('id'=>$id));

		return $query->row();
	}


	function ubah_pengguna($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}


	function tampil_log($num, $offset){

		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('log_users', $num, $offset);

		return $query->result();
	}

//end of class
}	
?>
