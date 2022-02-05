<?php

class Apibarang_model extends CI_Model
{
    public function getbarang($id = null){
        if ($id == null) {
            return $this->db->get("tb_barang")->result_array();
        }else{
            return $this->db->get_where("tb_barang",["id_brg" => $id])->result_array();
        }
        
    }
    public function hapusbarang($id){
        $this->db->delete('tb_barang',['id_brg'=>$id]);
        return $this->db->affected_rows();
    }
    public function tambahbarang($data){
        $this->db->insert('tb_barang', $data);
        return $this->db->affected_rows();
    }
    public function editbarang($data, $id){
        $this->db->update('tb_barang', $data, ['id_brg'=>$id]);
        return $this->db->affected_rows();
    }
}