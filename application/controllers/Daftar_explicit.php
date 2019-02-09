<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_explicit extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->is_login(TRUE);
		$this->load->model('m_kms');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('template/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$this->load->helper('htmlpurifier');
		$data['title'] = "Daftar explicit";
		$data['active'] = "daftar_explicit";
		$data['daftar_explicit'] = $this->m_kms->ambil_explicit_valid();

		$this->compose_view('pegawai/daftar_explicit', $data);
	}

	public function detail($id_explicit)
	{
		$this->load->helper('htmlpurifier');
		$data['title'] = "Detail Pengetahuan explicit";
		$data['active'] = "daftar_explicit";
		$data['explicit'] = $this->m_kms->ambil_explicit_byid($id_explicit);

		$this->compose_view('pegawai/detail_explicit', $data);
	}

	public function ambil_komentar_explicit($id_explicit, $id_komentar_explicit) {
		echo json_encode($this->m_kms->ambil_komentar_explicit($id_explicit, $id_komentar_explicit));
	}

	public function tambah_komentar_explicit($id_explicit, $komentar) {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'id_explicit' => $id_explicit,
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'komentar' => urldecode($komentar),
			'waktu_komentar' => date('Y-m-d H:i:s')
		);

		echo $this->m_kms->tambah_komentar_explicit($data);
	}

	public function hapus_komentar_explicit($id_komentar_explicit) {
		$this->m_kms->hapus_komentar_explicit($id_komentar_explicit);
	}
}
