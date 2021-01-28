<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Balancedebitcredit extends CI_Controller {

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
    $this->load->view('v_balance_debit_credit');
  }

  public function cari(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

     $MyHash = sha1($jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['lvl'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
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
        $result = [];
    }else{
        $jsonArray['start_date'] = date("d-m-Y",strtotime($jsonArray['start_date']));
        $jsonArray['end_date'] = date("d-m-Y",strtotime($jsonArray['end_date']));
        $result = $this->M_balance_debit_credit->cari($jsonArray['lvl'],$jsonArray);
    }

    echo json_encode($result);
    die();
  }

  //untuk export csv
  public function exportdata(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

     $MyHash = sha1($jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['lvl'] . $jsonArray['store_id'] . $jsonArray['uname'] . $T);
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
      $result = [];
    }else{
      $jsonArray['start_date'] = date("d-m-Y",strtotime($jsonArray['start_date']));
      $jsonArray['end_date'] = date("d-m-Y",strtotime($jsonArray['end_date']));
      $result = $this->M_balance_debit_credit->export($jsonArray['lvl'],$jsonArray);
    }

    echo json_encode($result);
    die();
  }

}
