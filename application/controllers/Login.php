<?php

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('v_login');
	}

	public function proses()
	{
//		var_dump($this->input->post());
		$input_email = $this->input->post('txtemail');
		$input_pass = $this->input->post('txtpassword');
		$this->load->model('M_users', 'muser');
		$cek = $this->muser->cekLogin($input_email, sha1($input_pass));
		// cek apakah data sesuai input dengan database
		if ($cek->num_rows() > 0) {
			// jika sesuai maka ambil data tersebut
			$isi = $cek->row_object();
			$data_session = [
				'nama_pengguna' => $isi->nama,
				'hak_pengguna' => $isi->hak_akses
			];
			// masukkan data pengguna kedalam session
			$this->session->set_userdata($data_session);
			redirect('admin/dashboard/index');
		} else {
			$this->session->set_flashdata('pesan', 'Maaf, Email atau Password Salah');
			redirect('login/index');
		}
	}
}
