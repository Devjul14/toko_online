<?php 
class Model_kategori extends CI_Model
{
    function getitem(){
        $this->db->select("kategori,stok,
CASE WHEN amount > 0 THEN amount END AS PosAmount,
CASE WHEN amount < 0 THEN amount END AS NegAmount");
        $this->db->get("tb_barang");
    }
}