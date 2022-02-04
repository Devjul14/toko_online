<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Apibarang extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Apibarang_model');
    }

    //Menampilkan data barang
    function index_get()
    {
        $barang = $this->Apibarang_model->getbarang();
        
        if ($barang) {
            $this->response($barang, REST_Controller::HTTP_OK);
        }
    }


    //Masukan function selanjutnya disini
}
