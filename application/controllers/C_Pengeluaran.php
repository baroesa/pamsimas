<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }
        $this->load->model('M_Pengeluaran');
    }


    public function index()
    {

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_Pengeluaran->tampil_data();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_Pengeluaran', $data);
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
            $this->M_Pengeluaran->post($data);
            redirect('C_Pengeluaran');
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
            $this->M_Pengeluaran->edit($data, $id);
            redirect('C_Pengeluaran');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_Pengeluaran');
            $data['record']     =  $this->M_Pengeluaran->get_one($id)->row_array();
            $this->template->load('C_Pengeluaran', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_Pengeluaran->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_Pengeluaran');
    }
}
