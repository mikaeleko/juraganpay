<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cetakstruk extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
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
    $this->load->view('v_cetakstruk');
  }

  public function cari(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

    $MyHash = sha1($jsonArray['key'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);

    if($MyHash === $H){
       if($interval > MAX_INTERVAL){
         echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
         die();
       }
     }else{
       echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
       die();
     }

    $result = $this->M_cetakstruk->cari($jsonArray);
	foreach($result as $row){
      $data['messageid'] = $row->MESSAGEID;
	    $raw_struk = $this->M_cetakstruk->raw_struk($data);
      $row->T_RAW_STRUK = $raw_struk?$raw_struk:null;
    }
    echo json_encode($result);
    die();
  }



  public function carimessageid(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
  
    $MyHash = sha1($jsonArray['messageid'] . $jsonArray['key'] . $jsonArray['store_id'] . $jsonArray['uname'] . $T);
    $MyTime = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);



    if($MyHash === $H){
       if($interval > MAX_INTERVAL){
         echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
         die();
       }
     }else{
       echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
       die();
     }

    $result = $this->M_cetakstruk->cariNomorDanMessageId($jsonArray);
  	foreach($result as $row){
        $data['messageid'] = $row->MESSAGEID;
  	    $raw_struk = $this->M_cetakstruk->raw_struk($data);
        $row->T_RAW_STRUK = $raw_struk?$raw_struk:null;
      }
    echo json_encode($result[0]);
    die();
  }
}
