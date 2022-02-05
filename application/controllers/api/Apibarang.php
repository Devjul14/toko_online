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
        $id = $this->get('id');
        if ($id == null) {
            $barang = $this->Apibarang_model->getbarang();
        }else{
            $barang = $this->Apibarang_model->getbarang($id);
        }
        
        if ($barang) {
            $this->response([
                'status' => true,
                'data' => $barang,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'data tidak ditemukan!',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
    public function index_delete(){
        $id = $this->delete('id');

        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'anda tidak mengirim id',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if ($this->Apibarang_model->hapusbarang($id) > 0 ) {
                $this->response([
                    'status' => true,
                        'id' => $id,
                        'message' => 'berhasil menghapus',
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'gagal hapus data!',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post(){
        $data = [
            'id_brg' => $this->post('id_brg'),
            'nama_brg' => $this->post('nama_brg'),
            'keterangan' => $this->post('keterangan'),
            'kategori' => $this->post('kategori'),
            'harga' => $this->post('harga'),
            'stok' => $this->post('stok')
        ];
        if ($this->Apibarang_model->tambahbarang($data) > 0) {
            $this->response([
                'status' => true,
                    'message' => 'berhasil tambah data',
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'gagal tambah data',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    public function index_put(){
        $id = $this->put('id');
        $data = [
            'id_brg' => $this->put('id_brg'),
            'nama_brg' => $this->put('nama_brg'),
            'keterangan' => $this->put('keterangan'),
            'kategori' => $this->put('kategori'),
            'harga' => $this->put('harga'),
            'stok' => $this->put('stok')
        ];
        if ($this->Apibarang_model->editbarang($data, $id) > 0) {
            $this->response([
                'status' => true,
                    'message' => 'berhasil ubah data',
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id salah!',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    //Masukan function selanjutnya disini
}
