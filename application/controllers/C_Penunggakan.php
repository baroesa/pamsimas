<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Penunggakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }

        $this->load->model('M_Penunggakan');
    }


    public function index()
    {

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_Penunggakan->tampil_data();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_Penunggakan', $data);
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
            $this->M_Penunggakan->post($data);
            redirect('C_Penunggakan');
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
            $this->M_Penunggakan->edit($data, $id_pelanggan);
            redirect('C_Penunggakan');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_Penunggakan');
            $data['record']     =  $this->M_Penunggakan->get_one($id)->row_array();
            $this->template->load('C_Penunggakan', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_Penunggakan->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_Penunggakan');
    }
}
