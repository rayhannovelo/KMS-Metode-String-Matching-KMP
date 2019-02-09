<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->simple_login->is_login(TRUE);
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
		$data['title'] = "Profil";
		$data['active'] = "profil";
		$data['profil'] = $this->m_pengguna->ambil_pengguna_byid($this->session->userdata('id_pengguna'));

		$this->compose_view('manajer/profil', $data);
	}

	public function edit_profil_form() {
		$this->load->library('image_lib');
	    $this->load->library('upload');

		// upload foto
		if(file_exists($_FILES['foto_baru']['tmp_name']) || is_uploaded_file($_FILES['foto_baru']['tmp_name'])) {
			$config['upload_path'] = "./assets/img/profil/";
	        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|img|psd|tiff|wmf';
	        $config['max_width'] = "5000";
	        $config['max_height'] = "5000";
	        $this->upload->initialize($config);

        	if ($this->upload->do_upload('foto_baru')) 
	        {
	            $upload = $this->upload->data();
	            $nama_foto = $upload['file_name'];
	            $thumbnail_foto = str_replace($upload['file_ext'], "_thumb" . $upload['file_ext'], $upload['file_name']);
	         
	            $this->create_thumbnail($upload['file_name'], $config['upload_path']);

	            if (file_exists("./assets/img/profil/" . $this->input->post('foto')))
                	unlink("./assets/img/profil/" . $this->input->post('foto'));   
	            if (file_exists("./assets/img/profil/" . $this->input->post('thumbnail'))) 
	                unlink("./assets/img/profil/" . $this->input->post('thumbnail'));
	            
	            $data = array(
		            'foto' => $nama_foto,
		            'thumbnail' => $thumbnail_foto
				);
				$this->m_pengguna->edit_pengguna($this->session->userdata('id_pengguna'), $data);
				$this->session->set_userdata('foto', $foto);
				$this->session->set_userdata('thumbnail', $thumbnail_foto);
	        }
	    }

		if($this->input->post('password') == '') {
			$data = array(
				'nip' => $this->input->post('nip'),
				'jabatan' => $this->input->post('jabatan'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat')
			);
		}else {
			$data = array(
				'nip' => $this->input->post('nip'),
				'jabatan' => $this->input->post('jabatan'),
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'alamat' => $this->input->post('alamat'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
		}

		$this->m_pengguna->edit_pengguna($this->session->userdata('id_pengguna'), $data);
		$this->session->set_userdata('nama', $this->input->post('nama'));

		redirect('profil');
	}

	public function create_thumbnail($file_name, $upload_path) {
		// thumbnail config
		$this->image_lib->clear();
		$config=array();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $upload_path . $file_name;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 200;
        $config['height']       = 200;
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
	}
}
