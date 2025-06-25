<?php
class Model_website extends CI_Model {

    public function get_all() {
        return $this->db->get('daffiqtrie_website')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('daffiqtrie_website', ['id' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('daffiqtrie_website', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('daffiqtrie_website', $data);
    }

    public function delete($id) {
        return $this->db->delete('daffiqtrie_website', ['id' => $id]);
    }
    public function get_nama_rental() {
    $query = $this->db->get('daffiqtrie_website', 1);
    if ($query->num_rows() > 0) {
        return $query->row_array();
    }
    return [];
}

}
