<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GrupNotifikasi extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
    $sess = $this->session->userdata('status');
    // echo json_encode($sess);
    if(isset($sess)){
        if($sess != "login"){
          redirect('otentikasi');
        }
        $this->data_sess = $this->session->userdata();
    }else{
      redirect('otentikasi');
    }
  }

  public function index(){
    $this->load->view('v_cari');
  }

  public function inbox(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $this->security($jsonArray);

    $data['username'] = $this->data_sess['username'];
    $data['store_id'] = $this->data_sess['store_id'];
    $result = $this->M_grupnotifikasi->getInbox($data);
    echo json_encode($result);
    die();
  }

  public function inboxupdate(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $this->security($jsonArray);
    $data['username'] = $this->data_sess['username'];
    $data['store_id'] = $this->data_sess['store_id'];
    $result = $this->M_grupnotifikasi->inboxUpdate($data);
    echo json_encode(["status"=>"SUKSES"]);
    die();
  }

  public function news(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $this->security($jsonArray);

    $data['username'] = $this->data_sess['username'];
    $data['store_id'] = $this->data_sess['store_id'];
    $result = $this->M_grupnotifikasi->getNews($data);
    echo json_encode($result);
    die();
  }

  public function newsread(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $this->security($jsonArray);
    $data['username'] = $this->data_sess['username'];
    $data['store_id'] = $this->data_sess['store_id'];
    $result = $this->M_grupnotifikasi->get_news_is_read_0($data);
    foreach($result as $row){
      $this->M_grupnotifikasi->news_read($row->NEWS_DATE2,$data['store_id'],$data['username']);
    }
    echo json_encode(["status"=>"SUKSES"]);
    die();
  }

  function security($jsonArray){
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));
    $TDate = strtotime($T);
    $MyHash = sha1($T);
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
  }

}
