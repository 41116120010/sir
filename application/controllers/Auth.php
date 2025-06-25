<?php
class Auth extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_operator');
	}
	
	function login()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->Model_operator->login($username, $password);
			$foto	= $this->Model_operator->ambil_foto($username, $password);
			if ($hasil) {
    $this->db->where('username', $username);
    $this->db->update('daffiqtrie_pengguna', ['last_login' => date('Y-m-d')]);

    $this->session->set_userdata([
        'id' => $hasil->id_operator,
        'status_login' => 'oke',
        'username' => $hasil->username,
        'nama_operator' => $hasil->nama_operator,
        'jabatan' => $hasil->jabatan,
        'foto' => $hasil->foto
    ]);
    redirect('Dashboard');
} else {
    $this->session->set_flashdata('message_name', 'Username atau Password salah!!');
    redirect('Auth/login');
}
		} else {
			$this->load->view('form_login');
		}
	}

	public function register()
{
    if (isset($_POST['submit'])) {
        $nama = $this->input->post('nama_operator');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->Model_operator->get_by_username($username);
        if ($cek) {
            $this->session->set_flashdata('message_name', 'Username sudah terdaftar!');
            redirect('auth/register');
        }

        $data = [
            'nama_operator' => $nama,
            'username' => $username,
            'password' => md5($password),
            'jabatan' => 'Pengunjung',
            'last_login' => '0000-00-00',
            'foto' => 'ranah.jpeg'
        ];

        $this->Model_operator->insert($data);
        $this->session->set_flashdata('message_name', 'Pendaftaran berhasil! Silakan login.');
        redirect('auth/login');
    } else {
        $this->load->view('form_register');
    }
}


	function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/login');
	}
}
