<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo "\nERROR: ",
	$heading,
	"\n\n",
	$message,
	"\n\n";


/*

	<?php

Class produit_model extends CI_model{
    private $table ='produit';

    public function all(){
        $where = 'produit.idfamille = famille.idfamille';
        $this->db->select(' 
        famille,
        idproduit,
        produit.nom_produit,
        produit.nom_produit,
        produit.pu_d_V,
        produit.stock,
        produit.unite,
        produit.description,
        produit.presentation,
        produit.parpresentation,
        produit.par2presentation,
        produit.datePEr
        ');
        $this->db->from($this->table.' , famille');
        $this->db->where($where);


        $query = $this->db->get();  
         if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }

    public function get_famille($idfamille){
        $this->db->where('idfamille',$idfamille);
        $query = $this->db->get('famille');
        return $query->row_array()->famille;
    }

    public function get_produit($idproduit){
        $this->db->where('idproduit',$idproduit);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function insert_prod($formArray){
        $data  = [
        'idfamille'      => $formArray["idfamille"],   
        'nom_produit'    => $formArray["nom_produit"],
        'pu_d_V'    => $formArray["pu_d_V"],
        'unite'    => $formArray["unite"],		
        'description'    => $formArray["description"],
        'presentation'    => $formArray["presentation"],
        'parpresentation'    => $formArray["parpresentation"],		
        'par2presentation'    => $formArray["par2presentation"]
        ];
        return $this->db->insert($this->table, $formArray) ? true : false; //INSERT INTO
    }    


    public function edit_pro($idproduit,$formArray){
        $data     = [
            'idfamille'      => $formArray["idfamille"],   
            'nom_produit'    => $formArray["nom_produit"],
            'pu_d_V'    => $formArray["pu_d_V"],
            'unite'    => $formArray["unite"],		
            'description'    => $formArray["description"],
            'presentation'    => $formArray["presentation"],
            'parpresentation'    => $formArray["parpresentation"],		
            'par2presentation'    => $formArray["par2presentation"]
            ];
            $this->db->set($data);
        $this->db->update($this->table, $data); 
        $this->db->where('idproduit', $idproduit);
        return true;
         
    }

    public function delete_prod($idproduit){
        $this->db->where('idproduit',$idproduit);
        $this->db->delete($this->table);
        return true;
    }

}

?>

//iyty ny ray



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produit extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
		$this->load->model("produit_model");
	}
 
	public function index()
	{  	
		$this->load->view('acc');	
		$produit = $this->produit_model->all();	
        $data['produit'] = $produit;
		$this->load->view('produit/list_pro',$data);
	
     
	}
	
public function ajout()
{
	$this->load->view('produit/ajout');

}



public function insert_prod(){
	$this->form_validation->set_rules('nom_produit','nom_produit','required');
	$this->form_validation->set_rules('pu_d_V','pu_d_V','required');   
	$this->form_validation->set_rules('unite','unite','required');  
	$this->form_validation->set_rules('description','description','required');  
	$this->form_validation->set_rules('presentation','presentation','required');    
	$this->form_validation->set_rules('parpresentation','parpresentation','required');  
	$this->form_validation->set_rules('par2presentation','par2presentation','required');        
	if($this->form_validation->run() == FALSE){
		//Get list famille for view
	echo('tsy mety');
		//Load view and layout
		
		$this->load->view('produit/index',$data);  
	} else {
		 //Post values to array
		$data = array( 	     
			'idfamille'      => $this->input->post('idfamille'),   
			'nom_produit'    => $this->input->post('nom_produit'),
			'pu_d_V'    => $this->input->post('pu_d_V'),
			'unite'    => $this->input->post('unite'),		
			'description'    => $this->input->post('description'),
			'presentation'    => $this->input->post('presentation'),
			'parpresentation'    => $this->input->post('parpresentation'),		
			'par2presentation'    => $this->input->post('par2presentation')
		);
	
	    if($this->produit_model->insert_prod($data)){
			 
			$this->session->set_flashdata('produit_created', 'Your task has been created');
	 		//Redirect to index page with error above
			 redirect(base_url()."index.php/produit");
	    }
	 }
}

 public function edit_pro($idproduit){
	$produits = $this->produit_model->all($idproduit);
	$data = array();
	$data['produit'] = $produits;
	$this->form_validation->set_rules('nom_produit','nom_produit','required');
	$this->form_validation->set_rules('pu_d_V','pu_d_V','required');   
	$this->form_validation->set_rules('unite','unite','required');  
	$this->form_validation->set_rules('description','description','required');  
	$this->form_validation->set_rules('presentation','presentation','required');    
	$this->form_validation->set_rules('parpresentation','parpresentation','required');  
	$this->form_validation->set_rules('par2presentation','par2presentation','required');             
        if($this->form_validation->run() == FALSE){
            //Get produit id
			$this->session->set_flashdata('produit_created', 'Your task has been created');
			//Redirect to index page with error above
			//redirect(base_url()."index.php/produit/edit_pro");
			$this->load->view('produit/edit_pro',$data); 
		
        } else {
            //Get  id produit
            $idproduit = $this->produit_model->get_produit($idproduit);
            //Post values to array
            $data = array(             
				'idfamille'      => $this->input->post('idfamille'),   
				'nom_produit'    => $this->input->post('nom_produit'),
				'pu_d_V'    => $this->input->post('pu_d_V'),
				'unite'    => $this->input->post('unite'),		
				'description'    => $this->input->post('description'),
				'presentation'    => $this->input->post('presentation'),
				'parpresentation'    => $this->input->post('parpresentation'),		
				'par2presentation'    => $this->input->post('par2presentation')	
			);
	
           if($this->produit_model->edit_pro($idproduit , $data)){
			   
                $this->session->set_flashdata('produit updated', 'Your produit has been updated');
                //Redirect to index page with error aboves
			    redirect('index.php/produit/');
			  
           }
        }
	}
    

	public function delete_prod($idproduit){    
		//Delete list
		$this->produit_model->delete_prod($idproduit);
		//Create Message
		$this->session->set_flashdata('task_deleted', 'Your task has been deleted');        
		//Redirect to list index
		redirect('index.php/produit');
 }

}