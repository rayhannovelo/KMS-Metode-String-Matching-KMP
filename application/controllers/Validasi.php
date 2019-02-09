<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->cek_login(2);
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
		$data['title'] = "Validasi Pengetahuan";
		$data['active'] = "validasi";
        $data['daftar_tacit'] = $this->m_kms->ambil_tacit();
        $data['daftar_explicit'] = $this->m_kms->ambil_explicit();

		$this->compose_view('manajer/validasi', $data);
	}

    public function tacit($status, $id_tacit) {
        $this->m_kms->validasi_tacit(urldecode($status), $id_tacit);

        redirect('validasi');
    }

    public function explicit($status, $id_explicit) {
        $this->m_kms->validasi_explicit(urldecode($status), $id_explicit);

        redirect('validasi');
    }
}
