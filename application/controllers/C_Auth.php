<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'session');
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Auth');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|callback_check_database');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('login', $data);
        } else {
            redirect('C_Main', 'refresh');
        }
    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->M_Auth->login($username, md5($password));
        $sess_name = array(1 => "admin", 2 => "pengurus", 3 => "pegawai");
        if ($result) {

            $sess_array = array();
            foreach ($result as $row) {

                $sess_array = array(
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'no_hp' => $row->no_hp,
                    'no_wa' => $row->no_wa,
                    'dusun' => $row->dusun,
                    'level' => $row->level,
                    'status' => $row->status,
                    'tgl_daftar' => $row->tgl_daftar,
                );

                $this->session->set_userdata($sess_name[$row->level], $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }



    public function register()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_kontrol', 'No Kontrol', 'required|trim|is_unique[tb_login.no_kontrol]', [
            'is_unique' => 'This Id_Kontrol has already registered!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]|matches[password1]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('register', $data);
        } else {

            $data = [
                'no_kontrol' => htmlspecialchars($this->input->post('no_kontrol', true)),
                'password' => md5($this->input->post('password1')),
                'role_id' => 2,
                'date_created' => date('Y-m-d'),

            ];
            $this->db->insert('tb_login', $data);
            $datax2 = [
                'no_kontrol' => htmlspecialchars($this->input->post('no_kontrol', true)),
                'name' => htmlspecialchars($this->input->post('name', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_telepon' => htmlspecialchars($this->input->post('nomor_telepon', true)),
                'aktif' => "Y",

            ];
            $this->db->insert('tb_pelanggan', $datax2);
            //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login!</div>');
            $this->load->view('login', $data);



            /* disini */
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have been Logout !</div>');
        redirect("AuthLogin");
    }
}
