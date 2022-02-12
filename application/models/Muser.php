<?php 

class Muser extends CI_Model {
	public function getuser(){
		return $this->db->get('tb_user')->result();
	}
	public function simpan_nowa(){
		return $this->db->get('tb_user')->result();
	}
}

?>