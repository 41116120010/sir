<?php
class Model_pendapatan extends CI_Model {

    public function get_all() {
        return $this->db->order_by('waktu_mulai', 'DESC')->get('daffiqtrie_pendapatan')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('daffiqtrie_pendapatan', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('daffiqtrie_pendapatan', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('daffiqtrie_pendapatan', $data);
    }

    public function delete($id) {
        return $this->db->delete('daffiqtrie_pendapatan', ['id' => $id]);
    }

    public function get_konsol_tersedia($jenis_konsol) {
        $this->db->select('kode_konsol');
        $this->db->from('daffiqtrie_konsol');
        $this->db->where('jenis_konsol', $jenis_konsol);
        $this->db->where("kode_konsol NOT IN (
            SELECT kode_konsol FROM daffiqtrie_pendapatan 
            WHERE waktu_berakhir > NOW()
        )", null, false);
        return $this->db->get()->result_array();
    }

    public function get_harga_perjam() {
        return $this->db->get('daffiqtrie_website')->row_array(); 
    }
    
    public function get_status_konsol() {
    $this->db->select('kode_konsol, MAX(waktu_berakhir) AS waktu_berakhir');
    $this->db->from('daffiqtrie_pendapatan');
    $this->db->group_by('kode_konsol');
    $query = $this->db->get();
    return $query->result_array();
    }
}