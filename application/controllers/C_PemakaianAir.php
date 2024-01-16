<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_PemakaianAir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }

        $this->load->model('M_PemakaianAir');
    }


    public function index()
    {
        /*
        $mano = $this->M_PemakaianAir->ambilMeterAwal('5');
        print_r($mano);
        */
        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_PemakaianAir->tampilData();
        $data['pelanggan'] = $this->M_PemakaianAir->fetch_pelanggan();
        $data['bulan'] = $this->M_PemakaianAir->fetch_bulan();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_PemakaianAir', $data);
        $this->load->view('theme/footer');
    }

    function post()
    {
        if (isset($_POST['submit'])) {

            $id_pakai           = $this->input->post('id_pakai');
            $id_pelanggan       = $this->input->post('id_pelanggan');
            $id_bulan           = $this->input->post('id_bulan');
            $tahun              = $this->input->post('tahun');
            $awal               = $this->input->post('awal');
            $akhir              = $this->input->post('akhir');
            $total_pakai        = $this->input->post('total');
            $harga              = $this->input->post('harga');
            $tgl_catat          = date("Y/m/d h:i:sa");

            $dataPemakaian          = array(
                'id_pakai'      => $id_pakai,
                'id_pelanggan'  => $id_pelanggan,
                'id_bulan'      => $id_bulan,
                'tahun'         => $tahun,
                'awal'          => $awal,
                'akhir'         => $akhir,
                'total_pakai'   => $total_pakai,
                'tgl_catat'     => $tgl_catat
            );

            $dataTagihan   = array(
                'id_pakai'  => $id_pakai,
                'jlh_tagihan'     => $harga,
                'status'     => 'Belum Bayar',


            );


            $this->M_PemakaianAir->postPemakaian($dataPemakaian);
            $this->M_PemakaianAir->postTagihan($dataTagihan);
            redirect('C_PemakaianAir');
        } else {
            echo "Data Gagal";
            redirect('C_PemakaianAir');
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
            $alamat    = $this->input->post('alamat');
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
                'alamat' => $alamat,
                'level' => $level,
                'status' => $status,
                'date_created' => $waktu
            );
            $this->M_PemakaianAir->edit($data, $id);
            redirect('C_PemakaianAir');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_PemakaianAir');
            $data['record']     =  $this->M_PemakaianAir->get_one($id)->row_array();
            $this->template->load('C_PemakaianAir', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_PemakaianAir->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_PemakaianAir');
    }

    function ambilMeterAwal()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_PemakaianAir->ambilMeterAwal($this->input->post('id_pelanggan'));
        }
    }

    function ambilBiayaLayanan()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_PemakaianAir->ambilBiayaLayanan($this->input->post('id_pelanggan'));
        }
    }
    function ambilPemeliharaanLayanan()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_PemakaianAir->ambilPemeliharaanLayanan($this->input->post('id_pelanggan'));
        }
    }
    function ambilAdmLayanan()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_PemakaianAir->ambilAdmLayanan($this->input->post('id_pelanggan'));
        }
    }
}
