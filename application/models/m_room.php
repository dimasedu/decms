<?php 

class M_room extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}


	function show_rooms($num, $offset)
	{
		$this->db->order_by('id','DESC');
		$query = $this->db->get('mod_kamar', $num, $offset);

		return $query->result();
	}



	 function saving_room($data)
    {
    	$this->db->insert('mod_kamar', $data);
    }


    function get_room($id)
    {
    	$query = $this->db->get_where('mod_kamar', array('id'=>$id));

    	return $query->row();
    }


    function update_room($data, $id)
    {
    	$this->db->where('id', $id);
    	$this->db->update('mod_kamar', $data);
    }


    function delete_room( $id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mod_kamar');
    }


}
//end of class	