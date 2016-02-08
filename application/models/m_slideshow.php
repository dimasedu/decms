<?php

class M_slideshow extends CI_Model{

    function __construct()
    {
    	parent::__construct();
    }


    function get_slide()
    {
        $query = $this->db->get_where('mod_slideshow', array('id'=>1));

        return $query->row();
    }

    function simpan_slide($data, $id)
    {
    	$this->db->where('id', $id);
    	$this->db->update('mod_slideshow', $data);
    }

//end of class	
}