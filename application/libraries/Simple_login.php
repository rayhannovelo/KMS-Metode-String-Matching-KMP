<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	/* 
		Level User :
		1. Manajer
		2. Pegawai
	*/

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Fungsi login
	public function login($nip, $password) {
		$query = $this->CI->db->get_where('pengguna', array('nip' => $nip));
		if($query->num_rows() == 1) {
			if(password_verify($password, $query->row()->password)) {
				$pengguna 	= $this->CI->db->query('SELECT * FROM pengguna where nip = "'.$nip.'"')->row();
				$this->CI->session->set_userdata('id_pengguna', $pengguna->id_pengguna);
				$this->CI->session->set_userdata('nama', $pengguna->nama);
				$this->CI->session->set_userdata('nip', $pengguna->nip);
				$this->CI->session->set_userdata('jabatan', $pengguna->jabatan);
				$this->CI->session->set_userdata('password', $pengguna->password);
				$this->CI->session->set_userdata('foto', $pengguna->foto);
				$this->CI->session->set_userdata('thumbnail', $pengguna->thumbnail);
				$this->CI->session->set_userdata('level', $pengguna->level);
				$this->CI->session->set_userdata('login', TRUE);
				redirect('dashboard');
			}else{
				$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center" style="font-size: 11px">Maaf password/nip yang Anda masukkan salah!</div>');
			}
		}else{                
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center" style="font-size: 11px">Maaf password/nip yang Anda masukkan salah!</div>');
			redirect('login');
		}
	}

	// Proteksi halaman
	public function cek_login($level) {
		if($this->CI->session->userdata('level') != $level) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	public function login_super($level1,$level2) {
		if($this->CI->session->userdata('level') != $level1 && $this->CI->session->userdata('level') != $level2){
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center" align="center">Anda Belum Log In!</div>');
			redirect('login');
		}else{
			return $this->CI->session->userdata('level');
		}
	}

	public function is_login($login) {
		if($this->CI->session->userdata('login') != $login) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('id_pengguna');
		$this->CI->session->unset_userdata('nip');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('password');
		$this->CI->session->unset_userdata('jabatan');
		$this->CI->session->unset_userdata('login');
		$this->CI->session->set_flashdata('sukses','<div class="alert alert-success text-center">Anda Berhasil Log Out!</div>');
		redirect('login');
	}
}