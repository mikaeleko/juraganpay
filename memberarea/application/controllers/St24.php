<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class St24 extends CI_Controller {

  function __construct(){
    parent::__construct(); 
$this->M_logger->access();
    //$this->load->model('m_banner','',TRUE);
    //$this->load->model(site_url('m_banner'));
  }

  public function index(){
    $this->load->view('homewebsite');
  }

  public function webreport(){
    $this->load->view('v_login');
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
}
