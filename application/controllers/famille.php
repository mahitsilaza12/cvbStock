<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class famille extends CI_Controller{

	public function index()
	{   
        $this->load->view('acc');	    
	 	$this->load->model('famille_model');	
        $famille = $this->famille_model->all();
		$data = array();
		$data['famille'] = $famille;
        $this->load->view('famille/list_fam',$data);
	

		
		
	}

	function insert_fam(){
		$this->load->model('famille_model');
		$this->form_validation->set_rules('famille','famille','required');

     if($this->form_validation->run() == false){

		$this->load->view('famille/insert_fam');
		
	 }
	   else{
		   $formArray= array();
		   $formArray['famille'] = $this->input->post('famille');
		   $this->famille_model->insert_fam($formArray);
		   $this->session->set_flashdata('success','ajout avec success');
		   redirect(base_url().'index.php/famille/index');



	}

	
}


	

function edit_fam($idfamille){
	$this->load->model('famille_model');
	$familles = $this->famille_model->get($idfamille);
	$data = array();
	$data['famille'] = $familles;
	  $this->form_validation->set_rules('famille','famille','required');
if($this->form_validation->run()== false){
	$this->load->view('famille/edit_fam', $data);
}
else{
	$formArray = array();
	$formArray['famille'] = $this->input->post('famille');
	$this->famille_model->updatefam($idfamille, $formArray);
	$this->session->set_flashdata('success', 'mise a jour correct');
	redirect(base_url().'index.php/famille/index');

}
}

function delete($idfamille){
	$this->load->model('famille_model');
	$familles = $this->famille_model->get($idfamille);
	if(empty($familles)){
		$this->session->set_flashdata('success', 'suppression non correct');
		redirect(base_url().'index.php/famille/index');
	
	}

	$this->famille_model->deletefam($idfamille);
	$this->session->set_flashdata('success', 'suppression correct');
	redirect(base_url(). 'index.php/famille/index');
	

}

}
