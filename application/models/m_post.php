<?php

class M_post extends CI_Model{

    function __construct()
    {
    	parent::__construct();
    }


    function show_post($num, $offset)
    {
        $this->db->select('post.*, post_category.category_name');
    	$this->db->order_by('post.id','ASC');
        $this->db->join('post_category','post_category.id = post.category_id','LEFT');
        $this->db->where('enabled',1);
    	$query = $this->db->get('post', $num, $offset);

    	return $query;
    }


    function saving_post($data)
    {
    	$this->db->insert('post', $data);
    }


    function get_post($id)
    {
    	$query = $this->db->get_where('post', array('id'=>$id));

    	return $query->row();
    }


    function update_post($data, $id)
    {
    	$this->db->where('id', $id);
    	$this->db->update('post', $data);
    }


    function delete_post( $id)
    {
        $this->db->where('id', $id);
        $this->db->delete('post');
    }



    function cari_post($kode, $nama)
    {


        if(!empty($nama)){
            $this->db->or_like('namapost', $nama);
        }


        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('post');

        return $query->result();
    }


    function show_category()
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get('post_category');

        return $query->result();
    }

//end of class	
}