<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Pelanggan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function tampil_data()
    {
        return $this->db->get('tb_pelanggan');
    }

    function post($data)
    {
        $this->db->insert('tb_pelanggan', $data);
    }

    function get_one($id)
    {
        $param  =   array('id' => $id);
        return $this->db->get_where('tb_pelanggan', $param);
    }

    function edit($data, $id)
    {

        $this->db->where('id_pelanggan', $id);
        $this->db->update('tb_pelanggan', $data);
    }
    function delete($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('tb_pelanggan');
    }
}
