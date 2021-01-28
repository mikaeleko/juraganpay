<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Printview extends CI_Controller {

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
    $this->load->view('v_print');
  }

  public function set(){
      $cookie= array(
          'size_height'   => 'remember_me',
          'font_size'  => 'test',                            
          'line_footer' => '300',                                                                                   
          'border' => '',
          'text_footer' => '',
      );

      $this->input->set_cookie($cookie);

      redirect($_SERVER['HTTP_REFERER']);

  }

}
