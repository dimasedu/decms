<?php

class M_page extends CI_Model{

    function __construct()
    {
    	parent::__construct();
    }


    function show_page($num, $offset)
    {
    	$this->db->order_by('id','ASC');
        $this->db->where('publish',1);
    	$query = $this->db->get('page', $num, $offset);

    	return $query;
    }


    function saving_page($data)
    {
    	$this->db->insert('page', $data);
    }


    function get_page($id)
    {
    	$query = $this->db->get_where('page', array('id'=>$id));

    	return $query->row();
    }


    function update_page($data, $id)
    {
    	$this->db->where('id', $id);
    	$this->db->update('page', $data);
    }



    function cari_page($kode, $nama)
    {


        if(!empty($nama)){
            $this->db->or_like('namapage', $nama);
        }


        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('page');

        return $query->result();
    }


    function show_image()
    {
        $this->db->or_where('media_type','image/jpeg');
        $this->db->or_where('media_type','image/png');
        $this->db->order_by('id','DESC');
        $query = $this->db->get('media');

        return $query->result();
    }

//end of class	
}