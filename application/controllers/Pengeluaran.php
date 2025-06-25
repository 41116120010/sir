<?php
class Pengeluaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        chek_session(); 
        $this->load->model('Model_pengeluaran');
        $this->load->helper(['form', 'url']);
    }

    public function index() {
    $data['pengeluaran'] = $this->Model_pengeluaran->get_all();

    $bulan = date('m');
    $tahun = date('Y');
    $data['total_bulanan'] = $this->Model_pengeluaran->get_total_bulanan($bulan, $tahun);

    $this->template->load('template/template', 'pengeluaran/index', $data);
}

    public function create() {
        if ($this->input->post()) {
            $this->Model_pengeluaran->insert([
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran'),
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan')
            ]);
            redirect('pengeluaran');
        }
        $this->template->load('template/template', 'pengeluaran/create');
    }

    public function edit($id) {
        $data['pengeluaran'] = $this->Model_pengeluaran->get_by_id($id);

        if ($this->input->post()) {
            $this->Model_pengeluaran->update($id, [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'jumlah_pengeluaran' => $this->input->post('jumlah_pengeluaran'),
                'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan')
            ]);
            redirect('pengeluaran');
        }

        $this->template->load('template/template', 'pengeluaran/edit', $data);
    }

    public function delete($id) {
        $this->Model_pengeluaran->delete($id);
        redirect('pengeluaran');
    }
}