<?php
class Model_pengeluaran extends CI_Model {

    public function get_all() {
        return $this->db->order_by('tanggal_kegiatan', 'DESC')->get('daffiqtrie_pengeluaran')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('daffiqtrie_pengeluaran', ['id' => $id])->row_array();
    }

    public function insert($data) {
        return $this->db->insert('daffiqtrie_pengeluaran', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('daffiqtrie_pengeluaran', $data);
    }

    public function delete($id) {
        return $this->db->delete('daffiqtrie_pengeluaran', ['id' => $id]);
    }

    public function get_total_bulanan($bulan, $tahun) {
    $this->db->select_sum('jumlah_pengeluaran');
    $this->db->where('MONTH(tanggal_kegiatan)', $bulan);
    $this->db->where('YEAR(tanggal_kegiatan)', $tahun);
    $query = $this->db->get('daffiqtrie_pengeluaran');
    return $query->row()->jumlah_pengeluaran ?? 0;
    }

}