<?php
class Operator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_operator');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'upload']);
    }

    public function index() {
        $data['operator'] = $this->Model_operator->get_all();
        $this->template->load('template/template', 'operator/index', $data);
    }

    public function create() {
        $this->_set_rules();

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('template/template', 'operator/form');
        } else {
            $foto = $this->_upload_foto();
            $data = [
                'nama_operator' => $this->input->post('nama_operator'),
                'username'      => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'foto'          => $foto,
            ];
            $this->Model_operator->insert($data);
            redirect('operator');
        }
    }

    public function edit($id) {
        $data['operator'] = $this->Model_operator->get_by_id($id);
        $this->_set_rules(false);

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('template/template', 'operator/form', $data);
        } else {
            $update = [
                'nama_operator' => $this->input->post('nama_operator'),
                'username'      => $this->input->post('username')];

            if ($this->input->post('password')) {
                $update['password'] = md5($this->input->post('password'));
            }

            $foto = $this->_upload_foto();
            if ($foto) {
                $update['foto'] = $foto;
            }

            $this->Model_operator->update($id, $update);
            redirect('operator');
        }
    }

    public function delete($id) {
        $this->Model_operator->delete($id);
        redirect('operator');
    }

    private function _set_rules($require_password = true) {
        $this->form_validation->set_rules('nama_operator', 'Nama Operator', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($require_password) {
            $this->form_validation->set_rules('password', 'Password', 'required');
        }
    }

    private function _upload_foto() {
        if ($_FILES['foto']['name']) {
            $config['upload_path']   = './uploads/operator/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = uniqid('daffiqtrie_');

            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                return $this->upload->data('file_name');
            }
        }
        return null;
    }
}