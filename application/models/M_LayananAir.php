<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_LayananAir extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function tampil_data()
    {
        return $this->db->get('tb_layanan');
    }

    function post($data)
    {
        $this->db->insert('tb_layanan', $data);
    }

    function get_one($id)
    {
        $param  =   array('id' => $id);
        return $this->db->get_where('tb_layanan', $param);
    }

    function edit($data, $id)
    {

        $this->db->where('id_layanan', $id);
        $this->db->update('tb_layanan', $data);
    }
    function delete($id)
    {
        $this->db->where('id_layanan', $id);
        $this->db->delete('tb_layanan');
    }
}
