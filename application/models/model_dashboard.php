<?php
class Model_Dashboard extends CI_Model
{
    public function getkategori()
    {

        $this->db->select('
        SUM(case when kategori="el" then stok else 0 end) as el,
        SUM(case when kategori="pp" then stok else 0 end) as pp,
        SUM(case when kategori="pw" then stok else 0 end) as pw,
        SUM(case when kategori="ol" then stok else 0 end) as ol,
        SUM(case when kategori="pa" then stok else 0 end) as pa,
        ', FALSE);
        $this->db->from('tb_barang');
        $data = $this->db->get()->row_array();
        return $data;
    }
}
