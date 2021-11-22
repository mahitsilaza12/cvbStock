<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historique extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
        $this->load->model("commande_cli_m");
        $this->load->model('client_model');
        $this->load->model('ligne_commande_cli_m');
        $this->load->model('produit_model');
        $this->load->model('commande_fou_m');
        // if(!($this->session->has_userdata("state")))
        // {
        //     $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //     redirect(base_url()."index.php/welcome/login");
        // }

    }
    public function historique()
    {
        $this->load->view('acc');
        $this->load->view('historique/historique');
    }

    public function fournisseur()
	{  	
		$this->load->view('acc');	
        $commande_fou = $this->commande_fou_m->all();	
        $data['commande_fou'] = $commande_fou;
        $this->load->view('commande_fou/list_commande_fou',$data);
    
    }
    public function client()
    {
        $this->load->view('acc');
        $commande_cli = $this->commande_cli_m->all();	
        $data['commande_cli'] = $commande_cli;
		$this->load->view('commande_cli/list_commande_cli',$data);
    }
}