<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function tampil_data()
    {
        return $this->db->get('tb_user');
    }

    function post($data)
    {
        $this->db->insert('tb_user', $data);
    }

    function get_one($id)
    {
        $param  =   array('id' => $id);
        return $this->db->get_where('tb_user', $param);
    }

    function edit($data, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }
}
