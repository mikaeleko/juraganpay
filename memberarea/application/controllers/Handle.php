<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Handle extends CI_Controller {

	public function notfound()
	{
		$this->load->view('page_404');
    }
    
    public function underconstruction()
	{
		$this->load->view('page_underconstruction');
	}
}
