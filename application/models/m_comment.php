<?php 

class M_comment extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	function show_comments($num, $offset)
	{
		$this->db->select('mod_comments.*, post.post_title');
		$this->db->join('post','post.id = mod_comments.comment_post_id');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('mod_comments', $num, $offset);

		return $query->result();
	}


	function update_comment($data, $id)
	{
		$this->db->where('id', $id);
    	$this->db->update('mod_comments', $data);
	}


	function delete_comment( $id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mod_comments');
    }
//end of class	
}