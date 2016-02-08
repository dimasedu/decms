<?php

class M_reservasi extends CI_Model{

    function __construct()
    {
    	parent::__construct();
    }



    function saving_reservasi($data)
    {
    	$this->db->insert('mod_reservation', $data);
    }


    function simpan_daftar($data)
    {
        $this->db->insert('mod_reservasi_list', $data);
    }


    function show_reservasi($num=null, $offset=null)
    {
        $this->db->order_by('input_date','ASC');
        $query = $this->db->get('mod_reservasi_list', $num, $offset);

        return $query->result();
    }


    function get_reservasi()
    {
    	$query = $this->db->get_where('mod_reservation', array('id'=>1));

    	return $query->row();
    }


    function update_reservasi($data)
    {
    	$this->db->where('id',1);
    	$this->db->update('mod_reservation', $data);
    }


    function show_rooms()
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get('mod_kamar');

        return $query->result();
    }

//end of class	
}