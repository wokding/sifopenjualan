<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Admin_model', 'admin');
        $this->load->helper('bulan_helper', 'bulan');
        $this->load->helper('rupiah_helper', 'rupiah');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['master_pelanggan'] = $this->admin->masterpelanggan();
        $data['master_barang'] = $this->admin->masterbarang();
        $data['transaksi_penjualan'] = $this->admin->transaksipenjualan();
        $data['jumlah_user'] = $this->admin->jumlahuser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=');
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access changed!</div>');
    }

    public function masterpelanggan()
    {
        $data['title'] = 'Master Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['masterPelanggan'] = $this->db->get('pelanggan')->result_array();

        $this->form_validation->set_rules('kd_pelanggan', 'Kode Pelanggan', 'required');
        $this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('hp', 'HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);

            $dariDB = $this->admin->cekkodepelanggan();
            // contoh P004, angka 1 adalah awal pengambilan angka, dan 3 jumlah angka yang diambil
            $nourut = substr($dariDB, 1, 3);
            $kodePelangganSekarang = $nourut + 1;
            $data = array('kd_pelanggan' => $kodePelangganSekarang);

            $this->load->view('admin/masterpelanggan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_pelanggan' => $this->input->post('kd_pelanggan'),
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'jk' => $this->input->post('jk'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'agama' => $this->input->post('agama'),
                'hp' => $this->input->post('hp'),
                'alamat' => $this->input->post('alamat')
            ];

            $this->db->insert('pelanggan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                The customers has been added!</div>');
            redirect('admin/masterpelanggan');
        }
    }

    public function importPelanggan()
    {
        $data = array();
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        // If file uploaded
        if (!empty($_FILES['fileURL']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // array Count
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('kd_pelanggan', 'nama_pelanggan', 'jk', 'tgl_lahir', 'agama', 'hp', 'alamat');
            $makeArray = array('kd_pelanggan' => 'kd_pelanggan', 'nama_pelanggan' => 'nama_pelanggan', 'tgl_lahir' => 'tgl_lahir', 'agama' => 'agama', 'hp' => 'hp', 'alamat' => 'alamat');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    }
                }
            }
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if (empty($dataDiff)) {
                $flag = 1;
            }
            // match excel sheet column
            if ($flag == 1) {

                $dariDB = $this->admin->cekkodepelanggan();
                $no_awal = substr($dariDB, 1, 3);
                $nourut = $no_awal + 1;

                for ($i = 2; $i <= $arrayCount; $i++) {

                    $kodePelangganSekarang = 'P00' . $nourut++;

                    $kd_pelanggan = $SheetDataKey['kd_pelanggan'];
                    $nama_pelanggan = $SheetDataKey['nama_pelanggan'];
                    $jk = $SheetDataKey['jk'];
                    $tgl_lahir = $SheetDataKey['tgl_lahir'];
                    $agama = $SheetDataKey['agama'];
                    $hp = $SheetDataKey['hp'];
                    $alamat = $SheetDataKey['alamat'];

                    $kd_pelanggan = $kodePelangganSekarang;
                    $nama_pelanggan = filter_var(trim($allDataInSheet[$i][$nama_pelanggan]), FILTER_SANITIZE_STRING);
                    $jk = filter_var(trim($allDataInSheet[$i][$jk]), FILTER_SANITIZE_STRING);
                    $tgl_lahir = filter_var(trim($allDataInSheet[$i][$tgl_lahir]), FILTER_SANITIZE_STRING);
                    $agama = filter_var(trim($allDataInSheet[$i][$agama]), FILTER_SANITIZE_STRING);
                    $hp = filter_var(trim($allDataInSheet[$i][$hp]), FILTER_SANITIZE_STRING);
                    $alamat = filter_var(trim($allDataInSheet[$i][$alamat]), FILTER_SANITIZE_STRING);

                    //membalik/mengubah format tanggal menjadi 0000-00-00 jika format tanggalnya 00/00/0000
                    $text = explode("/", $tgl_lahir);
                    if (strlen($text[2]) == 4) {
                        $tgl_lahir = $text[2] . "-" . $text[0] . "-" . $text[1];
                    }

                    $fetchData[] = array('kd_pelanggan' => $kd_pelanggan, 'nama_pelanggan' => $nama_pelanggan, 'jk' => $jk, 'tgl_lahir' => $tgl_lahir, 'agama' => $agama, 'hp' => $hp, 'alamat' => $alamat);
                }
                $data['pelanggan'] = $fetchData;
                $this->admin->setBatchImport($fetchData);
                $this->admin->importPelanggan();
            } else {
                echo "Please import correct file, did not match excel sheet column";
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The items has ben added!</div>');
            redirect('admin/masterpelanggan');
        }
    }

    public function editMasterPelanggan($kd_pelanggan)
    {
        $this->admin->updateMasterPelanggan($kd_pelanggan);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The customers has ben edited!</div>');
        redirect('admin/masterpelanggan');
    }

    public function deleteMasterPelanggan($kd_pelanggan)
    {
        $this->admin->deleteMasterPelanggan($kd_pelanggan);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The customers has ben deleted!</div>');
        redirect('admin/masterpelanggan');
    }

    public function masterbarang()
    {
        $data['title'] = 'Master Barang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['masterBarang'] = $this->db->get('barang')->result_array();

        $this->form_validation->set_rules('kd_barang', 'Kode barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);

            $dariDB = $this->admin->cekkodebarang();
            // contoh B0001, angka 1 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
            $nourut = substr($dariDB, 1, 4);
            $kodeBarangSekarang = $nourut + 1;
            $data = array('kd_barang' => $kodeBarangSekarang);

            $this->load->view('admin/masterbarang', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_barang' => $this->input->post('kd_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'satuan' => $this->input->post('satuan'),
                'harga' => $this->input->post('harga')
            ];
            $this->db->insert('barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                The items has been added!</div>');
            redirect('admin/masterbarang');
        }
    }

    public function importBarang()
    {
        $data = array();
        // Load form validation library
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
        // If file uploaded
        if (!empty($_FILES['fileURL']['name'])) {
            // get file extension
            $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            // file path
            $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

            // array Count
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('kd_barang', 'nama_barang', 'satuan', 'harga');
            $makeArray = array('kd_barang' => 'kd_barang', 'nama_barang' => 'nama_barang', 'satuan' => 'satuan', 'harga' => 'harga');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    }
                }
            }
            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
            if (empty($dataDiff)) {
                $flag = 1;
            }
            // match excel sheet column
            if ($flag == 1) {

                $dariDB = $this->admin->cekkodebarang();
                $no_awal = substr($dariDB, 1, 4);
                $nourut = $no_awal + 1;

                for ($i = 2; $i <= $arrayCount; $i++) {

                    $kodeBarangSekarang = 'B000' . $nourut++;

                    $kd_barang = $SheetDataKey['kd_barang'];
                    $nama_barang = $SheetDataKey['nama_barang'];
                    $satuan = $SheetDataKey['satuan'];
                    $harga = $SheetDataKey['harga'];

                    $kd_barang = $kodeBarangSekarang;
                    $nama_barang = filter_var(trim($allDataInSheet[$i][$nama_barang]), FILTER_SANITIZE_STRING);
                    $satuan = filter_var(trim($allDataInSheet[$i][$satuan]), FILTER_SANITIZE_STRING);
                    $harga = filter_var(trim($allDataInSheet[$i][$harga]), FILTER_SANITIZE_STRING);

                    $fetchData[] = array('kd_barang' => $kd_barang, 'nama_barang' => $nama_barang, 'satuan' => $satuan, 'harga' => $harga);
                }
                $data['barang'] = $fetchData;
                $this->admin->setBatchImport($fetchData);
                $this->admin->importBarang();
            } else {
                echo "Please import correct file, did not match excel sheet column";
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The items has ben added!</div>');
            redirect('admin/masterbarang');
        }
    }

    public function editMasterBarang($kd_barang)
    {
        $this->admin->updateMasterBarang($kd_barang);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The items has ben edited!</div>');
        redirect('admin/masterbarang');
    }

    public function deleteMasterBarang($kd_barang = null)
    {
        $this->admin->deleteMasterBarang($kd_barang);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The items has ben deleted!</div>');
        redirect('admin/masterbarang');
    }

    public function transaksipenjualan()
    {
        $data['title'] = 'Transaksi Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksiPenjualan'] = $this->admin->getPenjualan();
        $data['masterPelanggan'] = $this->db->get('pelanggan')->result_array();
        $data['masterBarang'] = $this->db->get('barang')->result_array();

        $this->form_validation->set_rules('kd_penjualan', 'Kode Penjualan', 'required');
        $this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'required');
        $this->form_validation->set_rules('kd_pelanggan', 'Kode Pelanggan', 'required');
        $this->form_validation->set_rules('kd_barang', 'Kode Barang');
        $this->form_validation->set_rules('qty', 'QTY', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);

            $dariDB = $this->admin->cekkodepenjualan();
            // contoh T001, angka 1 adalah awal pengambilan angka, dan 3 jumlah angka yang diambil
            $nourut = substr($dariDB, 1, 3);
            $kodePenjualanSekarang = $nourut + 1;
            $data = array('kd_penjualan' => $kodePenjualanSekarang);

            $this->load->view('admin/transaksipenjualan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kd_penjualan' => $this->input->post('kd_penjualan'),
                'tgl_penjualan' => $this->input->post('tgl_penjualan'),
                'kd_pelanggan' => $this->input->post('kd_pelanggan'),
                'kd_barang' => $this->input->post('kd_barang'),
                'qty' => $this->input->post('qty'),
            ];
            $this->db->insert('penjualan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The transaction has been added!</div>');
            redirect('admin/transaksipenjualan');
        }
    }

    public function editTransaksiPenjualan($kd_pelanggan)
    {
        $this->admin->updateTransaksiPenjualan($kd_pelanggan);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">The transactions has ben edited!</div>');
        redirect('admin/transaksipenjualan');
    }

    public function deleteTransaksiPenjualan($kd_pelanggan)
    {
        $this->admin->deleteTransaksiPenjualan($kd_pelanggan);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The transactions has ben deleted!</div>');
        redirect('admin/transaksipenjualan');
    }

    public function PdfviewBarang()
    {
        $this->load->library('pdfgenerator');
        $data['title'] = 'Laporan Barang Naufal Elektronik';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['masterBarang'] = $this->db->get('barang')->result_array();
        $file_pdf = 'laporanBarang';
        $paper = 'A4';
        $orientation = 'portrait';

        $this->load->view(
            'admin/laporanBarang_pdf',
            $data
        );

        $html = $this->output->get_output();

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function PdfviewPelanggan()
    {
        $this->load->library('pdfgenerator');
        $data['title'] = 'Laporan Pelanggan Naufal Elektronik';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['masterPelanggan'] = $this->db->get('pelanggan')->result_array();
        $file_pdf = 'laporanPelanggan';
        $paper = 'A4';
        $orientation = 'portrait';

        $this->load->view(
            'admin/laporanPelanggan_pdf',
            $data
        );

        $html = $this->output->get_output();

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function PdfviewTransaksiPenjualan()
    {
        $this->load->library('pdfgenerator');
        $data['title'] = 'Laporan Penjualan Naufal Elektronik';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['transaksiPenjualan'] = $this->admin->getPenjualan();
        $file_pdf = 'laporanPenjualan';
        $paper = 'A4';
        $orientation = 'portrait';

        $this->load->view(
            'admin/laporanPenjualan_pdf',
            $data
        );

        $html = $this->output->get_output();

        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
