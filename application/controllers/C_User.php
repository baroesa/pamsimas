<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }

        $this->load->model('M_User');
    }


    public function index()
    {

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_User->tampil_data();
        // $this->template->view('template/admin/main_content', 1, $datacontent);
        //$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_User', $data);
        $this->load->view('theme/footer');
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            $id       = $this->input->post('id');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $nama    = $this->input->post('nama');
            $no_hp    = $this->input->post('no_hp');
            $no_wa    = $this->input->post('no_wa');
            $dusun    = $this->input->post('dusun');
            $level    = $this->input->post('level');
            $status    = $this->input->post('status');
            $waktu = date("Y/m/d h:i:sa");
            $data           = array(
                'id' => $id,
                'username' => $username,
                'password' => md5($password),
                'nama' => $nama,
                'no_hp' => $no_hp,
                'no_wa' => $no_wa,
                'dusun' => $dusun,
                'level' => $level,
                'status' => $status,
                'tgl_daftar' => $waktu
            );
            $this->M_User->post($data);
            redirect('C_User');
        } else {
            echo "Data Gagal";
        }
    }



    function edit()
    {
        if (isset($_POST['submit'])) {
            $id       = $this->input->post('id');
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $nama    = $this->input->post('nama');
            $no_hp    = $this->input->post('no_hp');
            $no_wa    = $this->input->post('no_wa');
            $dusun    = $this->input->post('dusun');
            $level    = $this->input->post('level');
            $status    = $this->input->post('status');
            $waktu = date("Y/m/d h:i:sa");
            $data           = array(
                'id' => $id,
                'username' => $username,
                'password' => md5($password),
                'nama' => $nama,
                'no_hp' => $no_hp,
                'no_wa' => $no_wa,
                'dusun' => $dusun,
                'level' => $level,
                'status' => $status,
                'date_created' => $waktu
            );
            $this->M_User->edit($data, $id);
            redirect('C_User');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_User');
            $data['record']     =  $this->M_User->get_one($id)->row_array();
            $this->template->load('C_User', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_User->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_User');
    }
}
