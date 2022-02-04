<?php

class Apibarang_model extends CI_Model
{
    public function getbarang(){
        return $this->db->get("tb_barang")->result_array();
    }
}