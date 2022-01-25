<?php 

class Invoice extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != ''){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Harus Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
			
		}
	}
	public function index()
	{
		$data['invoice'] 	  = $this->model_invoice->tampil_data();
		$data["title"] 		  = "Invoice";
		$data["title_header"] = "Invoice Pesanan Produk";
        $data["content"]      = "admin/invoice";
		$this->load->view('templates_admin/template',$data);

	}
	public function detail($id_invoice){
		$data['invoice'] 	  =  $this->model_invoice->ambil_id_invoice($id_invoice);
		$data['pesanan']      =  $this->model_invoice->ambil_id_pesanan($id_invoice);
		$data["title"]        = "Invoice";
		$data["title_header"] = "Detail Invoice";
        $data["content"]      = "admin/detail_invoice";
		$this->load->view('templates_admin/template',$data);
	}
	function cetak ($id){
		$data['invoice'] 	  =  $this->model_invoice->ambil_id_invoice($id);
		$data['pesanan']      =  $this->model_invoice->ambil_id_pesanan($id);
		$data['c'] 			  =  $this->model_invoice->getcetakinvoice($id);
		$data["title"]        = "Cetak Invoice";
		$this->load->view('admin/cetak_invoice',$data);
	}
}