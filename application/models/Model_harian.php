<?php
class Model_harian extends CI_Model {

    public function get_rekap_harian() {
        $query = $this->db->query("
            SELECT 
                no_trx AS id, durasi_penyewaan, jenis_konsol, pendapatan AS jumlah, 
                waktu_mulai AS tanggal, 'Pendapatan' AS kategori, 'Konsol disewakan' AS nama_kegiatan 
            FROM daffiqtrie_pendapatan 
            WHERE DATE(waktu_mulai) = CURDATE()
            
            UNION ALL

            SELECT 
                id, NULL AS durasi_penyewaan, NULL AS jenis_konsol, jumlah_pengeluaran AS jumlah, 
                tanggal_kegiatan AS tanggal, 'Pengeluaran' AS kategori, nama_kegiatan 
            FROM daffiqtrie_pengeluaran 
            WHERE DATE(tanggal_kegiatan) = CURDATE()

            ORDER BY tanggal ASC
        ");
        return $query->result_array();
    }

    public function get_total_pendapatan_bulan() {
        $query = $this->db->query("
            SELECT SUM(pendapatan) AS total 
            FROM daffiqtrie_pendapatan 
            WHERE MONTH(waktu_mulai) = MONTH(CURDATE()) 
              AND YEAR(waktu_mulai) = YEAR(CURDATE())
        ");
        return $query->row()->total ?? 0;
    }

    public function get_total_pengeluaran_bulan() {
        $query = $this->db->query("
            SELECT SUM(jumlah_pengeluaran) AS total 
            FROM daffiqtrie_pengeluaran 
            WHERE MONTH(tanggal_kegiatan) = MONTH(CURDATE()) 
              AND YEAR(tanggal_kegiatan) = YEAR(CURDATE())
        ");
        return $query->row()->total ?? 0;
    }

    public function get_total_durasi_bulan() {
        $query = $this->db->query("
            SELECT SUM(TIMESTAMPDIFF(MINUTE, waktu_mulai, waktu_berakhir)) AS total_menit 
            FROM daffiqtrie_pendapatan 
            WHERE MONTH(waktu_mulai) = MONTH(CURDATE()) 
              AND YEAR(waktu_mulai) = YEAR(CURDATE())
        ");
        $total_menit = $query->row()->total_menit ?? 0;
        $jam = floor($total_menit / 60);
        $menit = $total_menit % 60;
        return "$jam Jam, $menit Menit";
    }
}