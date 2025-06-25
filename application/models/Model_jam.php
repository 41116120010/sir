<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_jam extends CI_Model {

    
     public function total_durasi_bulan_ini() {
        $this->db->select("SUM(TIMESTAMPDIFF(MINUTE, waktu_mulai, waktu_berakhir)) AS total_menit");
        $this->db->where('MONTH(waktu_mulai)', date('m'));
        $this->db->where('YEAR(waktu_mulai)', date('Y'));
        $query = $this->db->get('daffiqtrie_pendapatan');
        $result = $query->row();

        $total_menit = $result->total_menit ?? 0;
        $jam = floor($total_menit / 60);
        $menit = $total_menit % 60;

        return "$jam Jam, $menit Menit";
    }

    public function total_pendapatan_bulan_ini() {
        $this->db->select('SUM(pendapatan) AS total_pendapatan');
        $this->db->where('MONTH(waktu_mulai)', date('m'));
        $this->db->where('YEAR(waktu_mulai)', date('Y'));
        $query = $this->db->get('daffiqtrie_pendapatan');
        $result = $query->row();
        return $result->total_pendapatan ?? 0;
    }

    public function total_pengeluaran_bulan_ini() {
        $this->db->select('SUM(jumlah_pengeluaran) AS total_pengeluaran');
        $this->db->where('MONTH(tanggal_kegiatan)', date('m'));
        $this->db->where('YEAR(tanggal_kegiatan)', date('Y'));
        $query = $this->db->get('daffiqtrie_pengeluaran');
        $result = $query->row();
        return $result->total_pengeluaran ?? 0;
    }

    public function get_semua_jam_bermain() {
    $this->db->select('p.*, k.jenis_konsol, k.status, u.nama_operator');
    $this->db->from('daffiqtrie_pendapatan p');
    $this->db->join('daffiqtrie_konsol k', 'p.kode_konsol = k.kode_konsol');
    $this->db->join('daffiqtrie_pengguna u', 'p.id_operator = u.id_operator', 'left');
    return $this->db->order_by('waktu_mulai', 'ASC')->get()->result_array();
    }

}