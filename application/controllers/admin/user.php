<?php

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Muser');
		if ($this->session->userdata('role_id') != '') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Harus Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data["title"] 		  = "User";
		$data["title_header"] = "Data User";
    	$data["content"]      = "admin/vdata_user";
		$data['q'] 	  = $this->Muser->getuser();
		$this->load->view('templates_admin/template',$data);
	}
}
?>
