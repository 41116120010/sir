<?php
class Model_bulanan extends CI_Model {

    public function get_rekap_bulanan() {
        $query = $this->db->query("
            SELECT 
                no_trx AS id, durasi_penyewaan, jenis_konsol, pendapatan AS jumlah, waktu_mulai AS tanggal, 
                'Pendapatan' AS kategori, 'Konsol disewakan' AS nama_kegiatan 
            FROM daffiqtrie_pendapatan 
            WHERE MONTH(waktu_mulai) = MONTH(CURDATE()) AND YEAR(waktu_mulai) = YEAR(CURDATE())

            UNION ALL

            SELECT 
                id, NULL AS durasi_penyewaan, NULL AS jenis_konsol, jumlah_pengeluaran AS jumlah, tanggal_kegiatan AS tanggal, 
                'Pengeluaran' AS kategori, nama_kegiatan 
            FROM daffiqtrie_pengeluaran 
            WHERE MONTH(tanggal_kegiatan) = MONTH(CURDATE()) AND YEAR(tanggal_kegiatan) = YEAR(CURDATE())

            ORDER BY tanggal ASC
        ");
        return $query->result_array();
    }

    public function get_total_pendapatan_bulan() {
        $query = $this->db->query("
            SELECT SUM(pendapatan) AS total_pendapatan 
            FROM daffiqtrie_pendapatan 
            WHERE MONTH(waktu_mulai) = MONTH(CURDATE()) AND YEAR(waktu_mulai) = YEAR(CURDATE())
        ");
        return $query->row()->total_pendapatan ?? 0;
    }

    public function get_total_pengeluaran_bulan() {
        $query = $this->db->query("
            SELECT SUM(jumlah_pengeluaran) AS total_pengeluaran 
            FROM daffiqtrie_pengeluaran 
            WHERE MONTH(tanggal_kegiatan) = MONTH(CURDATE()) AND YEAR(tanggal_kegiatan) = YEAR(CURDATE())
        ");
        return $query->row()->total_pengeluaran ?? 0;
    }

    public function get_total_durasi_bulan() {
        $query = $this->db->query("
            SELECT SUM(TIMESTAMPDIFF(MINUTE, waktu_mulai, waktu_berakhir)) AS total_menit 
            FROM daffiqtrie_pendapatan 
            WHERE MONTH(waktu_mulai) = MONTH(CURDATE()) AND YEAR(waktu_mulai) = YEAR(CURDATE())
        ");
        $menit = $query->row()->total_menit ?? 0;
        $jam = floor($menit / 60);
        $sisa_menit = $menit % 60;
        return "$jam Jam, $sisa_menit Menit";
    }
}
