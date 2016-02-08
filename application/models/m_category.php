<?php

class M_category extends CI_Model{

    function __construct()
    {
    	parent::__construct();
    }


    function show_category($num=null, $offset=null)
    {
    	$this->db->order_by('id','ASC');
        $this->db->where('enabled',1);
        $this->db->where('parent_id',0);
    	$query = $this->db->get('post_category', $num, $offset);

    	return $query;
    }


    function saving_category($data)
    {
    	$this->db->insert('post_category', $data);
    }


    function get_category($id)
    {
    	$query = $this->db->get_where('post_category', array('id'=>$id));

    	return $query->row();
    }


    function update_category($data, $id)
    {
    	$this->db->where('id', $id);
    	$this->db->update('post_category', $data);
    }


    function delete_category( $id)
    {
        $this->db->where('id', $id);
        $this->db->delete('post_category');
    }



    function cari_category($kode, $nama)
    {


        if(!empty($nama)){
            $this->db->or_like('namapost_category', $nama);
        }


        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('post_category');

        return $query->result();
    }


    function show_child($id)
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get_where('post_category', array('parent_id'=>$id));

        return $query->result();
    }

//end of class	
}