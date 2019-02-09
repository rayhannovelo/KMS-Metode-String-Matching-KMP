<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
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
		$data['title'] = "Dashboard";
		$data['active'] = "dashboard";

		$this->compose_view('pegawai/dashboard', $data);
	}

	public function string_matching() {
		$this->load->library('doc2txt');
		$this->load->library('PdfToText');
		$this->load->helper('htmlpurifier');

		$data['title'] = "String Matching";
		$data['active'] = "dashboard";
		$data['pattern'] = $this->input->post('pattern');
		$data['text_tacit'] = $this->m_kms->cari_tacit_bypattern($this->input->post('pattern'));
		$data['text_explicit'] = $this->m_kms->cari_explicit();

		$this->compose_view('pegawai/string_matching', $data);
	}
}
