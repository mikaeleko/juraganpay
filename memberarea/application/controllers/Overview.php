<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct(); 
$this->M_logger->access();
	}

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("overview");
	}
}
?>
