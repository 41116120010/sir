<?php
class Konsol_model extends CI_Model {

    public function get_all() {
        return $this->db->get('daffiqtrie_konsol')->result();
    }

    public function get_by_kode($kode_konsol) {
    return $this->db->get_where('daffiqtrie_konsol', ['kode_konsol' => $kode_konsol])->row();
    }

public function update($kode_konsol, $data) {
    $this->db->where('kode_konsol', $kode_konsol);
    return $this->db->update('daffiqtrie_konsol', $data);
    }

public function delete($kode_konsol) {
    return $this->db->delete('daffiqtrie_konsol', ['kode_konsol' => $kode_konsol]);
    }


    public function insert($data) {
        return $this->db->insert('daffiqtrie_konsol', $data);
    }
    
    public function bisa_dihapus($kode_konsol) {
    $this->db->where('kode_konsol', $kode_konsol);
    $this->db->where('waktu_berakhir >', date('Y-m-d H:i:s'));
    return $this->db->get('daffiqtrie_pendapatan')->num_rows() == 0;
    }

}
