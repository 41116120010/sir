<?php
class Jam extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        chek_session();
        $this->load->model('Model_jam');
    }


   function index()
    {
        $data = $this->get_data_jam();
        $data['jam_bermain'] = $this->Model_jam->get_semua_jam_bermain();
        $this->template->load('template/template', 'jam/index', $data);
        // var_dump($this->session->userdata());
        // die;
    }
    public function get_data_jam()
{
    $total_pendapatan_bulan = $this->Model_jam->total_pendapatan_bulan_ini();
    $total_pengeluaran_bulan = $this->Model_jam->total_pengeluaran_bulan_ini();
    $total_jam_bermain_bulan = $this->Model_jam->total_durasi_bulan_ini();

    return [
        'pendapatan_bulan'       => $total_pendapatan_bulan,
        'pengeluaran_bulan'      => $total_pengeluaran_bulan,
        'keuntungan_bulan'       => $total_pendapatan_bulan - $total_pengeluaran_bulan,
        'jam_bermain_bulan'      => $total_jam_bermain_bulan
    ];
}


}
