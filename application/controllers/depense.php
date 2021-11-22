<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class depense extends CI_Controller {

	public function __construct(){
		parent::__construct();
       
        // if(!($this->session->has_userdata("state")))
        // {
        //     $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //     redirect(base_url()."index.php/welcome/login");
        // }

	}
 


	public function index()
	{   
        $this->load->view('acc');	    
	 	$this->load->model('depense_model');	
        $depense = $this->depense_model->all();
		$data = array();
		$data['depense'] = $depense;
		$this->load->view('depense/list_de',$data);
		//$this->load->librarie('myPdf.class.php');
		//$this->load->view('foutera');
	
    }
    
	function insert_de(){
		$this->load->model('depense_model');
		$this->form_validation->set_rules('nom','nom','required');
	

     if($this->form_validation->run() == false){
		

		$this->load->view('depense/insert_de');
		
	 }
	   else{
		   $formArray= array();
		   $formArray['nom'] = $this->input->post('nom');
		   $formArray['motif'] = $this->input->post('motif');
           $formArray['montant'] = $this->input->post('montant');
           $formArray['date_depense'] = $this->input->post('date_depense');
		  //$this->client_model->get_client($nom_client);
			$this->depense_model->insert_de($formArray);
			$this->session->set_flashdata('success','ajout avec success');
		
		   redirect(base_url().'index.php/depense/index');
    }

}
function edit_de($iddepense){
	$this->load->view('acc');
	$this->load->model('depense_model');
	$depenses = $this->depense_model->get($iddepense);
	$data = array();
	$data['depense'] = $depenses;
	  $this->form_validation->set_rules('nom','nom','required');
if($this->form_validation->run()== false){
	$this->load->view('depense/edit_de', $data);
}
else{
	$formArray = array();
	$formArray['nom'] = $this->input->post('nom');
	$formArray['motif'] = $this->input->post('motif');
    $formArray['montant'] = $this->input->post('montant');
    $formArray['date_depense'] = $this->input->post('date_depense');
	$this->depense_model->updatede($iddepense, $formArray);
	$this->session->set_flashdata('success', 'mise a jour correct');
	redirect(base_url().'index.php/depense/index');

}
}


function delete($iddepense){
	$this->load->model('depense_model');
	$depenses = $this->depense_model->get($iddepense);
	if(empty($depenses)){
		$this->session->set_flashdata('success', 'suppression non correct');
		redirect(base_url().'index.php/depense/index');
	
	}

	$this->depense_model->deletede($iddepense);
	$this->session->set_flashdata('danger', 'suppression correct');
	redirect(base_url(). 'index.php/depense/index');
	

}

function deleted($iddepense){
	$this->load->model('depense_model');
	$depenses = $this->depense_model->get($iddepense);
	if(empty($depenses)){
		$this->session->set_flashdata('success', 'suppression non correct');
		redirect(base_url().'index.php/depense/journal');
	
	}

	$this->depense_model->deletede($iddepense);
	$this->session->set_flashdata('danger', 'suppression correct');
	redirect(base_url(). 'index.php/depense/journal');
	

}


public function exceles()
{
			$this->load->model("depense_model");
			$this->load->view('depense/excelde',["excel"=>$this->depense_model->all()]);
   

}

public function journal()
{   $this->load->model('depense_model');
  
    $date1 = $this->input->post('date1');
  	$date2 = $this->input->post('date2');
    $this->load->view('acc');
    // $data['produit']= $this->produit_model->get_produitnom();
    // $data['client']=$this->client_model->get_clinom($this->input->post('nom_client'))[0]['idclient'];
    // $data['payement_cli']=$this->commande_cli_m->afficjournal();
    // $journal=($this->commande_cli_m->afficjournal($date1, $date2));
		$data = array();
		$data['date1'] = $date1;
		$data['date2'] = $date2;
    $data["depense"]=$this->depense_model->journal($date1,$date2);
		$this->load->view('depense/journal',$data);
		

		// , 'date1' => $date1 , 'date2' => $date2]
    
    //var_dump($data);
}


public function excel($date1 ="" , $date2 ="")
{
		if($date1 !="")
		{
							$this->load->model('depense_model');
							$data = $this->depense_model->affi($date1 , $date2);
							$this->load->view("depense/execljourn",["excel" => $data]);
		}

			else
				{
					$this->load->model('depense_model');
					$data = $this->depense_model->affi($date1 , $date2);
					$this->load->view("depense/execljourn",["excel" => $data]);
				}						
}
}


?>