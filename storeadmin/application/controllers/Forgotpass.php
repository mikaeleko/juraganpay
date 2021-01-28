<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forgotpass extends CI_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index(){
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
    $random  = random_string('numeric', 6);

    // $data1['id']     = $id;
    // $data1['random'] = random_string('numeric', 6);

    $jsonArray  = json_decode(file_get_contents('php://input'),true);
    $ID          = $jsonArray['id'];
    $query       = $this->M_forgot->getUsername($ID);

    if($query) {
         $paramReset['username'] = $query->USER_NAME;
         $paramReset['store_id'] = $query->STORE_ID;
         $paramReset['random']   = $random;
         // if(isset($get['action'])){
         //   return $this->load->view('webreport_login',$paramReset);
         // }
         $affect = $this->M_forgot->reset_code($paramReset);

         if($affect > 0){
           $api_url = HOST_SEND_MSG.'?PhoneNumber='.$id.'&Text='.urlencode('Reset Code untuk penggantian Password Anda adalah:'.' '.$random);
           $ch = curl_init($api_url);
           curl_setopt($ch, CURLOPT_HEADER, true);
           curl_setopt($ch, CURLOPT_NOBODY, true);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
           curl_setopt($ch, CURLOPT_TIMEOUT,10);
           $output = curl_exec($ch);
           $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
           curl_close($ch);

           $data['api'] = $httpcode.' : '.$api_url;
           $data['affect'] = $affect;
           $data['status'] = 'SUKSES';
           $data['pesan'] = "Berhasil Reset Code";
           $data['username'] = $query->USER_NAME;
           $data['store_id'] = $query->STORE_ID;
         }else{
           $data['status'] = 'GAGAL';
           $data['pesan'] = "Gagal Update Data";
         }
         echo json_encode($data);
         die();
    }else{
       echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!","param"=>$jsonArray));
       die();
    }

  }

  // public function expired(){
  //   $get     = $this->input->get();
  //   $id      = isset($get['id']) ? $get['id'] : '';
  //   $random  = random_string('numeric', 6);
  //
  //   $data1['id']     = $id;
  //   $data1['random'] = random_string('numeric', 6);
  //
  //   $jsonArray  = json_decode(file_get_contents('php://input'),true);
  //   $ID          = $jsonArray['id'];
  //   $query       = $this->M_forgot->getUsername($ID);
  //
  //   if($query) {
  //        $paramReset['username'] = $query->USER_NAME;
  //        $paramReset['store_id'] = $query->STORE_ID;
  //        $paramReset['random']   = $random;
  //        if(isset($get['action'])){
  //          return $this->load->view('webreport_login',$paramReset);
  //        }
  //        $affect = $this->M_forgot->reset_code($paramReset);
  //
  //        if($affect){
  //          $api_url = API_HOST2.'?PhoneNumber='.$id.'&Text='.urlencode('Reset Code untuk penggantian Password Anda adalah:'.' '.$random);
  //          $ch = curl_init($api_url);
  //          curl_setopt($ch, CURLOPT_HEADER, true);
  //          curl_setopt($ch, CURLOPT_NOBODY, true);
  //          curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  //          curl_setopt($ch, CURLOPT_TIMEOUT,10);
  //          $output = curl_exec($ch);
  //          $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  //          curl_close($ch);
  //
  //          $data['api'] = $httpcode.' : '.$api_url;
  //          $data['affect'] = $affect;
  //          $data['status'] = 'SUKSES';
  //          $data['pesan'] = "Berhasil Reset Code";
  //          $data['username'] = $query->USER_NAME;
  //          $data['store_id'] = $query->STORE_ID;
  //        }else{
  //          $data['status'] = 'GAGAL';
  //          $data['pesan'] = "Gagal Update Data";
  //        }
  //        echo json_encode($data);
  //        die();
  //   }else{
  //      echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!","param"=>$jsonArray));
  //      die();
  //   }
  //
  // }


  public function resendCode(){
    $get     = $this->input->get();
    $id      = isset($get['id']) ? $get['id'] : '';
    $random  = random_string('numeric', 6);

    $jsonArray   = json_decode(file_get_contents('php://input'),true);
    $ID          = $jsonArray['id'];
    $query       = $this->M_forgot->getUsername($ID);

    if($query->USER_NAME != "") {
         $paramReset['username'] = $query->USER_NAME;
         $paramReset['store_id'] = $query->STORE_ID;
         $paramReset['random']   = $random;
         // if(isset($get['action'])){
         //   return $this->load->view('webreport_login',$paramReset);
         // }

         $affect = $this->M_forgot->reset_code($paramReset);

         if($affect > 0){
           $api_url = HOST_SEND_MSG.'?PhoneNumber='.$id.'&Text='.urlencode('Reset Code untuk penggantian Password Anda adalah:'.' '.$random);
           $ch = curl_init($api_url);
           curl_setopt($ch, CURLOPT_HEADER, true);
           curl_setopt($ch, CURLOPT_NOBODY, true);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
           curl_setopt($ch, CURLOPT_TIMEOUT,10);
           $output = curl_exec($ch);
           $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
           curl_close($ch);

           $data['api'] = $httpcode.' : '.$api_url;
           $data['affect'] = $affect;
           $data['status'] = 'SUKSES';
           $data['pesan'] = "Berhasil Reset Code";
           $data['username'] = $query->USER_NAME;
           $data['store_id'] = $query->STORE_ID;
         }else{
           $data['status'] = 'GAGAL';
           $data['pesan'] = "Gagal Update Data";
         }
         echo json_encode($data);
         die();
    }else{
       echo json_encode(array("status"=>"GAGAL","pesan"=>"ID Tidak Terdaftar!","param"=>$jsonArray));
       die();
    }
  }


  public function action_ganti_password(){
    $jsonArray  = json_decode(file_get_contents('php://input'),true);

    $affect = $this->M_akun->reset_code($jsonArray);
    if($affect > 0){
      $response['affect'] = $affect;
      $response['status'] = 'SUKSES';
      $response['pesan'] = "Berhasil Ubah Reset Code";
    }else{
      $response['status'] = 'GAGAL';
      $response['pesan'] = "Gagal Update Data";
    }
    echo json_encode($response);
    die();
  }

  public function forgot(){
    $this->load->view('webreport_resetpass');
  }

  public function reset_code(){
    $random    = random_string('numeric', 6);
    $jsonArray  = json_decode(file_get_contents('php://input'),true);
    $T          = $jsonArray['t'];
    $H          = $jsonArray['h'];
    $MyTime     = strtotime(date("Y/m/d H:i:s"));

    $id         = $jsonArray['id'];
    $MyHash     = sha1($id . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation","param"=>$jsonArray));
      die();
    }

  }


  function forgot_pass(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $idforgot  = $jsonArray['idforgot'];
    $username  = $jsonArray['username'];
    $store_id  = $jsonArray['store_id'];
    $resetcode = $jsonArray['resetcode'];
    $pwdnew    = $jsonArray['pwdnew'];
    $pwdconf   = $jsonArray['pwdconf'];
    $T         = $jsonArray['t'];
    $H         = $jsonArray['h'];
    $now       = date("YmdHis");
    $now2      = date('YmdHis', strtotime($T));
    $MyHash    = sha1($idforgot . $pwdnew . $pwdconf . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation","param"=>$jsonArray));
      die();
    }

    $affectcode = $this->M_forgot->cek_reset_code($jsonArray);
    // echo json_encode($affectcode);
    // die();
    if($affectcode->WEB_PASS_RESET_CODE == $resetcode){
        $expcode = $this->M_forgot->cekExpCode($jsonArray);
        // echo "RESET EXPIRE = ".$expcode->WEB_PASS_RESET_EXP."  DATE NOW = ". $now2;
        // die();

        if($now2 < $expcode->WEB_PASS_RESET_EXP) {
          // echo $expcode->WEB_PASS_RESET_EXP."----". $now2;
          // die();
          $data['pwdconf']  = $pwdconf;
          $data['uname']    = $affectcode->USER_NAME;;
          $data['store_id'] = $store_id;;
          $affect = $this->M_forgot->reset_pass($data);

              if($affect > 0){
                $response['status'] = 'SUKSES';
                $response['pesan'] = "Password Berhasil Di Reset";
              }else{
                $response['status'] = 'GAGAL';
                $response['pesan'] = 'GAGAL RESET PASSWORD';
              }
              echo json_encode($response);
              die();
        } else {
          $response['status'] = 'EXPIRED';
          $response['memo'] = "Reset Code Expired, Kirim Ulang Reset Code!";
        }

    } else {
      $response['cek'] = 'SALAH';
      $response['memo'] = 'Reset Code Yang Anda Masukan Salah, Cek Kembali Inbox Anda!';
    }
    echo json_encode($response);
    die();
  }

}
