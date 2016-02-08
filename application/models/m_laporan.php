<?php

class M_laporan extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }


    function tampil_head()
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get('kegiatan');

        return $query->result();
    }


    function tampil_subhead($parent)
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get_where('kegiatan_detail',array('parent_id'=>0,'kegiatan_id'=>$parent));

        return $query->result();
    }



    function tampil_detail($parent)
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get_where('kegiatan_detail',array('parent_id'=>$parent));

        return $query->result();
    }


    /**
    * ==============================================================================
    * LAPORAN KEGIATAN DAK
    *
    * ==============================================================================
    **/

    function tampil_dak_head()
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get_where('kegiatan_dak', array('auto_jml'=>1,'parent_id'=>0));

        return $query->result();
    }



    function tampil_dak_subhead($parent)
    {
        $this->db->order_by('id','ASC');
        $query = $this->db->get_where('kegiatan_dak', array('auto_jml'=>1,'parent_id'=>$parent));

        return $query->result();
    }


    function tampil_dak_detail($parent)
    {
        $this->db->select('kegiatan_dak.nama_kegiatan, kegiatan_dak.id, transaksi_dak.*');
        $this->db->join('kegiatan_dak','kegiatan_dak.id = transaksi_dak.kegiatan_id');
        $this->db->order_by('kegiatan_dak.id','ASC');
        $query = $this->db->get_where('transaksi_dak', array('kegiatan_dak.auto_jml'=>0,'kegiatan_dak.parent_id'=>$parent));

        return $query->result();
    }


//end of class
}    