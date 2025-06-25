<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model {

    public function total_pendapatan_hari_ini() {
        $this->db->select_sum('pendapatan');
        $this->db->where('DATE(waktu_mulai)', date('Y-m-d'));
        $query = $this->db->get('daffiqtrie_pendapatan');
        return $query->row()->pendapatan ?? 0;
    }

    public function total_pengeluaran_hari_ini() {
        $this->db->select_sum('jumlah_pengeluaran');
        $this->db->where('DATE(tanggal_kegiatan)', date('Y-m-d'));
        $query = $this->db->get('daffiqtrie_pengeluaran');
        return $query->row()->jumlah_pengeluaran ?? 0;
    }

    public function total_durasi_hari_ini() {
        $query = $this->db->query("
            SELECT SUM(TIMESTAMPDIFF(MINUTE, waktu_mulai, waktu_berakhir)) AS total_menit 
            FROM daffiqtrie_pendapatan 
            WHERE DATE(waktu_mulai) = CURDATE()
        ");
        $total_menit = $query->row()->total_menit ?? 0;
        $jam = floor($total_menit / 60);
        $menit = $total_menit % 60;
        return "$jam Jam, $menit Menit";
    }
    
    public function get_tarif_perjam() {
    $query = $this->db->select('ps3_perjam, ps4_perjam')
                      ->from('daffiqtrie_website')
                      ->limit(1)
                      ->get();
    return $query->row_array();
    }
    
    public function get_status_konsol()
    {
    $query = "
        SELECT k.kode_konsol, k.jenis_konsol, 
               MAX(p.waktu_berakhir) AS waktu_berakhir
        FROM daffiqtrie_konsol k
        LEFT JOIN daffiqtrie_pendapatan p 
            ON k.kode_konsol = p.kode_konsol
        GROUP BY k.kode_konsol, k.jenis_konsol
    ";
    return $this->db->query($query)->result();
    }


}