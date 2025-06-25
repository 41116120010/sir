<?php
class Harian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_harian');
        chek_session();
    }

    public function index() {
        $data['rekap'] = $this->Model_harian->get_rekap_harian();
        $data['total_pendapatan'] = $this->Model_harian->get_total_pendapatan_bulan();
        $data['total_pengeluaran'] = $this->Model_harian->get_total_pengeluaran_bulan();
        $data['total_durasi'] = $this->Model_harian->get_total_durasi_bulan();

        $this->template->load('template/template', 'rekap/harian', $data);
    }
}