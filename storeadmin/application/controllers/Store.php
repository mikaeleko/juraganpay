<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {


    function __construct() {
		parent::__construct();
		$sess = $this->session->userdata('status');
		// echo json_encode($sess);
		if(isset($sess)){
			if($sess != "login"){
			redirect('login');
			}
		}else{
		redirect('login');
		}
    }


	public function index()
	{
		$data['title'] ="DATA PRODUCT";
		$data['product'] = json_decode($this->curl->simple_get(API.'products'));
    // echo json_encode($this->curl->simple_get(API.'products'));
    // die();
		$data['icon']    = json_decode($this->curl->simple_get(API.'category'));
		$this->load->view('template/header.php',$data);
		$this->load->view('template/left.php');
		$this->load->view('content/home/home.php', $data);
		$this->load->view('template/footer.php');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url("login"));
	}

	public function checkout()
	{
		$this->load->view('checkout');
	}
}
