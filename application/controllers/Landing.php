<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function index() {
    $this->load->model('Model_website');
    $this->load->model('Konsol_model');
    $this->load->model('Model_pendapatan');

    $info = $this->Model_website->get_nama_rental();
    $konsolData = $this->Konsol_model->get_all();
    $statusData = $this->Model_pendapatan->get_status_konsol();

    $data['nama_rental'] = $info['nama_rental'];
    $data['lokasi_rental'] = $info['lokasi_rental'];
    
    $statusKonsol = [];
    $currentTime = date('Y-m-d H:i:s');

    foreach ($statusData as $row) {
        $statusKonsol[$row['kode_konsol']] = $row['waktu_berakhir'];
    }

    $data['konsolData'] = [];

    foreach ($konsolData as $konsol) {
        $kode = $konsol->kode_konsol;
        $waktu_berakhir = isset($statusKonsol[$kode]) ? $statusKonsol[$kode] : null;

        if ($waktu_berakhir && $currentTime < $waktu_berakhir) {
            $status = "<span class='text-danger'>Berakhir pada: " . date('H:i:s', strtotime($waktu_berakhir)) . "</span>";
        } else {
            $status = "<span class='text-success'>Tersedia</span>";
        }

        $data['konsolData'][] = [
            'kode_konsol' => $kode,
            'status' => $status
        ];
    }

    $this->load->view('landing/index', $data);
    }

}
