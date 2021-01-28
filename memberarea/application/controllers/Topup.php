<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topup extends CI_Controller {

  function __construct(){
    parent::__construct();
$this->M_logger->access();

    $this->load->model('m_login');
    $sess = $this->session->userdata('status');

    if(isset($sess)){
        if($sess != "login"){
          redirect('otentikasi');
        }
    }else{
      redirect('otentikasi');
    }
  }

  public function index(){
    $data['propinsi'] = $this->M_akun->get_propinsi();
    $data['akun']     = $this->M_akun->get_akun();
    $this->load->view('v_topup', $data);
  }


  public function deposit(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $nominal   = $jsonArray['nominal'];
    $store_id  = $jsonArray['store_id'];
    $user_name = $jsonArray['user_name'];
    $type      = $jsonArray['type'];
    $code      = $jsonArray['code'];
    $sha       = $jsonArray['sha'];
    $msisdn    = $jsonArray['msisdn'];
    $T         = $jsonArray['t'];
    $H         = $jsonArray['h'];
    $MyHash    = sha1($jsonArray['type'] . $jsonArray['code'] . $jsonArray['nominal'] . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();
    } else {
      $authPin = $this->M_akun->get_pin($jsonArray);

      $idx  = $this->session->userdata('msisdn');
      $pinx = $authPin->PIN;

      // echo $pinx."--".$idx;
      // die();

      $shay = "sha256";
      $shax = hash('sha256',$shay.$idx);

      if($sha == $shax){
        $getPin = $this->M_akun->get_pin($jsonArray);
        if($getPin){
          $plain= 'send_sm_plain?msisdn='.$jsonArray['msisdn'].'&Text=TIKET'.'.'.$jsonArray['code'].'.' .$jsonArray['nominal']. '.' .$getPin->PIN.'&xmlin_id=W';
          // echo "PIN dari database=>" .$getPin->PIN ."<br><br> send_sm_plain=>".$plain;
          // die($plain);
          // die();
          $curl = curl_init();
          curl_setopt_array($curl, [
              CURLOPT_RETURNTRANSFER => 1,
              CURLOPT_URL => HOST_API.$plain
          ]);
          $resp = json_decode(curl_exec($curl));
          curl_close($curl);
          echo json_encode($resp,true);
        } else {
          echo "PIN TIDAK ADA";
        }
      } else {
        echo "AUTH FAILED";
      }
    }
  }

  public function send_email(){
    $jsonArray  = json_decode(file_get_contents('php://input'),true);

    $store_id   = $jsonArray['store_id'];
    $user_name  = $jsonArray['user_name'];
    $email      = $jsonArray['email'];
    $TIME       = $jsonArray['tt'];
    $HASH       = $jsonArray['hh'];
    $MyHash = sha1($email . $TIME);

    if($MyHash != $HASH){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Access violation"));
        die();
    } else {

        $affect = $this->M_akun->update_email($jsonArray);
        if($affect > 0){
          $response['status'] = 'SUKSES';
          $response['pesan']  = "Email Berhasil Diupdate";

        } else {
          $response['status'] = 'GAGAL';
          $response['pesan'] = "Gagal Update Email";
        }
        echo json_encode($response);
        die();
    }
  }



  public function send_topup(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $pm        = $jsonArray['pm'];
    $type      = $jsonArray['type'];
    $msisdn    = $jsonArray['msisdn'];

    $store_id    = $this->session->userdata('store_id');
    $user_name   = $this->session->userdata('username');
    $T           = $jsonArray['t'];
    $H           = $jsonArray['h'];
    $MyHash      = sha1($jsonArray['type'] . $jsonArray['pm'] . $T);

    if($MyHash != $H){
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      die();

    } else {

        if($type == "VA") {
          $user_name = $jsonArray['user_name'];
          $va   = $jsonArray['va'];
          $cn   = $jsonArray['cn'];
          $url = HOST_API_TOPUP.'va/registration?msisdn='.$msisdn.'&pay_method='.$pm.'&store_id='.$store_id.'&user_name='.$user_name.'&customer_name='.$jsonArray['cn'].'&bank_code='.$jsonArray['va'];
          $curl = curl_init();
          curl_setopt_array($curl, [
              CURLOPT_RETURNTRANSFER => 1,
              CURLOPT_SSL_VERIFYHOST =>false,
              CURLOPT_SSL_VERIFYPEER =>false,
              CURLOPT_URL => $url
          ]);

        } else if ($type == "CVS"){

          $user_name = $jsonArray['user_name'];
          $nominal   = $jsonArray['nominal'];
          $biaya     = $jsonArray['biaya'];
          $mitra     = $jsonArray['mitra'];
          $total     = $nominal + $biaya;

          $url  = HOST_API_TOPUP.'registration?msisdn='.$msisdn.'&pay_method='.$pm.'&store_id='.$store_id.'&user_name='.$user_name.'&mitra_code='.$mitra.'&amt='.$total;
          $curl = curl_init();
          curl_setopt_array($curl, [
              CURLOPT_RETURNTRANSFER => 1,
              CURLOPT_SSL_VERIFYHOST =>false,
              CURLOPT_SSL_VERIFYPEER =>false,
              CURLOPT_URL => $url
          ]);

        } else if ($type == "EWALLET"){
          $user_name  = $jsonArray['user_name'];
          $walet      = $jsonArray['walet'];
          $nohp       = $jsonArray['nohp'];
          $nominal    = $jsonArray['nominal'];
          $biaya      = $jsonArray['biaya'];
          $total      = $nominal + $biaya;
          $url  = HOST_API_TOPUP.'registration?msisdn='.$msisdn.'&billing_phone='.$nohp.'&pay_method='.$pm.'&store_id='.$store_id.'&user_name='.$user_name.'&mitra_code='.$walet.'&amt='.$total;
          $curl = curl_init();
          curl_setopt_array($curl, [
              CURLOPT_RETURNTRANSFER => 1,
              CURLOPT_SSL_VERIFYHOST =>false,
              CURLOPT_SSL_VERIFYPEER =>false,
              CURLOPT_URL => $url
          ]);
        }

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        echo json_encode($resp,true);
    }

  }


  public function get_biaya(){
      $jsonArray = json_decode(file_get_contents('php://input'),true);
      $T         = $jsonArray['t'];
      $H         = $jsonArray['h'];
      $mitra_code     = $jsonArray['mitra_code'];
      $MyHash    = sha1($jsonArray['mitra_code'] . $T);

      if($MyHash != $H){
        echo json_encode(array("status"=>"GAGAL HASH","pesan"=>"Security violation"));
        die();
      } else {
         $url  = HOST_API_TOPUP.'get_biaya?bank_mitra_code='.$mitra_code;
         $curl = curl_init();
         curl_setopt_array($curl, [
             CURLOPT_RETURNTRANSFER => 1,
             CURLOPT_SSL_VERIFYHOST =>false,
             CURLOPT_SSL_VERIFYPEER =>false,
             CURLOPT_URL => $url
         ]);
         $respon = json_decode(curl_exec($curl));
         curl_close($curl);
         echo json_encode($respon,true);
      }
  }




 }
