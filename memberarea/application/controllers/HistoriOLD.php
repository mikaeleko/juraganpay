<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Histori extends CI_Controller {

  function __construct(){
    parent::__construct();
    $sess = $this->session->userdata('status');
    // echo json_encode($sess);
    if(isset($sess)){
        if($sess != "login"){
          redirect('otentikasi');
        }
    }else{
      redirect('otentikasi');
    }
  }

  public function index(){
    $this->load->view('webreport_histori');
  }

  public function cari(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     // $TDate = strtotime($T);
     $MyHash = sha1($jsonArray['no_hp'] . $jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['trans_stat'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
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

    $result= [];
    if ($jsonArray['start_date'] == "" || $jsonArray['end_date'] == "") {
      $result = $this->M_histori->list_histori($jsonArray);
    }else{
      $result = $this->M_histori->cari($jsonArray);
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
     // $TDate = strtotime($T);
     $MyHash = sha1($jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['trans_stat'] . $jsonArray['store_id'] . $jsonArray['uname'] . $T);
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

    $result= [];
    if ($jsonArray['start_date'] == "" || $jsonArray['end_date'] == "") {
      $result = $this->M_histori->list_histori($jsonArray);
    }else{
      $result = $this->M_histori->export_data($jsonArray);
    }

    echo json_encode($result);
    die();
  }

}
