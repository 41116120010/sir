<?php
class Model_notifikasi extends CI_Model {

    public function getTransaksiHampirHabis() {
        return $this->db->where('waktu_berakhir BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 10 MINUTE)')
                        ->get('daffiqtrie_pendapatan')
                        ->result_array();
    }

    public function getTransaksiHabis() {
        return $this->db->where('waktu_berakhir <= NOW()')
                        ->get('daffiqtrie_pendapatan')
                        ->result_array();
    }

    public function sudahTerkirim($no_trx, $jenis) {
        return $this->db->where('no_trx', $no_trx)
                        ->where('jenis_notifikasi', $jenis)
                        ->count_all_results('daffiqtrie_telegram');
    }

    public function simpanNotifikasi($no_trx, $kode_konsol, $jenis) {
        $this->db->insert('daffiqtrie_telegram', [
            'no_trx' => $no_trx,
            'kode_konsol' => $kode_konsol,
            'jenis_notifikasi' => $jenis
        ]);
    }
}
?>