<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bantuan extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
    $sess = $this->session->userdata('status');
    // echo json_encode($sess); 
    if(isset($sess)){
        if($sess != "login"){
          redirect('otentikasi');
        }
    }else{
      redirect('otentikasi');
    }
  }

  public function index(){
    $this->load->view('v_bantuan');
  }
}
