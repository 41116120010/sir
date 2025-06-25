<?php
class Dashboard extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        chek_session();
        $this->load->model('Model_dashboard');
    }


   public function index() {
    $data = $this->get_data_dashboard();
    $data['tarif'] = $this->Model_dashboard->get_tarif_perjam();
    $data['status_konsol'] = $this->Model_dashboard->get_status_konsol();
    $this->template->load('template/template', 'dashboard/lihat_dashboard', $data);
}

    public function get_data_dashboard()
{
    $total_pendapatan_hari = $this->Model_dashboard->total_pendapatan_hari_ini();
    $total_pengeluaran_hari = $this->Model_dashboard->total_pengeluaran_hari_ini();
    $total_jam_bermain_hari = $this->Model_dashboard->total_durasi_hari_ini();

    return [
        'total_pendapatan'       => $total_pendapatan_hari,
        'total_pengeluaran'      => $total_pengeluaran_hari,
        'total_keuntungan'       => $total_pendapatan_hari - $total_pengeluaran_hari,
        'total_jam_bermain'      => $total_jam_bermain_hari
    ];
}


}
