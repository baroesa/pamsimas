<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_TagihanAir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect("C_Auth");
        }

        $this->load->model('M_TagihanAir');
    }


    public function index()
    {
        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_TagihanAir->tampilData();

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_TagihanAir', $data);
        $this->load->view('theme/footer');
    }

    function bayar($id_pakai = null)
    {


        if (!isset($id_pakai)) redirect('C_TagihanAir');

        $session_data = $this->session->userdata('admin');
        $datacontent['session'] = $session_data;
        $data['record'] = $this->M_TagihanAir->tampilDataBayar($id_pakai);

        $this->load->view('theme/header', $datacontent, $data);
        $this->load->view('theme/navbar', $datacontent, $data);
        $this->load->view('theme/sidebar', $datacontent, $data);
        $this->load->view('theme/admin/V_BayarTagihanAir', $data);
        $this->load->view('theme/footer');
    }

    function post()
    {
        if (isset($_POST['submit'])) {
            $id_pelanggan       = $this->input->post('id_pelanggan');
            $id_pakai           = $this->input->post('id_pakai');
            $id_tagihan         = $this->input->post('id_tagihan');
            $status             = $this->input->post('status');
            $tgl_bayar          = date("Y/m/d h:i:sa");

            $saldo              = $this->input->post('saldo');
            $sisaSaldo          = $this->input->post('sisaSaldo');
            $uangPembayaran     = $this->input->post('uangPembayaran');
            $sisaTagihan        = $this->input->post('sisaTagihan');
            $uangKembalian      = $this->input->post('uangKembalian');
            $tambahSaldo        = $this->input->post('tambahSaldo');
            $jlh_tagihan        = $this->input->post('jlh_tagihan');

            $masihSisaSaldo = $uangKembalian + $sisaSaldo;



            if ($uangKembalian > 0 and $tambahSaldo == 1) {
                //tambahkan ke saldo
            } else {
                $saldo = 0;
            }

            if ($sisaTagihan > 0 and $uangKembalian < 0) {
                //ubah jlh_tagihan dan status
            }


            $dataPembayaran         = array(
                'id_tagihan'        => $id_tagihan,
                'tgl_bayar'         => $tgl_bayar,
                'uangPembayaran'    => $uangPembayaran
            );

            $dataSaldo              = array(
                'id_pelanggan'      => $id_pelanggan,
                'saldo'             => $masihSisaSaldo
            );

            $dataTagihan       = array(
                'id_tagihan'   => $id_tagihan,
                'jlh_tagihan'  => $sisaTagihan,
                'status'       => $status
            );


            $this->M_TagihanAir->postPembayaran($dataPembayaran);
            $this->M_TagihanAir->updateTagihan($dataTagihan, $id_tagihan);
            if ($tambahSaldo == 1) {
                $this->M_TagihanAir->updateSaldo($dataSaldo, $id_pelanggan);
            }
            redirect('C_TagihanAir');
        } else {
            echo "Data Gagal";
            redirect('C_TagihanAir');
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
            $this->M_TagihanAir->edit($data, $id);
            redirect('C_TagihanAir');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('M_TagihanAir');
            $data['record']     =  $this->M_TagihanAir->get_one($id)->row_array();
            $this->template->load('C_TagihanAir', $data);
        }
    }


    function delete()
    {
        $id =  $this->uri->segment(3);
        try {
            if ($this->M_TagihanAir->delete($id)) {
                echo 'success';
            } else {
                echo 'ooops';
            }
        } catch (\Exception $e) {
            $yourException = $e->getMessage();
        }
        redirect('C_TagihanAir');
    }

    function ambilMeterAwal()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_TagihanAir->ambilMeterAwal($this->input->post('id_pelanggan'));
        }
    }

    function ambilBiayaLayanan()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_TagihanAir->ambilBiayaLayanan($this->input->post('id_pelanggan'));
        }
    }
    function ambilPemeliharaanLayanan()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_TagihanAir->ambilPemeliharaanLayanan($this->input->post('id_pelanggan'));
        }
    }
    function ambilAdmLayanan()
    {
        if ($this->input->post('id_pelanggan')) {
            echo $this->M_TagihanAir->ambilAdmLayanan($this->input->post('id_pelanggan'));
        }
    }
}
