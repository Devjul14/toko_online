<?php 
class Model_kategori extends CI_Model
{
	public function data_elektronik(){
		return $this->db->get_where('tb_barang',array('kategori' => 'el'));

	}
	public function data_pakaian_pria(){
		return $this->db->get_where('tb_barang',array('kategori' => 'pp'));

	}
	public function data_pakaian_wanita(){
		return $this->db->get_where('tb_barang',array('kategori' => 'pw'));

	}
	public function data_pakaian_anak(){
		return $this->db->get_where('tb_barang',array('kategori' => 'pa'));

	}
	public function data_olahraga(){
		return $this->db->get_where('tb_barang',array('kategori' => 'ol'));

	}
}
