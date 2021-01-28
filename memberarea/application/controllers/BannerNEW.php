<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Banner extends CI_Controller {

  function __construct(){
    parent::__construct();
    //$this->load->model('m_banner','',TRUE);
    //$this->load->model(site_url('m_banner'));
    if($this->session->userdata('status')!="login"){
			redirect(base_url('login'));
		}
  }

  // public function index(){
  //   $this->load->view('banner/login');
  // }

  public function index(){
    $data['banner'] = $this->M_banner->view();
    $this->load->view('banner/index', $data);
  }

  // public function index(){
  //   $data = $this->M_banner->view();
  //   echo json_encode($data);
  // }

  function simpan_banner(){

		$nabar=$this->input->post('imgname');
		$harga=$this->input->post('url');
		$data=$this->m_banner->simpan_banner($imgname,$url);
		echo json_encode($data);
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

  function tambah_banner(){

        $nabar=$this->input->post('imgname');
        $harga=$this->input->post('url');
        $data=$this->m_banner->save($kobar,$nabar,$harga);
        echo json_encode($data);
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
