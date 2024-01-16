<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }

        $this->load->model('M_Pelanggan');
    }


    public function index()
    {

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_Pelanggan->tampil_data();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_Pelanggan', $data);
        $this->load->view('theme/footer');
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            // $id_pelanggan  = $this->input->post('id_pelanggan');
            // $kode   = $this->input->post('kode');
            $nama_pelanggan   = $this->input->post('nama_pelanggan');
            $nama_alias    = $this->input->post('nama_alias');
            $no_hp    = $this->input->post('no_hp');
            $no_wa    = $this->input->post('no_wa');
            $dusun    = $this->input->post('dusun');
            $id_layanan    = $this->input->post('id_layanan');
            $status    = $this->input->post('status');

            $data           = array(
                // 'id_pelanggan' => $id_pelanggan,
                // 'kode' => $kode,
                'nama_pelanggan' => $nama_pelanggan,
                'nama_alias' => $nama_alias,
                'no_hp' => $no_hp,
                'no_wa' => $no_wa,
                'dusun' => $dusun,
                'id_layanan' => $id_layanan,
                'status' => $status

            );
            $this->M_Pelanggan->post($data);
            redirect('C_Pelanggan');
        } else {
            echo "Data Gagal";
        }
    }



    function edit()
    {
        if (isset($_POST['submit'])) {
            $id_pelanggan  = $this->input->post('id_pelanggan');
            // $kode   = $this->input->post('kode');
            $nama_pelanggan   = $this->input->post('nama_pelanggan');
            $nama_alias    = $this->input->post('nama_alias');
            $no_hp    = $this->input->post('no_hp');
            $no_wa    = $this->input->post('no_wa');
            $dusun    = $this->input->post('dusun');
            $id_layanan    = $this->input->post('id_layanan');
            $status    = $this->input->post('status');
            $data           = array(
                'id_pelanggan' => $id_pelanggan,
                //'kode' => $kode,
                'nama_pelanggan' => $nama_pelanggan,
                'nama_alias' => $nama_alias,
                'no_hp' => $no_hp,
                'no_wa' => $no_wa,
                'dusun' => $dusun,
                'id_layanan' => $id_layanan,
                'status' => $status
            );
            $this->M_Pelanggan->edit($data, $id_pelanggan);
            redirect('C_Pelanggan');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_Pelanggan');
            $data['record']     =  $this->M_Pelanggan->get_one($id)->row_array();
            $this->template->load('C_Pelanggan', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_Pelanggan->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_Pelanggan');
    }
}
