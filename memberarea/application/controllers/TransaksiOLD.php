<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi extends CI_Controller {

  function __construct(){
    parent::__construct();
  }

  public function index(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        $T        = $jsonArray['t'];
        $H        = $jsonArray['h'];

        $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
        // $TDate = strtotime($T);
        $MyHash = sha1($this->session->userdata('username') . $jsonArray['text'] . $T);
        $MyTime = strtotime(date("Y/m/d H:i:s"));
        $interval = abs($MyTime-$TDate);


        // echo json_encode(array("status"=>"TESTING","INTERVAL"=>$interval,"TDate"=>$TDate,"param"=>$jsonArray));
        // die();

        if($MyHash === $H){
           if($interval > MAX_INTERVAL){
             echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
             die();
           }
         }else{
           echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
           die();
         }

        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        $api = HOST_API.'send_sm_plain?msisdn='.$jsonArray['msisdn'].'&Text='.$jsonArray['text'] .'&xmlin_id=W';
        //$api = 'http://10.10.100.8:3500/send_sm_plain?msisdn='.$jsonArray['msisdn'].'&Text='.$jsonArray['text'] .'&xmlin_id=W';
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            //CURLOPT_URL => 'http://10.20.10.54:3500/send_sm_plain?msisdn=6281317792224&Text='.$jsonArray['text'] .'&xmlin_id=W'
            // CURLOPT_URL => HOST_API.'send_sm_plain?msisdn=6289613806717&Text='.$jsonArray['text'].'&xmlin_id=W'
            CURLOPT_URL => $api
        ]);
        // Send the request & save response to $resp
        $resp = json_decode(curl_exec($curl));
        // Close request to clear up some resources
        curl_close($curl);
        //jika
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



  public function bayar(){
        $jsonArray = json_decode(file_get_contents('php://input'),true);
        $T        = $jsonArray['t'];
        $H        = $jsonArray['h'];

        $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
        // $TDate = strtotime($T);
        $MyHash = sha1($this->session->userdata('msisdn') . $jsonArray['text'] . $T);
        $MyTime = strtotime(date("Y/m/d H:i:s"));
        $interval = abs($MyTime-$TDate);


        // echo json_encode(array("status"=>"TESTING","INTERVAL"=>$interval,"TDate"=>$TDate,"param"=>$jsonArray));
        // die();

        if($MyHash === $H){
           if($interval > MAX_INTERVAL){
             echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation","param"=>$jsonArray));
             die();
           }
         }else{
           echo json_encode(array("status"=>"HASHING FAILED","pesan"=>"Security violation","param"=>$jsonArray));
           die();
         }

        // Get cURL resource
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://10.20.10.54:3500/send_sm_plain?msisdn=6289613806717&Text='.$jsonArray['text'] .'&xmlin_id=W'
            // CURLOPT_URL => HOST_API.'send_sm_plain?msisdn=6289613806717&Text='.$jsonArray['text'].'&xmlin_id=W'
            // CURLOPT_URL => HOST_API.'send_sm_plain?msisdn='.$jsonArray['msisdn'].'&Text='.$jsonArray['text'] .'&xmlin_id=W'
        ]);
        // Send the request & save response to $resp
        $resp = json_decode(curl_exec($curl));
        // Close request to clear up some resources
        curl_close($curl);
        //jika
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
