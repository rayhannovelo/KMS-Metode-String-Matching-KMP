<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_pegawai extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(3);
		$this->load->model('m_pengguna');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('template/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$data['title'] = "Daftar pegawai";
		$data['active'] = "daftar_pegawai";
		$data['daftar_pegawai'] = $this->m_pengguna->ambil_pengguna();

		$this->compose_view('manajer/daftar_pegawai', $data);
	}

	public function tambah_pegawai()
	{
		$data['title'] = "Form Tambah Pegawai";
		$data['active'] = "daftar_pegawai";

		$this->compose_view('manajer/tambah_pegawai', $data);
	}

	public function tambah_pegawai_form() {

        $data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'jabatan' => $this->input->post('jabatan'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => $this->input->post('level')
		);
		$this->m_pengguna->tambah_pengguna($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Pegawai Berhasil Ditambahkan!</div>');

		redirect('daftar_pegawai');
	}

	public function hapus_pegawai($id_pengguna)
	{
		if($id_pengguna != 3) {
			$this->m_pengguna->hapus_pengguna($id_pengguna);
		}
		
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data pegawai Berhasil Dihapus!</div>');
		redirect('daftar_pegawai');
	}
}
