<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_LayananAir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }

        $this->load->model('M_LayananAir');
    }


    public function index()
    {

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_LayananAir->tampil_data();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_LayananAir', $data);
        $this->load->view('theme/footer');
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            $uraian   = $this->input->post('uraian');
            $biaya   = $this->input->post('biaya');
            $pemeliharaan    = $this->input->post('pemeliharaan');
            $adm    = $this->input->post('adm');
            $data           = array(
                'uraian' => $uraian,
                'biaya' => $biaya,
                'pemeliharaan' => $pemeliharaan,
                'adm' => $adm
            );
            $this->M_LayananAir->post($data);
            redirect('C_LayananAir');
        } else {
            echo "Data Gagal";
        }
    }



    function edit()
    {
        if (isset($_POST['submit'])) {
            $id = $this->input->post('id');
            $uraian   = $this->input->post('uraian');
            $biaya   = $this->input->post('biaya');
            $pemeliharaan    = $this->input->post('pemeliharaan');
            $adm    = $this->input->post('adm');
            $data           = array(
                'uraian' => $uraian,
                'biaya' => $biaya,
                'pemeliharaan' => $pemeliharaan,
                'adm' => $adm
            );
            $this->M_LayananAir->edit($data, $id);
            redirect('C_LayananAir');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_LayananAir');
            $data['record']     =  $this->M_LayananAir->get_one($id)->row_array();
            $this->template->load('C_LayananAir', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_LayananAir->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_LayananAir');
    }
}
