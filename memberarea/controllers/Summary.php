<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Summary extends CI_Controller {

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
    $this->load->view('v_summary');
  }

  public function cari(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T         = $jsonArray['t'];
    $H         = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
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
    $result= [];

    if ($jsonArray['start_date'] == "" || $jsonArray['end_date'] == "") {
      $result = $this->M_summary->list_summary($jsonArray);
    }else{
      $result = $this->M_summary->cari($jsonArray);
    }

    echo json_encode($result);
    die();
  }
}
