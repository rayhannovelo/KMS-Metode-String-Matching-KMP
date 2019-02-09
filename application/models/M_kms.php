<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kms extends CI_Model{

    // tacit 

    public function ambil_tacit() {
        return $this->db->query('SELECT `tacit`.`id_tacit`, `nama`, `judul`, `deskripsi`, `status`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_tacit`) FROM `komentar_tacit` WHERE `komentar_tacit`.`id_tacit` = `tacit`.`id_tacit`) as `jumlah_komentar` FROM `tacit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `tacit`.`id_pengguna`')->result_array();
    }

    public function ambil_tacit_valid() {
        return $this->db->query('SELECT `tacit`.`id_tacit`, `nama`, `judul`, `deskripsi`, `status`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_tacit`) FROM `komentar_tacit` WHERE `komentar_tacit`.`id_tacit` = `tacit`.`id_tacit`) as `jumlah_komentar` FROM `tacit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `tacit`.`id_pengguna` WHERE `tacit`.`status` = "Valid"')->result_array();
    }

    public function ambil_jumlah_tacit() {
        return $this->db->get('tacit')->num_rows();
    }

    public function ambil_tacit_byid($id_tacit) {
        return $this->db->query('SELECT `tacit`.`id_tacit`, `nama`, `judul`, `deskripsi`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_tacit`) FROM `komentar_tacit` WHERE `komentar_tacit`.`id_tacit` = `tacit`.`id_tacit`) as `jumlah_komentar` FROM `tacit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `tacit`.`id_pengguna` WHERE `tacit`.`id_tacit` = '.$id_tacit)->result_array();
    }

    public function cari_tacit_bypattern($pattern) {
        return $this->db->query('SELECT `tacit`.`id_tacit`, `nama`, `judul`, `deskripsi`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_tacit`) FROM `komentar_tacit` WHERE `komentar_tacit`.`id_tacit` = `tacit`.`id_tacit`) as `jumlah_komentar` FROM `tacit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `tacit`.`id_pengguna` WHERE (`tacit`.`judul` LIKE BINARY \'%'.$pattern.'%\' OR `tacit`.`deskripsi` LIKE BINARY \'%'.$pattern.'%\') AND `tacit`.`status` = "Valid"')->result_array();
    }

    public function ambil_tacit_bypengguna($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('tacit')->result_array();
    }

    public function tambah_tacit($data) {
        $this->db->insert('tacit', $data);
        //return $this->db->insert_id();
    }

    public function edit_tacit($id_tacit, $data) {
        $this->db->where('id_tacit', $id_tacit);
        $this->db->update('tacit', $data);
    }

    public function hapus_tacit($id_tacit) {
        $this->db->where('id_tacit', $id_tacit);
        $this->db->delete('tacit');
    }   

    public function validasi_tacit($status, $id_tacit) {
        $this->db->set('status', $status);
        $this->db->where('id_tacit', $id_tacit);
        $this->db->update('tacit');
    }

    // explicit
    
    public function ambil_explicit() {
        return $this->db->query('SELECT `explicit`.`id_explicit`, `nama`, `judul`, `deskripsi`, `lampiran`, `status`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_explicit`) FROM `komentar_explicit` WHERE `komentar_explicit`.`id_explicit` = `explicit`.`id_explicit`) as `jumlah_komentar` FROM `explicit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `explicit`.`id_pengguna`')->result_array();
    }

    public function ambil_explicit_valid() {
        return $this->db->query('SELECT `explicit`.`id_explicit`, `nama`, `judul`, `deskripsi`, `lampiran`, `status`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_explicit`) FROM `komentar_explicit` WHERE `komentar_explicit`.`id_explicit` = `explicit`.`id_explicit`) as `jumlah_komentar` FROM `explicit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `explicit`.`id_pengguna` WHERE `explicit`.`status` = "Valid"')->result_array();
    }

    public function ambil_jumlah_explicit() {
        return $this->db->get('explicit')->num_rows();
    }

    public function ambil_explicit_byid($id_explicit) {
        return $this->db->query('SELECT `explicit`.`id_explicit`, `nama`, `judul`, `deskripsi`, `lampiran`, `waktu_buat`, 
            (SELECT COUNT(`id_komentar_explicit`) FROM `komentar_explicit` WHERE `komentar_explicit`.`id_explicit` = `explicit`.`id_explicit`) as `jumlah_komentar` FROM `explicit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `explicit`.`id_pengguna` WHERE `explicit`.`id_explicit` = '.$id_explicit)->result_array();
    }

    public function cari_explicit_bypattern($pattern) {
        return $this->db->query('SELECT `explicit`.`id_explicit`, `nama`, `judul`, `deskripsi`, `waktu_buat`, `lampiran`,
            (SELECT COUNT(`id_komentar_explicit`) FROM `komentar_explicit` WHERE `komentar_explicit`.`id_explicit` = `explicit`.`id_explicit`) as `jumlah_komentar` FROM `explicit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `explicit`.`id_pengguna` WHERE (`explicit`.`judul` LIKE \'%'.$pattern.'%\' OR `explicit`.`deskripsi` LIKE \'%'.$pattern.'%\') AND `explicit`.`status` = "Valid"')->result_array();
    }

    public function cari_explicit() {
        return $this->db->query('SELECT `explicit`.`id_explicit`, `nama`, `judul`, `deskripsi`, `waktu_buat`, `lampiran`,
            (SELECT COUNT(`id_komentar_explicit`) FROM `komentar_explicit` WHERE `komentar_explicit`.`id_explicit` = `explicit`.`id_explicit`) as `jumlah_komentar` FROM `explicit` JOIN `pengguna` ON `pengguna`.`id_pengguna` = `explicit`.`id_pengguna` WHERE `explicit`.`status` = "Valid"')->result_array();
    }

    public function ambil_explicit_bypengguna($id_pengguna) {
        $this->db->where('id_pengguna', $id_pengguna);
        return $this->db->get('explicit')->result_array();
    }

    public function tambah_explicit($data) {
        $this->db->insert('explicit', $data);
        //return $this->db->insert_id();
    }

    public function edit_explicit($id_explicit, $data) {
        $this->db->where('id_explicit', $id_explicit);
        $this->db->update('explicit', $data);
    }

    public function hapus_explicit($id_explicit) {
        $this->db->where('id_explicit', $id_explicit);
        $this->db->delete('explicit');
    }

    // komentar tacit

    public function ambil_komentar_tacit($id_tacit, $id_komentar) {
        $this->db->select('id_komentar_tacit, komentar_tacit.id_pengguna, id_tacit, nama, komentar, waktu_komentar, thumbnail');
        $this->db->join('pengguna', 'pengguna.id_pengguna = komentar_tacit.id_pengguna');
        $this->db->where('id_tacit', $id_tacit);
        $this->db->where('id_komentar_tacit >', $id_komentar);
        return $this->db->get('komentar_tacit')->result_array();
    }

    public function tambah_komentar_tacit($data) {
        $this->db->insert('komentar_tacit', $data);
        return $this->db->insert_id();
    }   

    public function hapus_komentar_tacit($id_komentar_tacit) {
        $this->db->where('id_komentar_tacit', $id_komentar_tacit);
        $this->db->delete('komentar_tacit');
    }  

    public function validasi_explicit($status, $id_explicit) {
        $this->db->set('status', $status);
        $this->db->where('id_explicit', $id_explicit);
        $this->db->update('explicit');
    }
    
    // komentar explicit

    public function ambil_komentar_explicit($id_explicit, $id_komentar) {
        $this->db->select('id_komentar_explicit, komentar_explicit.id_pengguna, id_explicit, nama, komentar, waktu_komentar, thumbnail');
        $this->db->join('pengguna', 'pengguna.id_pengguna = komentar_explicit.id_pengguna');
        $this->db->where('id_explicit', $id_explicit);
        $this->db->where('id_komentar_explicit >', $id_komentar);
        return $this->db->get('komentar_explicit')->result_array();
    }

    public function tambah_komentar_explicit($data) {
        $this->db->insert('komentar_explicit', $data);
        return $this->db->insert_id();
    }   

    public function hapus_komentar_explicit($id_komentar_explicit) {
        $this->db->where('id_komentar_explicit', $id_komentar_explicit);
        $this->db->delete('komentar_explicit');
    }  
}