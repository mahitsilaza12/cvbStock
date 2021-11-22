<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();		
	}

	public function index()
	{	
		if(!($this->session->has_userdata("state")))
		{
			$this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
			redirect("index.php/welcome/login");
		}
			
		$this->load->view('acc');

		$this->load->view('accue');
		
		// $this->load->view('templates/footer');
	}

	
	public function log_in()
	{
		$this->load->model("ModelWelcome");
		if($this->ModelWelcome->login($this->input->post("nomUser"),$this->input->post("mdp")))
			{
				$data = array(
					"pseudo" => $this->ModelWelcome->login($this->input->post("nomUser") , $this->input->post("mdp"))[0]->type,
					"nomUser" => $this->input->post("nomUser"),
					"state" => "logged"
				);
				$this->session->set_userdata($data);
				$this->index();
			}
		else
		{
			$this->session->set_flashdata("login" , "Votre nom d'utilisateur ou mot de passe n'est pas valide");
			$this->login();
		}
	}


	public function login()
	{
		$this->load->view("auth/login");
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('page');
	}



}

?>