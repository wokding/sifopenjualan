<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function masterpelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');

        return $this->db->get()->num_rows();
    }

    function masterbarang()
    {
        $this->db->select('*');
        $this->db->from('barang');

        return $this->db->get()->num_rows();
    }

    function transaksipenjualan()
    {
        $this->db->select('*');
        $this->db->from('penjualan');

        return $this->db->get()->num_rows();
    }

    function jumlahuser()
    {
        $this->db->select('*');
        $this->db->from('user');

        return $this->db->get()->num_rows();
    }

    private $_batchImport;

    public function setBatchImport($batchImport)
    {
        $this->_batchImport = $batchImport;
    }

    public function updateMasterPelanggan($kd_pelanggan)
    {
        $post = $this->input->post();
        $this->db->set("kd_pelanggan", $post["kd_pelanggan"]);
        $this->db->set("nama_pelanggan", $post["nama_pelanggan"]);
        $this->db->set("jk", $post["jk"]);
        $this->db->set("tgl_lahir", $post["tgl_lahir"]);
        $this->db->set("agama", $post["agama"]);
        $this->db->set("hp", $post["hp"]);
        $this->db->set("alamat", $post["alamat"]);

        $this->db->where("kd_pelanggan", $kd_pelanggan);
        $this->db->update("pelanggan");
    }
    
    public function importPelanggan()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('pelanggan', $data);
    }

    public function deleteMasterPelanggan($kd_pelanggan)
    {
        $this->db->delete('pelanggan', ['kd_pelanggan' => $kd_pelanggan]);
    }

    public function importBarang()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('barang', $data);
    }

    public function updateMasterBarang($kd_barang)
    {
        $post = $this->input->post();
        $this->db->set("kd_barang", $post["kd_barang"]);
        $this->db->set("nama_barang", $post["nama_barang"]);
        $this->db->set("satuan", $post["satuan"]);
        $this->db->set("harga", $post["harga"]);

        $this->db->where("kd_barang", $kd_barang);
        $this->db->update("barang");
    }

    public function deleteMasterBarang($kd_barang)
    {
        $this->db->delete('barang', ['kd_barang' => $kd_barang]);
    }

    public function updateTransaksiPenjualan($kd_penjualan)
    {
        $post = $this->input->post();
        $this->db->set("kd_penjualan", $post["kd_penjualan"]);
        $this->db->set("tgl_penjualan", $post["tgl_penjualan"]);
        $this->db->set("kd_pelanggan", $post["kd_pelanggan"]);
        $this->db->set("kd_barang", $post["kd_barang"]);
        $this->db->set("qty", $post["qty"]);

        $this->db->where("kd_penjualan", $kd_penjualan);
        $this->db->update("penjualan");
    }

    public function deleteTransaksiPenjualan($kd_penjualan)
    {
        $this->db->delete('penjualan', ['kd_penjualan' => $kd_penjualan]);
    }

    public function cekkodebarang()
    {
        $query = $this->db->query("SELECT MAX(kd_barang) as kd_barang from barang");
        $hasil = $query->row();
        return $hasil->kd_barang;
    }

    public function cekkodepelanggan()
    {
        $query = $this->db->query("SELECT MAX(kd_pelanggan) as kd_pelanggan from pelanggan");
        $hasil = $query->row();
        return $hasil->kd_pelanggan;
    }

    public function cekkodepenjualan()
    {
        $query = $this->db->query("SELECT MAX(kd_penjualan) as kd_penjualan from penjualan");
        $hasil = $query->row();
        return $hasil->kd_penjualan;
    }

    public function getPenjualan()
    {
        $query = "SELECT 
        a.kd_pelanggan,
        a.nama_pelanggan, 
        a.jk, 
        a.tgl_lahir, 
        a.agama,
        a.hp,
        a.alamat, 
        b.kd_penjualan,
        b.tgl_penjualan,
        b.qty,
        c.kd_barang,
        c.nama_barang,
        c.satuan,
        c.harga
    FROM pelanggan a, penjualan b, barang  c 
    WHERE a.kd_pelanggan=b.kd_pelanggan AND b.kd_barang=c.kd_barang 
    ORDER BY b.kd_penjualan ASC";
        return $this->db->query($query)->result_array();
    }
}
