<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pengeluaran extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function tampil_data()
    {
        return $this->db->get('tb_pengeluaran');
    }

    function post($data)
    {
        $this->db->insert('tb_pengeluaran', $data);
    }

    function get_one($id)
    {
        $param  =   array('id' => $id);
        return $this->db->get_where('tb_pengeluaran', $param);
    }

    function edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_pengeluaran', $data);
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_pengeluaran');
    }
}
