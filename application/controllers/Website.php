<?php
class Website extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_website');
        chek_session(); 
    }

    public function index() {
        $data['website'] = $this->Model_website->get_all();
        $this->template->load('template/template', 'website/index', $data);
    }

    public function tambah() {
        $this->load->view('website/form_tambah');
    }

    public function simpan() {
        $data = [
            'nama_rental'     => $this->input->post('nama_rental'),
            'lokasi_rental'  => $this->input->post('lokasi_rental'),
            'ps3_perjam'      => $this->input->post('ps3_perjam'),
            'ps4_perjam'      => $this->input->post('ps4_perjam'),
        ];
        $this->Model_website->insert($data);
        redirect('website');
    }

    public function edit($id) {
        $data['website'] = $this->Model_website->get_by_id($id);
        $this->template->load('template/template', 'website/form_edit', $data);
    }

    public function update($id) {
        $data = [
            'nama_rental'     => $this->input->post('nama_rental'),
            'lokasi_rental'  => $this->input->post('lokasi_rental'),
            'ps3_perjam'      => $this->input->post('ps3_perjam'),
            'ps4_perjam'      => $this->input->post('ps4_perjam'),
        ];
        $this->Model_website->update($id, $data);
        redirect('website');
    }

    public function hapus($id) {
        $this->Model_website->delete($id);
        redirect('website');
    }
}
