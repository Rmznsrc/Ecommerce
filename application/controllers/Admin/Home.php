<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                error_reporting(0);
              //  $this->load->model("Session_Model");
               
                /* 
                	if(!$this->session->userdata("admin_session"))
			    redirect(base_url().'login');
                */

                 
                
        }
	public function index()
	{
		$this->load->view('admin/shared/_header');
		$this->load->view('admin/shared/_sidebar');
		$this->load->view('admin/home/index');
		$this->load->view('admin/shared/_footer');
	}
}
