<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//session_start();

class Login extends CI_Controller{
  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
    $this->load->model('m_login');
  }

public function index() {
     $this->load->view('v_login');
   }


function cek_login(){
  $jsonArray = json_decode(file_get_contents('php://input'),true);
   $ID       = $jsonArray['id'];
   $PASS     = $jsonArray['pass'];
   $query = $this->m_login->isLogin($ID);

  // print_r($query );
  //echo json_encode($query);
  //die();

   if($query) {
      if($query->WEB_PASS == $jsonArray['pass']){
          $userData = array(
            'username'       => $query->USER_NAME,
            'store_id'       => $query->STORE_ID,
            'msisdn'         => $query->MSISDN,
            'lvl'            => $query->LVL,
            'kd_price_plan'  => $query->KODE_PRICE_PLAN,
            'status'         => "login",
            'user_img_name'  => $query->USER_IMG_NAME

          );
          //set session untuk user
          $this->session->set_userdata($userData);
          //return TRUE;
          //redirect(base_url("banner/index"));
          echo json_encode(array("status"=>"SUKSES","param"=>$jsonArray));
          die();
      }else{
          echo json_encode(array("status"=>"GAGAL","pesan"=>"password salah","param"=>$jsonArray));
          die();
      }

   }else {
     echo json_encode(array("status"=>"GAGAL","pesan"=>"ID tidak terdaftar","param"=>$jsonArray));
     die();
   }

}


public function logout(){
  $this->session->sess_destroy();
  redirect(base_url("login"));
}


}
