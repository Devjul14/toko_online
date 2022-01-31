<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Apibarang extends REST_Controller
{

    // function __construct($config = 'rest')
    // {
    //     parent::__construct($config);
    //     $this->load->database();
    // }

    //Menampilkan data kontak
    function index_get()
    {
        $id = $this->get('id_brg');
        if ($id == '') {
            $brg = $this->db->get('tb_barang')->result();
        } else {
            $this->db->where('id_brg', $id);
            $brg = $this->db->get('tb_barang')->result();
        }
        $this->response($brg, 200);
    }


    //Masukan function selanjutnya disini
}
