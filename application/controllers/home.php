<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {
	public function __construct(){
		parent::__construct();
       
        // if(!($this->session->has_userdata("state")))
    		// {
        //         $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //         redirect(base_url()."index.php/welcome/login");
        //     }

	}



	public function index()
	{ 	

		$this->load->view('accue');

		//$this->load->view('accueil');
		//$this->load->view('img');
		//$this->load->view('accueil');
		//$this->load->view('accueil');
		//$this->load->view('crou');
		$this->load->view('acc');
		//$this->load->view('foutera');
	
	
	
	
	}

}

?>
	 