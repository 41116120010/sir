<?php
class Bulanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        chek_session();
        $this->load->model('Model_bulanan');
    }

    public function index() {
        $data['rekap'] = $this->Model_bulanan->get_rekap_bulanan();
        $data['total_pendapatan'] = $this->Model_bulanan->get_total_pendapatan_bulan();
        $data['total_pengeluaran'] = $this->Model_bulanan->get_total_pengeluaran_bulan();
        $data['total_durasi'] = $this->Model_bulanan->get_total_durasi_bulan();

        $this->template->load('template/template', 'rekap/bulanan', $data);
    }
}
