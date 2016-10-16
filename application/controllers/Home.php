<?php

	/**
	* 
	*/
	class Home extends  CI_Controller
	{
		
		public function index()
		{
			echo 'Welcome User';
			
		   	echo $this->session->userdata('username');
		}	
	}
?>