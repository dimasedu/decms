<?php

class M_menu extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	function show_heads()
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('menu_head');

		return $query->result();
	}


	function saving_menu($data)
	{
		$this->db->insert('menu_head', $data);
	}


	function get_menu($id)
	{
		$query = $this->db->get_where('menu_head', array('id'=>$id));

		return $query->row();
	}


	function get_menu_detail($id)
	{
		$query = $this->db->get_where('menu_detail', array('menu_head_id'=>$id, 'menu_parent'=>0));

		return $query->result();
	}


	function show_parent()
	{
		$query = $this->db->get_where('menu_detail', array('menu_parent'=>0));

		return $query->result();
	}


	function show_category()
	{
		$query = $this->db->get_where('post_category', array('enabled'=>1));

		return $query->result();
	}


	function show_page()
	{
		$query = $this->db->get_where('page', array('publish'=>1));

		return $query->result();
	}


	function saving_detailmenu($data)
	{
		$this->db->insert('menu_detail', $data);
	}


	function get_order()
	{
		$this->db->select('MAX(menu_detail.menu_order) + 1 AS orderan',FALSE);
		$query = $this->db->get('menu_detail');

		$data = $query->row();
		$order = $data->orderan;

		return $order;
	}



	function update_menu($data, $id)
	{
		$this->db->query("UPDATE menu_head SET default_menu= 0");

		$this->db->where('id', $id);
		$this->db->update('menu_head', $data);
	}



	function update_detailmenu($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('menu_detail', $data);
	}


	function delete_detailmenu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('menu_detail');
	}
//end of class	
}