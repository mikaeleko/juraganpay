<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statusproduct extends CI_Controller {

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
    $data['prv'] = $this->M_statusproduct->get_provider();
    $this->load->view('webreport_statusproduct', $data);
  }

  public function cari(){
     $jsonArray = json_decode(file_get_contents('php://input'),true);
     $T         = $jsonArray['t'];
     $H         = $jsonArray['h'];
     $pr        = $jsonArray['prv'];

     $TDate    = strtotime(date("Y/m/d H:i:s",strtotime($T)));
     if($pr !=""){
       $MyHash   = sha1($jsonArray['key'] . $jsonArray['prv'] . $jsonArray['kode'] . $jsonArray['level'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
     } else {
       $MyHash   = sha1($jsonArray['key'] . $jsonArray['kode'] . $jsonArray['level'] . $jsonArray['uname'] . $jsonArray['offset'] . $jsonArray['limit'] . $T);
     }
     $MyTime   = strtotime(date("Y/m/d H:i:s"));
     $interval = abs($MyTime-$TDate);

     // echo json_encode(array("status"=>"TESTING","INTERVAL"=>$interval, "TDate"=>$TDate, "H"=>$H, "MyHash"=>$MyHash, "param"=>$jsonArray));
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

    //$result = $this->M_cari->cari($jsonArray);
    // if ($jsonArray['key'] == "") {
    //   $result = $this->M_statusproduct->list_statusproduct($jsonArray);
    // }else{
    //   $result = $this->M_statusproduct->cari($jsonArray);
    // }
    $jsonArray['store_id'] = $this->session->userdata('store_id');
    $result = $this->M_statusproduct->cari($jsonArray);
    echo json_encode($result);
    die();
  }

  // if ($jsonArray['tag'] == "") {
  //   $result = $this->M_statusproduct->list_statusproduct($jsonArray);
  // }else{
  //   $result = $this->M_statusproduct->cari($jsonArray);
  // }
}
