<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	class notfound extends CI_Controller
	{

		public function __construct()
		{	
			parent::__construct();
		}
  	
		public function index()
		{	
			$data['title'] = '404 Not Found';
			$this->load->view('layout/header',$data);
			$this->load->view('layout/navbar');
			$this -> load -> view('auth/notfound');
			$this -> load -> view('layout/footer'); 
		}
}	
?>