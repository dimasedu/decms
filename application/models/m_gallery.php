<?php 

class M_gallery extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	function show_galleries($num, $offset)
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('mod_gallery', $num, $offset);

		return $query->result();
	}



	 function saving_gallery($data)
    {
    	$this->db->insert('mod_gallery', $data);
    }


    function get_gallery($id)
    {
    	$query = $this->db->get_where('mod_gallery', array('id'=>$id));

    	return $query->row();
    }


    function update_gallery($data, $id)
    {
    	$this->db->where('id', $id);
    	$this->db->update('mod_gallery', $data);
    }


    function delete_gallery( $id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mod_gallery');
    }


}
//end of class	