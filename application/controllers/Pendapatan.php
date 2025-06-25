<?php
class Pendapatan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        chek_session();
        $this->load->model('Model_pendapatan');
        $this->load->model('Konsol_model');
        $this->load->helper(['form', 'url']);
    }

    public function index() {
        $data['jam_bermain'] = $this->Model_pendapatan->get_all();
        $this->template->load('template/template', 'pendapatan/index', $data);
    }

    public function create() {
        $data['durasi_list'] = [
            '30 menit', '1 jam', '1 jam 30 menit', '2 jam',
            '2 jam 30 menit', '3 jam', '3 jam 30 menit', '4 jam'
        ];
        $data['jenis_list'] = ['PS3', 'PS4'];

        $count = $this->db->count_all('daffiqtrie_pendapatan') + 1;
        $data['no_trx'] = date('dm') . '-' . str_pad($count, 3, '0', STR_PAD_LEFT);

        $this->template->load('template/template', 'pendapatan/create', $data);
    }

    public function store() {
    $no_trx = $this->input->post('no_trx');
    $jenis = $this->input->post('jenis_konsol');
    $kode = $this->input->post('kode_konsol');
    $durasi = $this->input->post('durasi_penyewaan');
    $waktu_mulai = date("Y-m-d H:i:s");

    if ($this->Konsol_model->get_by_kode($kode)) {
        $durasi_map = [
            "30 menit" => "30 minutes", "1 jam" => "1 hour", "1 jam 30 menit" => "1 hour 30 minutes",
            "2 jam" => "2 hours", "2 jam 30 menit" => "2 hours 30 minutes",
            "3 jam" => "3 hours", "3 jam 30 menit" => "3 hours 30 minutes", "4 jam" => "4 hours"
        ];
        $unit_jam = [
            "30 menit" => 0.5, "1 jam" => 1, "1 jam 30 menit" => 1.5, "2 jam" => 2,
            "2 jam 30 menit" => 2.5, "3 jam" => 3, "3 jam 30 menit" => 3.5, "4 jam" => 4
        ];

        $harga = $this->Model_pendapatan->get_harga_perjam();
        $perjam = $jenis === 'PS3' ? $harga['ps3_perjam'] : $harga['ps4_perjam'];
        $total = $perjam * $unit_jam[$durasi];
        $waktu_berakhir = date("Y-m-d H:i:s", strtotime("$waktu_mulai + {$durasi_map[$durasi]}"));

        $this->Model_pendapatan->insert([
            'no_trx' => $no_trx,
            'durasi_penyewaan' => $durasi,
            'jenis_konsol' => $jenis,
            'kode_konsol' => $kode,
            'pendapatan' => $total,
            'waktu_mulai' => $waktu_mulai,
            'waktu_berakhir' => $waktu_berakhir,
            'id_operator' => $this->session->userdata('id')
        ]);

        redirect('pendapatan');
    } else {
        $this->session->set_flashdata('error', 'Kode konsol tidak tersedia.');
        redirect('pendapatan/create');
    }
}

    public function edit($id) {
        $data['transaksi'] = $this->Model_pendapatan->get_by_id($id);
        $data['durasi_list'] = [
            '30 menit', '1 jam', '1 jam 30 menit', '2 jam',
            '2 jam 30 menit', '3 jam', '3 jam 30 menit', '4 jam'
        ];
        $this->template->load('template/template', 'pendapatan/edit', $data);
    }

    public function update($id) {
        $old = $this->Model_pendapatan->get_by_id($id);
        $durasi = $this->input->post('durasi_penyewaan');

        $unit_jam = [
            "30 menit" => 0.5, "1 jam" => 1, "1 jam 30 menit" => 1.5,
            "2 jam" => 2, "2 jam 30 menit" => 2.5,
            "3 jam" => 3, "3 jam 30 menit" => 3.5, "4 jam" => 4
        ];
        $durasi_map = [
            "30 menit" => "30 minutes", "1 jam" => "1 hour", "1 jam 30 menit" => "1 hour 30 minutes",
            "2 jam" => "2 hours", "2 jam 30 menit" => "2 hours 30 minutes",
            "3 jam" => "3 hours", "3 jam 30 menit" => "3 hours 30 minutes", "4 jam" => "4 hours"
        ];

        $harga = $this->Model_pendapatan->get_harga_perjam();
        $perjam = $old['jenis_konsol'] === 'PS3' ? $harga['ps3_perjam'] : $harga['ps4_perjam'];
        $total = $perjam * $unit_jam[$durasi];
        $waktu_berakhir = date("Y-m-d H:i:s", strtotime($old['waktu_mulai'] . " + " . $durasi_map[$durasi]));

        $this->Model_pendapatan->update($id, [
            'durasi_penyewaan' => $durasi,
            'pendapatan' => $total,
            'waktu_berakhir' => $waktu_berakhir
        ]);
        redirect('pendapatan');
    }

    public function delete($id) {
        $this->Model_pendapatan->delete($id);
        redirect('pendapatan');
    }

    public function get_kode_konsol_by_jenis() {
        $jenis = $this->input->get('jenis_konsol');
        echo json_encode($this->Model_pendapatan->get_konsol_tersedia($jenis));
    }

    public function get_pendapatan() {
        $jenis = $this->input->post('jenis_konsol');
        $durasi = $this->input->post('durasi');

        $harga = $this->Model_pendapatan->get_harga_perjam();
        $unit_jam = [
            "30 menit" => 0.5, "1 jam" => 1, "1 jam 30 menit" => 1.5, "2 jam" => 2,
            "2 jam 30 menit" => 2.5, "3 jam" => 3, "3 jam 30 menit" => 3.5, "4 jam" => 4
        ];
        $perjam = $jenis === 'PS3' ? $harga['ps3_perjam'] : $harga['ps4_perjam'];
        $total = isset($unit_jam[$durasi]) ? $perjam * $unit_jam[$durasi] : 0;

        echo json_encode(['pendapatan' => $total]);
    }
}