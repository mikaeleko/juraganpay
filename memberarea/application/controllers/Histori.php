<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Histori extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
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
    $session = $this->session->userdata();
    $this->load->view('v_histori');
  }

  public function cari(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

     $MyHash = sha1($jsonArray['no_hp'] . $jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['trans_stat'] . $jsonArray['store_id'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
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

    // $result= [];
    // if ($jsonArray['start_date'] == "" || $jsonArray['end_date'] == "") {
    //   $result = $this->M_histori->list_histori($jsonArray);
    // } else {
    //   $result = $this->M_histori->cari($jsonArray);
    //   $chart_bottom = $this->M_histori->chart_bottom($jsonArray);
    // }
    $result = $this->M_histori->cari($jsonArray);
    $chart_bottom = $this->M_histori->chart_bottom($jsonArray);
    $response['result'] = $result;
    $response['chart_bottom'] = $chart_bottom;
    echo json_encode($response);
    die();
  }


  public function exportdata(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

     $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     $MyHash = sha1($jsonArray['no_hp']. $jsonArray['start_date'] . $jsonArray['end_date'] . $jsonArray['trans_stat'] . $jsonArray['store_id'] . $jsonArray['uname'] . $T);
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

    // $result= [];
    // if ($jsonArray['start_date'] == "" || $jsonArray['end_date'] == "") {
    //   $result = $this->M_histori->list_histori($jsonArray);
    // }else{
    //   $result = $this->M_histori->export_data($jsonArray);
    // }

    $result = $this->M_histori->export_data($jsonArray);

    echo json_encode($result);
    die();
  }

}
