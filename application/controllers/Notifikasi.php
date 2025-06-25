<?php
class Notifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_notifikasi');
        $this->load->helper('notifikasi'); 
    }

    public function cek() {
        $transaksi = $this->Model_notifikasi->getTransaksiHampirHabis();

        foreach ($transaksi as $row) {
            if ($this->Model_notifikasi->sudahTerkirim($row['no_trx'], 'hampir_habis') < 3) {
                $sisa_waktu = strtotime($row['waktu_berakhir']) - time();
                if ($sisa_waktu > 0 && $sisa_waktu <= 600) {
                    $pesan = "⚠️ Peringatan: Waktu konsol *{$row['kode_konsol']}* hampir habis! Sisa " . floor($sisa_waktu / 60) . " menit.";
                    kirimNotifikasiTelegram($pesan);
                    kirimNotifikasiWhatsApp($pesan);

                    $this->Model_notifikasi->simpanNotifikasi($row['no_trx'], $row['kode_konsol'], 'hampir_habis');
                }
            }
        }

        $transaksi_habis = $this->Model_notifikasi->getTransaksiHabis();

        foreach ($transaksi_habis as $row) {
            if ($this->Model_notifikasi->sudahTerkirim($row['no_trx'], 'habis') < 3) {
                $pesan = "⏳ Konsol *{$row['kode_konsol']}* sudah habis waktunya!";
                kirimNotifikasiTelegram($pesan);
                kirimNotifikasiWhatsApp($pesan);

                $this->Model_notifikasi->simpanNotifikasi($row['no_trx'], $row['kode_konsol'], 'habis');
            }
        }

        echo "Notifikasi dicek!";
    }
}
?>
