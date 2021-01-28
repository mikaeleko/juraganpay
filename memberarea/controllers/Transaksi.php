<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi extends CI_Controller {

  function __construct(){
    parent::__construct();
$this->M_logger->access();

    if($this->M_login->is_ip_black_list()){
      die(json_encode(array("status"=>"GAGAL","pesan"=>"Access Violation! (-1), Silakan hubungi CS kami")));
    }

  }

  public function index(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        $client_time         = $jsonArray['t'];
        $client_hash         = $jsonArray['h'];
        // $type      = $jsonArray['type'];
        // $x         = $jsonArray['x'];        
        // $authpin   = $jsonArray['authpin'];
        // $store_id     = $jsonArray['store_id'];
        // $user_name    = $jsonArray['user_name'];
        $text         = $jsonArray['text'];


        // if($type != "TAGIHAN"){
        //   $kodeProduk = $jsonArray['kodeProduk'];
        //   $no_Tujuan = $jsonArray['no_Tujuan'];
        //   $input_RO = $jsonArray['input_RO'];
        //   $server_hash = sha1($this->session->userdata('username') . $jsonArray['kodeProduk'] . ".".$jsonArray['no_Tujuan'] . $T);
        // }else{
        //   $server_hash = sha1($this->session->userdata('username') . $jsonArray['text'] . $T);
        // }

        $server_hash = sha1($this->session->userdata('username') . $jsonArray['text'] . $client_time);

        $time_client    = strtotime(date("Y/m/d H:i:s",strtotime($client_time)));
        $time_server   = strtotime(date("Y/m/d H:i:s"));
        $interval = abs($time_server-$time_client);


        if($server_hash === $client_hash){
           if($interval > MAX_INTERVAL){
             echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
             die();
           } else {
              $curl = curl_init();
              $headers = array(
              'x_access_token: '.$this->input->cookie('x_access_token', TRUE)
              );
              $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
              // if($type == "TAGIHAN"){
              //   $api = HOST_API.'api/v3/send_sm?uuid='.$uuid.'&msg='.$jsonArray['text'].$pinx.'&xmlin_id=W';
              // } else {
              //   $api = HOST_API.'api/v3/send_sm?uuid='.$uuid.'&msg='.$jsonArray['text'].'.'.$pinx.$input_RO.'&xmlin_id=W';
              // }
              $text = str_replace('[[PIN]]','<PIN>',$jsonArray['text']);//[[PIN]] dari trx pembayaran cek tagihan
              $api = HOST_API.'api/v3/send_sm?uuid='.$uuid.'&msg='.$text.'&xmlin_id=W';

              curl_setopt_array($curl, [
                  CURLOPT_RETURNTRANSFER => 1,
                  CURLOPT_URL => $api,
                  CURLOPT_HTTPHEADER => $headers
              ]);

              $resp = json_decode(curl_exec($curl));

              curl_close($curl);

              if (!(strpos($jsonArray['text'], 'TAG') !== false)) {
                if(isset( explode("ID=",$resp->Rows[0]->MESSAGE) [1] ) ) {
                    $explode1   = explode("ID=", $resp->Rows[0]->MESSAGE)[1];
                    $explode2   = explode(",",$explode1)[0];
                    $message_id = $explode2;
                    $data['messageid'] = $message_id;
                    $raw_struk = $this->M_cetakstruk->raw_struk($data);
                    if($raw_struk){
                      $resp->Rows[0]->MESSAGE = $raw_struk->STRUK;
                    }
                }
              }
              echo json_encode($resp,true);
              die();
           }

         }else{
           echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
           die();
         }

  }



  public function bayar(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        $T        = $jsonArray['t'];
        $H        = $jsonArray['h'];

        $time_client  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
        $server_hash = sha1($this->session->userdata('msisdn') . $jsonArray['text'] . $T);
        $time_server = strtotime(date("Y/m/d H:i:s"));
        $interval = abs($time_server-$time_client);


        if($server_hash === $H){
           if($interval > MAX_INTERVAL){
             echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
             die();
           }
         }else{
           echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation"));
           die();
         }

        $headers = array(
          'x_access_token: '.$this->input->cookie('x_access_token', TRUE)
        );
        $uuid = hash('sha256','C1PT4$OLu$1'.$this->input->cookie('uuid', TRUE));
        $curl = curl_init();
        $url = HOST_API.'api/v3/send_sm?uuid='.$uuid.'&msg='.$jsonArray['text'] .'&xmlin_id=W';
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $headers
        ]);

        $resp = json_decode(curl_exec($curl));
        curl_close($curl);

        if (!(strpos($jsonArray['text'], 'TAG') !== false)) {
          if(isset(explode("ID=",$resp->Rows[0]->MESSAGE)[1])){
            $explode1 = explode("ID=",$resp->Rows[0]->MESSAGE)[1];
            $explode2 = explode(",",$explode1)[0];
            $message_id = $explode2;
            $data['messageid'] = $message_id;
            $raw_struk = $this->M_cetakstruk->raw_struk($data);
            if($raw_struk){
              $resp->Rows[0]->MESSAGE = $raw_struk->STRUK;
            }
          }
        }

        echo json_encode($resp,true);
  }

}
