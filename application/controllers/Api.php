<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function keuntungan_mingguan() {
        $total_keuntungan_mingguan = array_fill(0, 7, 0);

        $pendapatan = $this->db->query("
            SELECT SUM(pendapatan) AS total, WEEKDAY(waktu_mulai) AS hari
            FROM daffiqtrie_pendapatan
            WHERE YEARWEEK(waktu_mulai, 1) = YEARWEEK(NOW(), 1)
            GROUP BY WEEKDAY(waktu_mulai)
        ")->result();

        foreach ($pendapatan as $row) {
            $hari = (int)$row->hari;
            $total_keuntungan_mingguan[$hari] += (int)$row->total;
        }

        $pengeluaran = $this->db->query("
            SELECT SUM(jumlah_pengeluaran) AS total, WEEKDAY(tanggal_kegiatan) AS hari
            FROM daffiqtrie_pengeluaran
            WHERE YEARWEEK(tanggal_kegiatan, 1) = YEARWEEK(NOW(), 1)
            GROUP BY WEEKDAY(tanggal_kegiatan)
        ")->result();

        foreach ($pengeluaran as $row) {
            $hari = (int)$row->hari;
            $total_keuntungan_mingguan[$hari] -= (int)$row->total;
        }

        header('Content-Type: application/json');
        echo json_encode($total_keuntungan_mingguan);
    }

    public function keuntungan_bulanan() {
    $total_keuntungan_bulanan = array_fill(0, 12, 0);

    $pendapatan = $this->db->query("
        SELECT SUM(pendapatan) AS total, MONTH(waktu_mulai) AS bulan 
        FROM daffiqtrie_pendapatan 
        WHERE YEAR(waktu_mulai) = YEAR(NOW()) 
        GROUP BY MONTH(waktu_mulai)
    ")->result();

    foreach ($pendapatan as $row) {
        $index = (int)$row->bulan - 1;
        $total_keuntungan_bulanan[$index] += (int)$row->total;
    }

    $pengeluaran = $this->db->query("
        SELECT SUM(jumlah_pengeluaran) AS total, MONTH(tanggal_kegiatan) AS bulan 
        FROM daffiqtrie_pengeluaran 
        WHERE YEAR(tanggal_kegiatan) = YEAR(NOW()) 
        GROUP BY MONTH(tanggal_kegiatan)
    ")->result();

    foreach ($pengeluaran as $row) {
        $index = (int)$row->bulan - 1;
        $total_keuntungan_bulanan[$index] -= (int)$row->total;
    }

    header('Content-Type: application/json');
    echo json_encode($total_keuntungan_bulanan);
}

}
