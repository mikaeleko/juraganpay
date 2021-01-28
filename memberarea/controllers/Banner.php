<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Banner extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();

  }



  public function index(){
    $this->load->view('v_utama');
  }
  public function index2(){
    $data['banner'] = $this->M_banner->view();
    $this->load->view('banner/index', $data);
  }

  public function tambah(){
    if($this->input->post('submit')){
      if($this->M_banner->validation("save")){
        $this->M_banner->save();
        redirect('banner');
      }
    }
    $this->load->view('banner/insert_banner');
  }

  public function ubah($rowid){
    if($this->input->post('submit')){
      if($this->M_banner->validation("update")){
        $this->M_banner->edit($rowid);
        redirect('banner');
      }
    }

    $data['banner'] = $this->M_banner->view_by($rowid);
    $this->load->view('banner/form_ubah', $data);
  }

  public function hapus($rowid){
    $this->M_banner->delete($rowid);
    redirect('banner');
  }

  public function updatenomorfavorit(){
    $jsonArray = json_decode(file_get_contents('php://input'),true);
    $T        = $jsonArray['t'];
    $H        = $jsonArray['h'];

    $TDate  = strtotime(date("Y/m/d H:i:s",strtotime($T)));

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

    $result = $this->M_banner->delete($rowid);

    echo json_encode(array("status"=>"SUKSES","pesan"=>"","result"=>$jsonArray['list'],"list_update"=>$list_update));
  }
}
