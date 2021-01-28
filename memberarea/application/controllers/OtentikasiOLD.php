<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/securimage/securimage.php');
class Otentikasi extends CI_Controller {

  function __construct(){
    parent::__construct();
    $sess = $this->session->userdata('status');
    if(isset($sess)){
        if($sess == "login"){
          redirect('webreport');
        }
    }

    $this->securimage = new Securimage();
  }

public function index(){
  $this->load->view('webreport_login');
}

function securimage(){
  $img = new Securimage();
  $img->show();
}

function setSecurimageOptions(){
    $this->securimage->image_width = 190;
     $this->securimage->image_height = 60;
     $this->securimage->image_bg_color = new Securimage_Color(227, 218, 237);
     $this->securimage->line_color = new Securimage_Color(51, 51, 51);
     $this->securimage->num_lines = 5;

     $this->securimage->use_multi_text = true;
     $this->securimage->multi_text_color = array(
          new Securimage_Color(184, 4, 50),
          new Securimage_Color(12, 67, 157),
          new Securimage_Color(244, 49, 11)
     );
     $this->securimage->text_color = new Securimage_Color(184, 4, 50);
}

public function displayCaptchaPicture() {
     $this->securimage = new Securimage();
     $this->setSecurimageOptions();
     $this->securimage->show();
}




// public function captcha_check(){
//     $img = new Securimage();
//     $input = $this->input->post('imagecode');
//     $result = $img->check($input);
//
//     if($result)
//         $message = "success";
//     else
//         $message = "try again";
// }


  function cek_login(){

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
         $query = $this->M_login->isLogin($ID);
         // die(json_encode($query));
         $is_connect = (isset($query->success))?false:true;

         if(!$is_connect){

           echo json_encode(array("status"=>"KONEKSI","pesan"=>"Koneksi Ke Server Gagal"));
           die();
         } else {

              if($interval < MAX_INTERVAL){

                   if($query) {
                      $getExp = $this->M_login->getExp($ID);
                      // die();
                      // die(json_encode($getExp));
                      // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
                      // die();

                      if($now <= $getExp->WEB_PASS_EXPDATE) {
                        // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
                        // die();
                        // if($query->WEB_PASS == $jsonArray['pass']){
                        $idx   = $query->USER_NAME;
                        $pwdx  = $query->WEB_PASS;
                        $sha   = hash('sha256',$ID.$pwdx);
                          if($PASS === $sha){

                              if($REGEXRESULT == "1"){
                                  $userData = array(
                                    'username'       => $query->USER_NAME,
                                    'fullname'       => $query->FULL_NAME,
                                    'store_id'       => $query->STORE_ID,
                                    'msisdn'         => $query->MSISDN,
                                    'lvl'            => $query->LVL,
                                    'kd_price_plan'  => $query->KODE_PRICE_PLAN,
                                    'user_img_name'  => $query->USER_IMG_NAME,
                                    'pin'            => $query->PASS,
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
                              echo json_encode(array("status"=>"SHA256FAILED","pesan"=>"Password Yang Anda Masukan Salah!","param"=>$jsonArray));
                              die();
                          }

                      } else {
                        // echo "ExpDate => ".$getExp->WEB_PASS_EXPDATE." "."NowDate => ".$now;
                        // die();
                       echo json_encode(array("status"=>"EXPIRED PASS","username"=>$query->USER_NAME, "store_id"=>$query->STORE_ID,"pesan"=>"Password Anda Telah Expired, Silahakan Melakukan Reset Password!","param"=>$jsonArray));
                       die();
                      }


                   } else {
                     echo json_encode(array("status"=>"WRONG ID", "pesan"=>"ID Tidak Terdaftar!","param"=>$jsonArray));
                     die();
                   }


              } else {
                echo json_encode(array("status"=>"SECURE FAILED","pesan"=>"Security violation","param"=>$jsonArray));
                die();
              }
         }

       } else {
          echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation","param"=>$jsonArray));
          die();
       }


  }

}
