<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_install extends CI_Controller
{

  function save_setting($data)
  {
    $this->db->where('id', 1);
    $this->db->update('setting', $data);
  }
//end of class
}
?>