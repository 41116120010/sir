<?php
class Model_operator extends CI_Model {

    public function get_all() {
        return $this->db->get('daffiqtrie_pengguna')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('daffiqtrie_pengguna', ['id_operator' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('daffiqtrie_pengguna', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_operator', $id);
        return $this->db->update('daffiqtrie_pengguna', $data);
    }

    public function delete($id) {
        return $this->db->delete('daffiqtrie_pengguna', ['id_operator' => $id]);
    }

    public function login($username, $password) {
    $this->db->where('username', $username);
    $this->db->where('password', md5($password));
    return $this->db->get('daffiqtrie_pengguna')->row();
}

    public function get_by_username($username) {
    return $this->db->get_where('daffiqtrie_pengguna', ['username' => $username])->row();
}


public function ambil_foto($username) {
    return $this->db->get_where('daffiqtrie_pengguna', ['username' => $username])->row();
}

}
