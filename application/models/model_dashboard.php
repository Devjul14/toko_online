<?php
class Model_Dashboard extends CI_Model
{
    function getstok()
    {
        $this->db->select("kategori,stok,
        CASE WHEN kategori = 'el' THEN stok END AS el_stok,
        CASE WHEN kategori = 'pp' THEN stok END AS pp_stok,
        CASE WHEN kategori = 'pa' THEN stok END AS pa_stok,
        CASE WHEN kategori = 'ol' THEN stok END AS ol_stok");
        $q = $this->db->get("tb_barang");
        return $q->row();
    }
}
