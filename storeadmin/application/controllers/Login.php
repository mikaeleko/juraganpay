<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
    $sess = $this->session->userdata('status');
		// echo json_encode($sess);die();
    if(!empty($sess)){
			if($sess == "login"){
			  redirect('/');
			}
		}
    $this->load->library('securimage');
  }

  function index(){
    return $this->load->view('content/login/login');
  }

  function securimage(){
    $img = new Securimage();
    $img->show();
  }

  function cek_login(){
    $this->load->library('securimage');
    $img = new Securimage();
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $ID          = $jsonArray['id'];
    $PASS        = $jsonArray['pass'];
    $CAPCODE     = $jsonArray['capcode'];
    $T           = $jsonArray['t'];
    $H           = $jsonArray['h'];
    $REGEXRESULT = $jsonArray['regexResult'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    //$TDate  = date("Y/m/d H:i:s",$T);
    $MyHash = sha1($ID . $PASS . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    //$MyTime = date("Y/m/d H:i:s");
    $interval = abs($MyTime-$TDate);
    $now = date("YmdHis");

    //$result = $img->check($jsonArray['capcode']);
    // echo "interval=>".$interval."  MyTIme=>".$MyTime."  TDate=>".$TDate."  T=>".$T;
    // die();


    if($MyHash === $H){
      if($interval < MAX_INTERVAL){
        $query = $this->M_login->isLogin($ID);
        // echo json_encode($query);
        // die();
        if($query) {
          $getExp = $this->M_login->getExp($ID);
           // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
           // echo json_encode($getExp);
           // die();
          if($now <= $getExp->WEB_PASS_EXPDATE) {
            // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
            // die();
            if($query->WEB_PASS == $jsonArray['pass']){

                if ($REGEXRESULT == "1"){
                  $userData = array(
                    'username'       => $query->USER_NAME,
                    'store_id'       => $query->STORE_ID,
                    'msisdn'         => $query->MSISDN,
                    'lvl'            => $query->LVL,
                    'kd_price_plan'  => $query->KODE_PRICE_PLAN,
                    'user_img_name'  => $query->USER_IMG_NAME,
                    'status'         => "login"
                  );

                  if($this->securimage->check($jsonArray['capcode']) == true){
                    //set session untuk user
                    $this->session->set_userdata($userData);
                    echo json_encode(array("status"=>"SUCCSESS","TDate"=>$TDate,"param"=>$userData));
                    die();
                  } else {
                    echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"Kode Captcha Salah","param"=>$jsonArray));
                    die();
                  }


                } else {
                  echo json_encode(array("status"=>"CHANGE PASSWORD","username"=>$query->USER_NAME, "store_id"=>$query->STORE_ID,"pesan"=>"Password Tidak memenuhi Syarat password minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka!","param"=>$jsonArray));
                  die();
                }



            } else {
                echo json_encode(array("status"=>"WRONG PASS","pesan"=>"Password Anda Salah","param"=>$jsonArray));
                die();
            }

          } else {
            // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
            // die();
          echo json_encode(array("status"=>"EXPIRED PASS","username"=>$query->USER_NAME, "store_id"=>$query->STORE_ID,"pesan"=>"Password Anda Telah Expired, Silahakan Melakukan Reset Password!","param"=>$jsonArray));
          die();
          }


        }else {
          echo json_encode(array("status"=>"ID FAILED","pesan"=>"ID Tidak Terdaftar","param"=>$jsonArray));
          die();
        }
      }else {
        echo json_encode(array("status"=>"SECURE FAILED","pesan"=>"Security violation","param"=>$jsonArray));
        die();
      }
    }
    else{
      echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation","param"=>$jsonArray));
      die();
    }
  }

}
?>
