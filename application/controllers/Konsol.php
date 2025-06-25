<?php
class Konsol extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Konsol_model');
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data['konsol'] = $this->Konsol_model->get_all();
        $this->template->load('template/template', 'konsol/index', $data);
    }

    public function create() {
    $data['jenis_list'] = ['PS3', 'PS4'];

    $this->form_validation->set_rules('kode_konsol', 'Kode Konsol', 'required');
    $this->form_validation->set_rules('jenis_konsol', 'Jenis Konsol', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->template->load('template/template', 'konsol/form', $data);
    } else {
        $input = [
            'kode_konsol' => $this->input->post('kode_konsol'),
            'jenis_konsol' => $this->input->post('jenis_konsol'),
        ];
        $this->Konsol_model->insert($input);
        redirect('konsol');
    }
}

    public function edit($kode_konsol) {
    $data['konsol'] = $this->Konsol_model->get_by_kode($kode_konsol);
    $data['jenis_list'] = ['PS3', 'PS4'];

    $this->form_validation->set_rules('jenis_konsol', 'Jenis Konsol', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->template->load('template/template', 'konsol/form', $data);
    } else {
        $update = [
            'jenis_konsol' => $this->input->post('jenis_konsol'),
        ];
        $this->Konsol_model->update($kode_konsol, $update);
        redirect('konsol');
    }
}
    public function delete($kode_konsol) {
    if ($this->Konsol_model->bisa_dihapus($kode_konsol)) {
    $this->Konsol_model->delete($kode_konsol);
    $this->session->set_flashdata('success', 'Data berhasil dihapus.');
    } else {
    $this->session->set_flashdata('error', 'Konsol sedang digunakan dan tidak bisa dihapus.');
        }
    redirect('konsol');

    }

}
