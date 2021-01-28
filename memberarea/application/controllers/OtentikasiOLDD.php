<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Otentikasi extends CI_Controller {

  function __construct(){
    parent::__construct();
    $this->load->model('m_login');
    $sess = $this->session->userdata('status');
    if(isset($sess)){
        if($sess == "login"){
          redirect('webreport');
        }
    }

  }

  public function index(){
    $this->load->view('webreport_login');
  }



  function cek_login(){
     $jsonArray = json_decode(file_get_contents('php://input'),true);
     $ID        = $jsonArray['id'];
     $PASS      = $jsonArray['pass'];
     $T         = $jsonArray['t'];
     $H         = $jsonArray['h'];
     $REGEXRESULT = $jsonArray['regexResult'];

      $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
      $MyHash = sha1($ID . $PASS . $T);
      $MyTime = strtotime(date("Y/m/d H:i:s"));
      $interval = abs($MyTime-$TDate);

     // echo json_encode(array("status"=>"TESTING","INTERVAL"=>$interval,"TDate"=>$TDate,"param"=>$jsonArray));
     // die();

     if($MyHash === $H){
        if($interval < 20000 ){
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
                  'user_img_name'  => $query->USER_IMG_NAME,
                  'status'         => "login"
                );
                //set session untuk user
                $this->session->set_userdata($userData);
                //return TRUE;
                //redirect(base_url("banner/index"));
                echo json_encode(array("status"=>"SUKSES","TDate"=>$TDate,"param"=>$userData));
                die();
            }else{
                echo json_encode(array("status"=>"GAGAL","pesan"=>"password salah","param"=>$jsonArray));
                die();
            }

         }else {
           echo json_encode(array("status"=>"GAGAL","pesan"=>"ID tidak terdaftar","param"=>$jsonArray));
           die();
         }
        }else {
          echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
          die();
        }
    }
    else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
      die();
    }

  }

}
