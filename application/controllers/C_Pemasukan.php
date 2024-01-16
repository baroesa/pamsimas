<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Pemasukan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }
        $this->load->model('M_Pemasukan');
    }


    public function index()
    {

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_Pemasukan->tampil_data();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_Pemasukan', $data);
        $this->load->view('theme/footer');
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            $tanggal   = $this->input->post('tanggal');
            $keterangan    = $this->input->post('keterangan');
            $jumlah    = $this->input->post('jumlah');
            $data           = array(
                'tanggal' => $tanggal,
                'keterangan' => $keterangan,
                'jumlah' => $jumlah
            );
            $this->M_Pemasukan->post($data);
            redirect('C_Pemasukan');
        } else {
            echo "Data Gagal";
        }
    }



    function edit()
    {
        if (isset($_POST['submit'])) {
            $id  = $this->input->post('id');
            $tanggal   = $this->input->post('tanggal');
            $keterangan    = $this->input->post('keterangan');
            $jumlah    = $this->input->post('jumlah');

            $data           = array(
                'tanggal' => $tanggal,
                'keterangan' => $keterangan,
                'jumlah' => $jumlah
            );
            $this->M_Pemasukan->edit($data, $id);
            redirect('C_Pemasukan');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_Pemasukan');
            $data['record']     =  $this->M_Pemasukan->get_one($id)->row_array();
            $this->template->load('C_Pemasukan', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_Pemasukan->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_Pemasukan');
    }
}
