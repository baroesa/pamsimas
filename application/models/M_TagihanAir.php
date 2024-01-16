<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_TagihanAir extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function tampil_data()
    {
        return $this->db->get('tb_pakai');
    }

    function postPemakaian($dataPemakaian)
    {
        $this->db->insert('tb_pakai', $dataPemakaian);
    }

    function postTagihan($dataTagihan)
    {
        $this->db->insert('tb_tagihan', $dataTagihan);
    }
    //--------------------------------------------------
    function postPembayaran($dataPembayaran)
    {
        $this->db->insert('tb_pembayaran', $dataPembayaran);
    }

    function updateTagihan($dataTagihan, $id_tagihan)
    {
        $this->db->where('id_tagihan', $id_tagihan);
        $this->db->update('tb_tagihan', $dataTagihan);
    }

    function updateSaldo($dataSaldo, $id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('tb_pelanggan', $dataSaldo);
    }
    //-------------------------------
    function get_one($id)
    {
        $param  =   array('id' => $id);
        return $this->db->get_where('tb_pengguna', $param);
    }

    function edit($data, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('tb_pengguna', $data);
    }
    function delete($id)
    {
        $this->db->where('id_pakai', $id);
        $this->db->delete('tb_pakai');
    }

    function fetch_pelanggan()
    {
        $this->db->order_by("id_pelanggan", "ASC");
        $query = $this->db->get("tb_pelanggan");
        return $query->result();
    }
    function fetch_bulan()
    {
        $this->db->order_by("id_bulan", "ASC");
        $query = $this->db->get("tb_bulan");
        return $query->result();
    }

    function ambilMeterAwal($id_pelanggan)
    {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->select_max('akhir', 'awal');
        $query = $this->db->get('tb_pakai');
        $output = '';
        foreach ($query->result() as $row) {
            $output .= $row->awal;
        }
        return $output;
    }

    function tampilData()
    {
        $this->db->select('p.*,k.*, b.*, t.*');
        $this->db->from('tb_pelanggan as p');
        $this->db->join('tb_pakai as k', 'p.id_pelanggan = k.id_pelanggan');
        $this->db->join('tb_tagihan as t', 'k.id_pakai = t.id_pakai');
        $this->db->join('tb_bulan as b', 'k.id_bulan = b.id_bulan ');
        $this->db->where('t.status', 'Belum Bayar');
        $this->db->or_where('t.status', 'Belum Lunas');
        $this->db->order_by("b.id_bulan", "desc");
        return $this->db->get();
    }
    //-------------
    function tampilDataBayar($id_pakai)
    {
        $this->db->select('p.*,k.*, b.*, t.*');
        $this->db->from('tb_pelanggan as p');
        $this->db->join('tb_pakai as k', 'p.id_pelanggan = k.id_pelanggan');
        $this->db->join('tb_tagihan as t', 'k.id_pakai = t.id_pakai');
        $this->db->join('tb_bulan as b', 'k.id_bulan = b.id_bulan ');
        $this->db->where('k.id_pakai', $id_pakai);

        return $this->db->get();
    }

    function ambilBiayaLayanan($id_pelanggan)
    {
        $this->db->select('biaya');
        $this->db->from('tb_layanan');
        $this->db->join('tb_pelanggan', 'tb_layanan.id_layanan = tb_pelanggan.id_layanan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        $output = '';
        foreach ($query->result() as $row) {
            $output .= $row->biaya;
        }
        return $output;
    }
    function ambilPemeliharaanLayanan($id_pelanggan)
    {
        $this->db->select('pemeliharaan');
        $this->db->from('tb_layanan');
        $this->db->join('tb_pelanggan', 'tb_layanan.id_layanan = tb_pelanggan.id_layanan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        $output = '';
        foreach ($query->result() as $row) {
            $output .= $row->pemeliharaan;
        }
        return $output;
    }
    function ambilAdmLayanan($id_pelanggan)
    {
        $this->db->select('adm');
        $this->db->from('tb_layanan');
        $this->db->join('tb_pelanggan', 'tb_layanan.id_layanan = tb_pelanggan.id_layanan');
        $this->db->where('id_pelanggan', $id_pelanggan);
        $query = $this->db->get();
        $output = '';
        foreach ($query->result() as $row) {
            $output .= $row->adm;
        }
        return $output;
    }
}
