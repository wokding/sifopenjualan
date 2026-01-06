<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller Transaksi
 * Digunakan oleh semua role (Admin dan User) untuk melakukan transaksi penjualan
 */
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->helper('bulan_helper', 'bulan');
        $this->load->helper('rupiah_helper', 'rupiah');
    }

    public function penjualan()
    {
        $data['title'] = 'Transaksi Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksiPenjualan'] = $this->admin->getPenjualan();
        $data['masterPelanggan'] = $this->db->get('pelanggan')->result_array();
        $data['masterBarang'] = $this->db->get('barang')->result_array();

        $this->form_validation->set_rules('kd_penjualan', 'Kode Penjualan', 'required');
        $this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'required');
        $this->form_validation->set_rules('kd_pelanggan', 'Kode Pelanggan', 'required');
        $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
        $this->form_validation->set_rules('qty', 'QTY', 'required|numeric|greater_than[0]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);

            $dariDB = $this->admin->cekkodepenjualan();
            // contoh T-0001, angka 2 adalah awal pengambilan angka setelah T-, dan 4 jumlah angka yang diambil
            $nourut = (int)str_replace('T-', '', $dariDB);
            $kodePenjualanSekarang = $nourut + 1;
            $data['kd_penjualan'] = 'T-' . str_pad($kodePenjualanSekarang, 4, '0', STR_PAD_LEFT);
            $data['transaksiPenjualan'] = $this->admin->getPenjualan();
            $data['masterPelanggan'] = $this->db->get('pelanggan')->result_array();
            $data['masterBarang'] = $this->db->get('barang')->result_array();

            $this->load->view('transaksi/penjualan', $data);
            $this->load->view('templates/footer');
        } else {
            $kodePenjualan = $this->input->post('kd_penjualan');
            // Pastikan format T-0001 saat insert
            if (is_numeric($kodePenjualan)) {
                $kodePenjualan = 'T-' . str_pad($kodePenjualan, 4, '0', STR_PAD_LEFT);
            }
            $data = [
                'kd_penjualan' => $kodePenjualan,
                'tgl_penjualan' => $this->input->post('tgl_penjualan'),
                'kd_pelanggan' => $this->input->post('kd_pelanggan'),
                'kd_barang' => $this->input->post('kd_barang'),
                'qty' => $this->input->post('qty'),
            ];
            
            $this->db->insert('penjualan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaction has been added successfully!</div>');
            redirect('transaksi/penjualan');
        }
    }

    public function edit($kd_penjualan)
    {
        $this->admin->updateTransaksiPenjualan($kd_penjualan);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Transaction has been updated successfully!</div>');
        redirect('transaksi/penjualan');
    }

    public function delete($kd_penjualan)
    {
        $this->admin->deleteTransaksiPenjualan($kd_penjualan);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Transaction has been deleted successfully!</div>');
        redirect('transaksi/penjualan');
    }

    public function laporan()
    {
        $this->load->library('pdfgenerator');
        $data['title'] = 'Laporan Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksiPenjualan'] = $this->admin->getPenjualan();

        $this->load->view('transaksi/laporan_pdf', $data);
        $html = $this->output->get_output();
        $this->pdfgenerator->generate($html, 'laporanPenjualan', 'A4', 'portrait');
    }
}
