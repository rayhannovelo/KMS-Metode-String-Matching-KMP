<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_tacit extends CI_Controller {

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
		$data['title'] = "Daftar Tacit";
		$data['active'] = "daftar_tacit";
		$data['daftar_tacit'] = $this->m_kms->ambil_tacit_valid();

		$this->compose_view('pegawai/daftar_tacit', $data);
	}

	public function detail($id_tacit)
	{
		$this->load->helper('htmlpurifier');
		$data['title'] = "Detail Pengetahuan Tacit";
		$data['active'] = "daftar_tacit";
		$data['tacit'] = $this->m_kms->ambil_tacit_byid($id_tacit);

		$this->compose_view('pegawai/detail_tacit', $data);
	}

	public function ambil_komentar_tacit($id_tacit, $id_komentar_tacit) {
		echo json_encode($this->m_kms->ambil_komentar_tacit($id_tacit, $id_komentar_tacit));
	}

	public function tambah_komentar_tacit($id_tacit, $komentar) {
		date_default_timezone_set('Asia/Jakarta');

		$data = array(
			'id_tacit' => $id_tacit,
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'komentar' => urldecode($komentar),
			'waktu_komentar' => date('Y-m-d H:i:s')
		);

		echo $this->m_kms->tambah_komentar_tacit($data);
	}

	public function hapus_komentar_tacit($id_komentar_tacit) {
		$this->m_kms->hapus_komentar_tacit($id_komentar_tacit);
	}
}
