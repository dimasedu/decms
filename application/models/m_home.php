<?php

class M_home extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}



	function get_page($id)
	{
		$query = $this->db->get_where('page', array('id'=>$id));

		return $query->row();
	}


	function get_categories($slug)
	{
		$this->db->select('post_category.id, post_category.category_name, post_category.slug, post.*');
		$this->db->join('post_category','post_category.id = post.category_id');
		$this->db->order_by('post.id','ASC');

		$query = $this->db->get_where('post',array('post_category.slug'=>$slug));

		return $query->result();
	}


	function get_post($id)
	{
		$this->db->select('post_category.id, post.*');
		$this->db->join('post_category','post_category.id = post.category_id');
		$this->db->order_by('post.id','ASC');

		$query = $this->db->get_where('post',array('post.id'=>$id));

		return $query->row();
	}	



	function show_slide()
	{
		$query = $this->db->get('mod_slideshow');

		return $query->row();
	}

//end of class	
}