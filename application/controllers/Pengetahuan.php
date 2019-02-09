<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengetahuan extends CI_Controller {

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

	// Tacit

	public function tacit()
	{
		$data['title'] = "Daftar Tacit";
		$data['active'] = "pengetahuan";
		$data['daftar_tacit'] = $this->m_kms->ambil_tacit_bypengguna($this->session->userdata('id_pengguna'));

		$this->compose_view('pegawai/tacit', $data);
	}

	public function tambah_tacit()
	{
		$data['title'] = "Form Tambah Tacit";
		$data['active'] = "pengetahuan";
		$data['tacit'] = $this->m_kms->ambil_tacit();

		$this->compose_view('pegawai/tambah_tacit', $data);
	}

	public function tambah_tacit_form() {
		date_default_timezone_set('Asia/Jakarta');

        $data = array(
        	'id_pengguna' => $this->session->userdata('id_pengguna'),
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi'),
			'status' => 'Belum Divalidasi',
			'waktu_buat' => date("Y-m-d H:i:s")
		);
		$this->m_kms->tambah_tacit($data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Tacit Berhasil Ditambahkan!</div>');

		redirect('pengetahuan/tacit');
	}

	public function edit_tacit($id_tacit)
	{
		$data['title'] = "Form Edit Tacit";
		$data['active'] = "pengetahuan";
		$data['tacit'] = $this->m_kms->ambil_tacit_byid($id_tacit);

		$this->compose_view('pegawai/edit_tacit', $data);
	}

	public function edit_tacit_form($id_tacit) {
    	$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$this->m_kms->edit_tacit($id_tacit, $data);

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data Tacit Berhasil Diedit!</div>');

		redirect('pengetahuan/tacit');
	}

	public function hapus_tacit($id_tacit)
	{
		$this->m_kms->hapus_tacit($id_tacit);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data tacit Berhasil Dihapus!</div>');

		redirect('pengetahuan/tacit');
	}

	// Explicit

	public function explicit()
	{
		$data['title'] = "Daftar Explicit";
		$data['active'] = "pengetahuan";
		$data['daftar_explicit'] = $this->m_kms->ambil_explicit_bypengguna($this->session->userdata('id_pengguna'));

		$this->compose_view('pegawai/explicit', $data);
	}

	public function tambah_explicit()
	{
		$data['title'] = "Form Tambah Explicit";
		$data['active'] = "pengetahuan";
		$data['explicit'] = $this->m_kms->ambil_explicit();

		$this->compose_view('pegawai/tambah_explicit', $data);
	}

	public function tambah_explicit_form() {
		date_default_timezone_set('Asia/Jakarta');

		$config['upload_path'] = './assets/lampiran/';
		$config['allowed_types'] = '*';
		$config['remove_spaces']  = TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('lampiran'))
		{
			echo $config['upload_path'];
			echo $this->upload->display_errors();
		}else {
			$upload = $this->upload->data();
			$data = array(
	        	'id_pengguna' => $this->session->userdata('id_pengguna'),
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'lampiran' => $upload['file_name'],
				'status' => 'Belum Divalidasi',
				'waktu_buat' => date("Y-m-d H:i:s")
			);
			$this->m_kms->tambah_explicit($data);
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data explicit Berhasil Ditambahkan!</div>');

		redirect('pengetahuan/explicit');
	}

	public function edit_explicit($id_explicit)
	{
		$data['title'] = "Form Edit explicit";
		$data['active'] = "pengetahuan";
		$data['explicit'] = $this->m_kms->ambil_explicit_byid($id_explicit);

		$this->compose_view('pegawai/edit_explicit', $data);
	}

	public function edit_explicit_form($id_explicit) {
		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$this->m_kms->edit_explicit($id_explicit, $data);

		$config['upload_path'] = './assets/lampiran/';
		$config['allowed_types'] = '*';
		$config['remove_spaces']  = TRUE;
		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('lampiran'))
		{
			echo $config['upload_path'];
			echo $this->upload->display_errors();
		}else {
			$upload = $this->upload->data();
			$data = array(
				'lampiran' => $upload['file_name']
			);
			$this->m_kms->edit_explicit($id_explicit, $data);

			if (file_exists("./assets/lampiran/" . $this->input->post('lampiran_lama')))
            	unlink("./assets/lampiran/" . $this->input->post('lampiran_lama'));  
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data explicit Berhasil Diedit!</div>');

		redirect('pengetahuan/explicit');
	}

	public function hapus_explicit($id_explicit, $lampiran)
	{
		$this->m_kms->hapus_explicit($id_explicit);
		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Data explicit Berhasil Dihapus!</div>');

		if (file_exists("./assets/lampiran/" . urldecode($lampiran))) {
        	unlink("./assets/lampiran/" . urldecode($lampiran));  
		}

		redirect('pengetahuan/explicit');
	}
}
