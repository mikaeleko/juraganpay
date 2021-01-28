<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class index extends CI_Controller{

  function securimage() {
  $this->load->library('securimage');
  $img = new Securimage();
  $img->show();
  // alternate use: $img->show('/path/to/background.jpg');
  }

}


 ?>
