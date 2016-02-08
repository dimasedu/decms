<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_setting extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


	function ambil_setting()
	{
		$query = $this->db->get('setting');

		return $query->row();
	}


	function update_setting($data)
	{
		$this->db->where('id',1);
		$this->db->update('setting', $data);
	}


	function ambil_periode($termin)
	{
		$query = $this->db->get_where('termin',array('termin'=>$termin));

		return $query->row();
	}
//end of class
}	