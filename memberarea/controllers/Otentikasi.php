<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/securimage/securimage.php');
class Otentikasi extends CI_Controller {

  function __construct(){
    parent::__construct();
$this->M_logger->access();

    $this->securimage = new Securimage();
  }

  public function index(){
    $this->load->view('v_login');
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
      $MyHash = sha1($ID . $PASS . $T);
      $MyTime = strtotime(date("Y/m/d H:i:s"));
      $interval = abs($MyTime-$TDate);
      $now = date("YmdHis");
      // die($MyHash);
        if($MyHash === $H){
          $query = $this->M_login->isLogin($ID);
          $is_connect = (isset($query->success))?false:true;

          if(!$is_connect){
            echo json_encode(array("status"=>"KONEKSI","pesan"=>"Koneksi Ke Server Gagal"));
            die();
          } else {
              if($interval < MAX_INTERVAL){

                    if($query) {
                      $getExp = $this->M_login->getExp($ID);

                      if($now <= $getExp->WEB_PASS_EXPDATE) {
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

                                  if($this->securimage->check($jsonArray['capcode']) == true) {
                                    $this->session->set_userdata($userData);
                                    echo json_encode(array("status"=>"SUCCSESS","TDate"=>$TDate));
                                    die();

                                  } else {
                                    echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"Kode Captcha Salah"));
                                    die();
                                  }

                              } else {
                                echo json_encode(array("status"=>"CHANGE PASSWORD","pesan"=>"Password Tidak memenuhi Syarat password minimal 8 karakter, mengandung huruf besar, huruf kecil dan angka!"));
                                die();
                              }

                          } else {
                              echo json_encode(array("status"=>"SHA256FAILED","pesan"=>"Password Yang Anda Masukan Salah!"));
                              die();
                          }

                      } else {
                        echo json_encode(array("status"=>"EXPIRED PASS", "pesan"=>"Password Anda Telah Expired, Silahakan Melakukan Reset Password!"));
                        die();
                      }

                    } else {
                      echo json_encode(array("status"=>"WRONG ID", "pesan"=>"ID Tidak Terdaftar!"));
                      die();
                    }

              } else {
                echo json_encode(array("status"=>"SECURE FAILED","pesan"=>"Security violation"));
                die();
              }
          }

        } else {
          echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation"));
          die();
        }

  }

}
