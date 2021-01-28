<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'libraries/securimage/securimage.php');
class Jabbers extends CI_Controller{
  function __construct(){
    parent::__construct(); 
    $this->M_logger->access();
    $sess = $this->session->userdata('status');
    if(isset($sess)){
        if($sess != "login"){
          redirect('webreport');
        }
    }
  $this->load->library('command');
  $this->securimage = new Securimage();
  }

  public function index(){
    $this->load->view('webreport_jabbers');
  }

  function securimage(){
    $img = new Securimage();
    $img->show();
  }

  public function registrasi(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $usr_jabber  = $jsonArray['usr_jabber'];
    $srv_jabber  = $jsonArray['srv_jabber'];
    $pass_jabber  = $jsonArray['pass_jabber'];
    $pass_ver    = $jsonArray['pass_ver'];
    $capcode    = $jsonArray['capcode'];
    $T           = $jsonArray['t'];
    $H           = $jsonArray['hash'];
    $MyHash      = sha1($jsonArray['usr_jabber'] . $jsonArray['srv_jabber'] . $jsonArray['pass_jabber'] . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
      die();
    } else {

      if($this->securimage->check($jsonArray['capcode']) == true){
        $command = new Command();
        $command_text = 'ejabberdctl register'.' '.$usr_jabber.' '.$srv_jabber.' '.$pass_jabber;
        $result_command = $command->terminal($command_text);
        $preg = preg_match("/successfully/", $result_command);
        $sukses = $usr_jabber.'@'.$srv_jabber.' '.'berhasil di-create di jabber'.' '.'server'.' '.$srv_jabber;
        $gagal = 'Gagal create user'.' '.$usr_jabber.'@'.$srv_jabber.' '.'di jabber'.' '.'server'.' '.$srv_jabber;
            if($preg == "1"){
              echo json_encode(array("status"=>"SUKSES", "preg"=>$preg, "pesan"=>$sukses, "command"=>$result_command.' ==> '.$command_text,"param"=>$jsonArray));
              die();
            } else {
              echo json_encode(array("status"=>"GAGAL", "preg"=>$preg, "pesan"=>$gagal, "command"=>$result_command,"param"=>$jsonArray));
              die();
            }
        echo json_encode(array("status"=>"SUCCSESS","pesan"=>"Captcha Cocok"));
        die();
      } else {
        echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"Kode Captcha Salah","param"=>$jsonArray));
        die();
      }
    }
  }

  //registrasi ke st24.co.id
  public function registrasiv2(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $usr_jabber  = $jsonArray['usr_jabber'];
    $srv_jabber  = $jsonArray['srv_jabber'];
    $pass_jabber  = $jsonArray['pass_jabber'];
    $pass_ver    = $jsonArray['pass_ver'];
    $capcode    = $jsonArray['capcode'];
    $T           = $jsonArray['t'];
    $H           = $jsonArray['hash'];
    $MyHash      = sha1($jsonArray['usr_jabber'] . $jsonArray['srv_jabber'] . $jsonArray['pass_jabber'] . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
      die();
    } else {
      if($this->securimage->check($jsonArray['capcode']) == true){
        $host = 'st24.co.id';
        $username = $usr_jabber;
        $password = $pass_jabber;
        $password2 = $pass_ver;
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => HOST_API_JABBER,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_POSTFIELDS => 'username='.$username.'&host='.$host.'&password='.$password.'&password2='.$password2
        ]);
        $resp = curl_exec($curl);
        curl_close($curl);
        //jika mengandung kata successfully
        $preg = preg_match("/successfully/", $resp);
        if($preg == "1"){
          echo json_encode(
            array(
              "status"=>"SUKSES",
              "preg"=>$preg,
              "pesan"=>$resp
            )
          );
          die();
        } else {
          echo json_encode(
            array(
              "status"=>"GAGAL",
              "preg"=>$preg,
              "pesan"=>$resp
            )
          );
          die();
        }

      } else {
        echo json_encode(array("status"=>"CAPTCHA FAILED","pesan"=>"Kode Captcha Salah","param"=>$jsonArray));
        die();
      }
    }
  }

  function kapca(){
    $this->load->view('kapca');
  }

  function prosesKapca(){
    $post = $this->input->post();
    if($this->securimage->check($post['captcha_code'])){
      die('OK');
    }else{
      die('NOT OK >> '.json_encode($_SESSION));
    }
  }

}

 ?>
