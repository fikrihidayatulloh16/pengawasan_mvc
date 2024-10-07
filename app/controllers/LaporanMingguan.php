<?php

class LaporanMingguan extends Controller {
    private $judul_laporan;

    // Konstruktor untuk validasi sesi
    
    public function __construct() {
        // Pastikan sesi sudah dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek apakah pengguna telah login
        if (!isset($_SESSION['role']) == 'operator') {
            Flasher::setFlash('Gagal', 'Anda tidak memiliki izin untuk akses halaman tersebut', 'danger');
            header('Location: ' . PUBLICURL . '/home/login');
            exit();
        }

        
        $this->judul_laporan = 'LAPORAN MINGGUAN'; // Set judul laporan
    }
    

    //function untuk menyimpan data id laporan harian dan id projek
    private function prepareData($id_laporan_harian, $id_projek) 
    {
        return [
            'id_laporan_harian' => $id_laporan_harian,
            'id_projek' => $id_projek
        ];
    }

        public function laporan_mingguan_list($id_projek) {
        
            //inisiasi data untuk header
            $data['judul_laporan'] = 'LAPORAN MINGGUAN';
            $data['id_projek'] = $id_projek;
            $data['projek'] = $this->model('Operator_db_model')->getProjekById($id_projek);
            $data['logo'] = $this->model('Rekap_db_model')->getLogoById($id_projek);

            // Memanggil fungsi dateConverter
            $data['tanggal_mulai_projek'] = $this->model('Operator_crud_model')->dateConverter($data['projek']['tanggal_mulai']);
            $data['tanggal_selesai_projek'] = $this->model('Operator_crud_model')->dateConverter($data['projek']['tanggal_selesai']);
            $data['tambahan_waktu_projek'] = !empty($data['projek']['tambahan_waktu']) ? $this->model('Operator_crud_model')->dateConverter($data['projek']['tambahan_waktu']) : '-';

            $data['all_laporan_harian'] = $this->model('Operator_db_model')->getAllLaporanByIdProjek($id_projek);
            $data['max_cco'] = $this->model('Laporan_mingguan_db_model')->getMaxCCO($data);
            $data['all_laporan_mingguan'] = $this->model('Laporan_mingguan_db_model')->getAllLMByIdProjek($data);
            $data['filter_laporan_mingguan'] = $this->model('Laporan_mingguan_crud_model')->filterLM($data['all_laporan_mingguan']);
            $data['all_tanggal_laporan'] = $this->model('Operator_db_model')->getAllTanggalLaporanByIprojek($id_projek);
            $data['all_minggu'] = $this->model('Laporan_mingguan_crud_model')->getWeeklyRanges($data['projek']);
            $data['all_minggu_data'] = $this->model('Laporan_mingguan_crud_model')->getAllWeekData($data);

            //update progres kumulatif
            //$this->model('Laporan_mingguan_crud_model')->ubahProgresKumulatifLM($id_projek);

            $this->view('layouts/layout_operator/layout_operator_lm', $data);
            $this->view('operator/l_harian/rekap/logo_rekap', $data);
            $this->view('operator/laporan_mingguan/laporan_mingguan_list', $data);
            $this->view('layouts/footer_b');
        }

        public function weekly_laporan_harian($id_projek, $tanggal_mulai, $tanggal_selesai, $minggu_ke)
        {
            //Flasher::setFlash('Pilih Laporan', 'Berhasil', 'success');
        $data['judul_laporan'] = 'LAPORAN MINGGUAN';
        $data['id_projek'] = $id_projek;
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_selesai'] = $tanggal_selesai;
        $data['minggu_ke'] = $minggu_ke;
        $data['projek'] = $this->model('Operator_db_model')->getProjekById($id_projek);
        $data['logo'] = $this->model('Rekap_db_model')->getLogoById($id_projek);

        // Memanggil fungsi dateConverter
        $data['tanggal_mulai_projek'] = $this->model('Operator_crud_model')->dateConverter($data['projek']['tanggal_mulai']);
        $data['tanggal_selesai_projek'] = $this->model('Operator_crud_model')->dateConverter($data['projek']['tanggal_selesai']);
        $data['tambahan_waktu_projek'] = !empty($data['projek']['tambahan_waktu']) ? $this->model('Operator_crud_model')->dateConverter($data['projek']['tambahan_waktu']) : '-';

        $data['laporan'] = $this->model('Laporan_mingguan_db_model')->get7LHByLMDate($data);
        $data['all_tanggal_laporan'] = $this->model('Operator_db_model')->getAllTanggalLaporanByIprojek($id_projek);
        $data['max_cco'] = $this->model('Laporan_mingguan_db_model')->getMaxCCO($data);
        $data['all_laporan_mingguan'] = $this->model('Laporan_mingguan_db_model')->getAllLMByIdProjek($data);
        $this->view('layouts/layout_operator/layout_operator_laporan', $data);
        $this->view('operator/l_harian/rekap/logo_rekap', $data);
        $this->view('operator/laporan_mingguan/weekly_laporan_harian', $data);
        $this->view('layouts/footer_a');
        }

    //route untuk postman
    public function get_postman($id_projek)
    {
        $data['id_projek'] = $id_projek;
        $data['getdata'] = $this->model('Laporan_mingguan_db_model')->getMaxCCO($data);
        echo '<pre>';
    print_r($data['getdata']);
    echo '</pre>';
    }

    public function tambah_laporan_mingguan($id_projek, $cco) 
    {
        $data['id_projek'] = $id_projek;
        $data['max_cco'] = $cco;

        if ($this->model('Laporan_mingguan_crud_model')->tambahLaporanMinguan($_POST) > 0) {

            $this->model('Laporan_mingguan_crud_model')->ubahProgresKumulatifLM($data);

            Flasher::setFlash('Sukses', 'Data Laporan Mingguan Berhasil Ditambahkan', 'success');

            header('Location: ' . PUBLICURL . '/admin/m_laporan_mingguan/'. $id_projek);
            exit;
        } else {
            header('Location: ' . PUBLICURL . '/admin/m_laporan_mingguan/'. $id_projek);
            exit;
        }
    }

    public function ubah_laporan_mingguan($id_projek) {
        $data['id_projek'] = $id_projek;
        $data['max_cco'] = $_POST['cco'];

        $result = $this->model('Laporan_mingguan_crud_model')->ubahLaporanMingguan($_POST);

        if ($result === TRUE) {
            Flasher::setFlash('Sukses', 'Data Laporan Mingguan Berhasil Diubah', 'success');

            //update progres kumulatif
            $this->model('Laporan_mingguan_crud_model')->ubahProgresKumulatifLM($data);

            header('Location: ' . PUBLICURL . '/laporanmingguan/laporan_mingguan_list/'. $id_projek);
            exit;
        } else {
            header('Location: ' . PUBLICURL . '/laporanmingguan/laporan_mingguan_list/'. $id_projek);
            exit;
        }
    }

    public function hapus_laporan_mingguan($id_projek) {

        $data['id_projek'] = $id_projek;
        $data['max_cco'] = $this->model('Laporan_mingguan_db_model')->getMaxCCO($data);
        $result = $this->model('Laporan_mingguan_crud_model')->hapusLaporanMingguan($_POST);

        if ($result === TRUE) {
            Flasher::setFlash('Sukses', 'Data Laporan Mingguan Berhasil Dihapus', 'success');

            //update progres kumulatif
            $this->model('Laporan_mingguan_crud_model')->ubahProgresKumulatifLM($data);

            header('Location: ' . PUBLICURL . '/admin/m_laporan_mingguan/'. $id_projek);
            exit;
        } else {
            header('Location: ' . PUBLICURL . '/admin/m_laporan_mingguan/'. $id_projek);
            exit;
        }
    }

    public function tambah_cco($id_projek, $cco)
    {
        $data['max_cco'] = $cco;
        $data['id_projek'] = $id_projek;
        $data['tanggal_rubah'] = $_POST['tanggal_selesai'];
        $data['all_laporan_mingguan'] = $this->model('Laporan_mingguan_db_model')->getAllLMByIdProjek($data);
        $result = $this->model('Laporan_mingguan_crud_model')->tambahCCO($data);

        if ($result === TRUE) {
            Flasher::setFlash('Sukses', 'Data COO Terbaru Berhasil Dibuat', 'success');

            //update progres kumulatif
            //$this->model('Laporan_mingguan_crud_model')->ubahProgresKumulatifLM($id_projek);

            header('Location: ' . PUBLICURL . '/laporanmingguan/laporan_mingguan_list/'. $id_projek);
            exit;
        } else {
            header('Location: ' . PUBLICURL . '/laporanmingguan/laporan_mingguan_list/'. $id_projek);
            exit;
        }
    }

    public function save_linechart($id_projek)
    {
        $_POST['id_projek'] = $id_projek;
        $result = $this->model('Laporan_mingguan_crud_model')->saveLineChart($_POST);

        if ($result === TRUE) {
            

        } else {
            
        }
    }
}

?>