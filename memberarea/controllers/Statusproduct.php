<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statusproduct extends CI_Controller {

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
    $data['prv'] = $this->M_statusproduct->get_provider();
    $this->load->view('v_statusproduct', $data);
  }

  public function cekoutlet(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T   = $jsonArray['t'];
    $H   = $jsonArray['h'];
    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

    $MyHash = sha1($jsonArray['username'] . $jsonArray['store_id'] . $jsonArray['nom'] . $jsonArray['price'] . $T);

    if ($MyHash == $H){
       $cek = $this->M_statusproduct->cekoutlet($jsonArray);       

       if($cek){
         $this->M_statusproduct->updateoutlet($jsonArray);
         echo json_encode(array("status"=>"SUKSES UPDATE","pesan"=>"BERHASIL UPDATE DATA"));
         die();
       } else {
         $insert = $this->M_statusproduct->insertoutlet($jsonArray);
         echo json_encode(array("status"=>"SUKSES INSERT","pesan"=>"BERHASIL TAMBAH DATA"));
         die();
       }

    } else {
      echo json_encode(array("status"=>"Hashing Failed","pesan"=>"Security violation"));
      die();
    }

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


    if($MyHash === $H){
       if($interval > MAX_INTERVAL){
         echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
         die();
       }

     }else{
       echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
       die();
     }


    $jsonArray['store_id'] = $this->session->userdata('store_id');
    $result = $this->M_statusproduct->cari($jsonArray);
    echo json_encode($result);
    die();
  }

  public function exportcsv(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T         = $jsonArray['t'];
    $H         = $jsonArray['h'];
    $pr        = $jsonArray['prv'];

    $TDate    = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $MyHash   = sha1($jsonArray['key'] .$this->session->userdata('username') . $this->session->userdata('kd_price_plan') . $T);
    $MyTime   = strtotime(date("Y/m/d H:i:s"));
    $interval = abs($MyTime-$TDate);


   if($MyHash === $H){
      if($interval > MAX_INTERVAL){
        echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
        return;
      }

    }else{
      echo json_encode(array("status"=>"GAGAL","pesan"=>"Security violation"));
      return;
    }


   $jsonArray['store_id'] = $this->session->userdata('store_id');
   $result = $this->M_statusproduct->exportcsv($jsonArray);
   echo json_encode($result);
   return;
  }


}