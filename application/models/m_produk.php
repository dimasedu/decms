<?php

class M_produk extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}


	function show_produk($num=null, $offset=null)
	{
		$this->db->select('mod_produk.id,
						   mod_produk.produk_title,
						   mod_produk.input_date,
						   mod_produk.publish,
						   mod_produk.produk_image1,
						   post_category.slug
						   ');

		$this->db->join('post_category','post_category.slug = mod_produk.produk_cat','LEFT');
		$this->db->order_by('mod_produk.id','DESC');

		$query = $this->db->get('mod_produk', $num, $offset);

		return $query;
	}


	function show_category()
	{
		$this->db->order_by('id','ASC');
		$query = $this->db->get_where('post_category');

		return $query->result();
	}


	function simpan_produk($data)
	{
		$this->db->insert('mod_produk', $data);
	}


	function ambil_produk($id)
	{
		$query = $this->db->get_where('mod_produk', array('id'=>$id));

		return $query->row();
	}


	function update_produk($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('mod_produk', $data);
	}


	function delete_produk($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mod_produk');
	}

//end of class	
}