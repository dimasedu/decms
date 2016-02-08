<?php
class M_modul extends CI_Model{

	function __construct(){
		parent::__construct();
	}


	function tampil_pengguna($id){
		$query = $this->db->get_where('users',array('id'=>$id));

		return $query->row();
	}


	function tampil_hakakses(){
		$this->db->order_by('username','ASC');
		$query = $this->db->get('modul');

		return $query->result();
	}


	function simpan_priv($data){
		$this->db->insert('modul', $data);
	}


	function ambil_modul($id){
		$this->db->select(array('modul.*','users.username'));
		$this->db->join('users','users.id = modul.userid');
		$query = $this->db->get_where('modul',array('modul.userid'=>$id));

		return $query->row();
	}


	function edit_priv($data, $id){
		$this->db->where('userid', $id);
		$this->db->update('modul', $data);
	}


	function update_user($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
//end of class
}		