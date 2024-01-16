<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Main extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Main');
    }
    public function index()
    {

        if ($this->session->userdata('admin')) {
            redirect("C_Admin", 'refresh');
        } else if ($this->session->userdata('pegawai')) {
            redirect("C_Pegawai", 'refresh');
        } else if ($this->session->userdata('pengurus')) {
            redirect("C_Pengurus", 'refresh');
        } else {
            redirect("C_Auth");
        }
    }

    public function logout()
    {
        if ($this->session->userdata('admin')) {
            $this->session->unset_userdata('admin');
        } else if ($this->session->userdata('pegawai')) {
            $this->session->unset_userdata('pegawai');
        } else if ($this->session->userdata('pengurus')) {
            $this->session->unset_userdata('pengurus');
        }
        redirect('C_Auth', 'refresh');
    }
}
