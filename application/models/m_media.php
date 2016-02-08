<?php

class M_media extends CI_Model{

    function __construct()
    {
    	parent::__construct();
    }


    function show_media($num, $offset)
    {
    	$this->db->order_by('id','ASC');
    	$query = $this->db->get('media', $num, $offset);

    	return $query;
    }


    function save_media($data)
    {
    	$this->db->insert('media', $data);
    }


    function get_media($id)
    {
    	$query = $this->db->get_where('media', array('id'=>$id));

    	return $query->row();
    }


    function delete_media($id)
    {
    	$this->db->where('id', $id);
    	$this->db->delete('media');
    }



    function search_media($kode, $nama)
    {


        if(!empty($nama)){
            $this->db->or_like('namamedia', $nama);
        }


        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('media');

        return $query->result();
    }

//end of class	
}