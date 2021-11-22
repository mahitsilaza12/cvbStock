<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commande_fou extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
        $this->load->model('commande_fou_m');
        $this->load->model('fournisseur_model');
        $this->load->model('ligne_commande_fou_m');
        $this->load->model('produit_model');
        $this->load->model('payement_fou_m');
        // if(!($this->session->has_userdata("state")))
        // {
        //     $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //     redirect(base_url()."index.php/welcome/login");
        // }

	}
 
	public function index()
	{  	
		$this->load->view('acc');	
        $commande_fou = $this->commande_fou_m->all();	
        $data['commande_fou'] = $commande_fou;
		$this->load->view('commande_fou/list_commande_fou',$data);
    }

    public function ajout_commande_fou(){
        $this->load->view('ajout_commande_fou');
    }


    public function insert_commande_fou($idcommande_fou){
        $this->load->model('commande_fou_m');
        $this->load->model('fournisseur_model');
        $this->load->model('ligne_commande_fou_m');
        $this->load->model('produit_model');
        $data['produit']= $this->commande_fou_m->get_commande_fous();
        $data['produit']= $this->produit_model->get_produitnom();
        $data['fournisseur']= $this->fournisseur_model->get_fournnom();

        $data = array( 	     
            'nom_fournisseur'      => $this->input->post('nom_fournisseur'),    
            'idproduit'    => $this->produit_model->get_produits($this->input->post('nom_produit'))["idproduit"],
            'qt'    => $this->input->post('qt'),
            'date_appro'    => $this->input->post('date_appro')
        );
        $data['produit']= $this->produit_model->get_produitnom();
    $this->commande_fou_m->insert_commande_fou($this->fournisseur_model->get_fournisseur($data['nom_fournisseur'])[0]['idfournisseur'], $data['date_appro']);
    

   if( $this->fournisseur_model->get_fournisseur($this->input->post('nom_fournisseur')) !== null){
    if(($_POST['type'] == "detail")){
      $this->ligne_commande_fou_m->lignecomfou($data["idproduit"] , $data["qt"]);
    
}
    else if (($_POST['type'] == "gros")){

        $this->ligne_commande_fou_m->lignecomfou($data["idproduit"] , $data["qt"]*$this->produit_model->get_produits($this->input->post('nom_produit'))["parpresentation"]);
    }
    
    //return result_array();

}

    redirect('index.php/commande_fou');

}







    public function delete_commande_fou($idcommande_fou){    
		//Delete list
		$this->commande_fou_m->delete_commande_fou($idcommande_fou);
		//Create Message
		$this->session->set_flashdata('success', 'cette commande a ete supprimer');        
		//Redirect to list index
		redirect('index.php/commande_fou');
 }

 public function facturefournisser($idcommande_fou)
 {
    $facture['facture']=$this->commande_fou_m->genererFacture($idcommande_fou);
    $this->load->library('Lettre');
    $this->load->library("Html2Pdf/Html2Pdf");
    $this->load->view('commande_fou/facturefournisseur', $facture);
 }


 public function excel_fou($idpay_fou)
 {
     $this->payement_fou_m->excel_fou($idpay_fou);
     $this->load->library('Classes/PHPExcel/IOFactory');
    $this->load->library("Classes/PHPExcel");
    $this->load->view('commande_fou/excel');
 }






public function addi()
    {
        $this->load->model('fournisseur_model');

        $data['commande_fou']= $this->commande_fou_m->getlast();
        $data['produit']= $this->produit_model->get_produitnom();
        $data['fournisseur']= $this->fournisseur_model->get_fournnom();
        $this->form_validation->set_rules('fournisseur','fournisseur','required');
        if($this->form_validation->run() === FALSE)
            {
                $this->load->view('acc');
                $this->load->view('commande_fou/insertcomfou', $data);
              
            }
            else {
                
                $this->load->view('acc');
                $this->load->view('commande_fou/complu', $data);

            }

    }

    public function enregistrer()
    {   
      

        $data['produit']= $this->produit_model->get_produitnom();
        $produit = $this->produit_model->get_produit($this->input->post('produit'));
               
    if(($produit[0]["stock"]) == $this->input->post("qt")&& $this->input->post("type")=='detail')
    {
      $this->session->set_flashdata('success', 'votre stock est chargeer');

    }
   else if((($produit[0]["stock"]) == ($this->input->post("qt")*$produit[0]['parpresentation'])) && $this->input->post("type")=='gros' )
   {
    $this->session->set_flashdata('success', 'votre stock est chargeer');

   }
         else{   $this->ligne_commande_fou_m->lignecomfou($this->input->post('produit'),$this->input->post('qt') 
             , $this->input->post("type"));
             }
                    $data["liste"] = ($this->ligne_commande_fou_m->ligneFromCode($this->commande_fou_m->getlast()));
                    $data['commande_fou']= $this->commande_fou_m->getlast();  
                    $this->load->view('acc');
                    $this->load->view('commande_fou/js' , $data);      
                            
                    // redirect('commande_fou/js',$data);   
                    
    }

    public function insertcomfou()
    {
        $this->load->model('fournisseur_model');
        $data['fournisseur']= $this->fournisseur_model->get_fournnom();
        $data['produit']= $this->produit_model->get_produitnom();
        $this->form_validation->set_rules('fournisseur','fournisseur','required');
        
        
        
        
        if($this->form_validation->run() == False){
            $this->load->view('acc');
            $this->load->view('commande_fou/insertcomfou', $data); 
            
        }
        else{
            
            $this->commande_fou_m->insert_commande_fou($this->input->post('fournisseur') , $this->input->post('date_appro')); 
            $data['commande_fou']= $this->commande_fou_m->getlast();
            $this->load->view('acc');
            $this->load->view('commande_fou/js', $data);
        } 
           
            
    }
    public function journalfou()
    {   $this->load->model('commande_fou_m');
        $data['produit']= $this->produit_model->get_produitnom();
        $data['fournisseur']=$this->fournisseur_model->get_fournnom($this->input->post('nom_fournisseur'))[0]['idfournisseur'];
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
        $data["payement_fou"]=$this->commande_fou_m->afficjournal($date1,$date2);
        $this->load->view('commande_fou/journalfou',$data);
        
        //var_dump($data);
    }

    public function facturefournissers($idcommande_fou)
    {
       $facture['facture']=$this->commande_fou_m->genererFactures($idcommande_fou);
       //$this->load->library('Lettre');
       //$this->load->library("Html2Pdf/Html2Pdf");
      $this->load->view('commande_fou/facturepay', $facture);
       var_dump($facture);
    }
    
    public function delete($idcommande_fou,$idproduit){    
		//Delete list
		$this->ligne_commande_fou_m->delete($idcommande_fou,$idproduit);
		//Create Message
		$this->session->set_flashdata('success', 'Your task has been deleted');        
		//Redirect to list index
        $data['produit']= $this->produit_model->get_produitnom();
        $data["liste"] = ($this->ligne_commande_fou_m->ligneFromCode($this->commande_fou_m->getlast()));
        $data['commande_fou']= $this->commande_fou_m->getlast();
        $data['produit']= $this->produit_model->get_produitnom();
        $this->load->view('acc');
        $this->load->view('commande_fou/js', $data);
}
 


 public function exceles()
 {
             $this->load->model("commande_fou_m");
             $this->load->view('commande_fou/excelappro',["excel"=>$this->commande_fou_m->all()]);
    
 
 }


 function insert_fou(){
    $this->load->model('fournisseur_model');
    $this->form_validation->set_rules('nom_fournisseur','nom_fournisseur','required');
    $this->form_validation->set_rules('adresse','ADRESSE','required');
    $this->form_validation->set_rules('contact','CONTACT','required');
    $this->form_validation->set_rules('responsable','RESPONSABLE','required');

 if($this->form_validation->run() == false){
    

    $this->load->view('fournisseur/insert_fou');
    
 }
   else{
       $formArray= array();
       $formArray['nom_fournisseur'] = $this->input->post('nom_fournisseur');
       $formArray['adresse'] = $this->input->post('adresse');
         $formArray['contact'] = $this->input->post('contact');
         $formArray['responsable'] = $this->input->post('responsable');
       $this->fournisseur_model->insert_fou($formArray);
       $this->session->set_flashdata('success','ajout avec success');
       redirect(base_url().'index.php/commande_fou/insertcomfou');



}


}



public function insert_prod(){
	$this->form_validation->set_rules('intrants','intrants','required');
	$this->form_validation->set_rules('nom_produit','nom_produit','required');
	$this->form_validation->set_rules('pu_d_V','pu_d_V','required'); 
	$this->form_validation->set_rules('pu_d_G','pu_d_G','required'); 
	$this->form_validation->set_rules('pu_d_A','pu_d_A','required');    
	$this->form_validation->set_rules('unite','unite','required');  
	$this->form_validation->set_rules('presentation','presentation','required');    
	$this->form_validation->set_rules('parpresentation','parpresentation','required');      
	if($this->form_validation->run() == FALSE){
		//Get list famille for view
	echo('tsy mety');
		//Load view and layout
		
		$this->load->view('produit/index',$data);  
	} else {
		 //Post values to array
		$data = array( 	     
			'intrants'      => $this->input->post('intrants'),   
			'nom_produit'    => $this->input->post('nom_produit'),
			'pu_d_V'    => $this->input->post('pu_d_V'),
			'pu_d_G'    => $this->input->post('pu_d_G'),
			'pu_d_A'    => $this->input->post('pu_d_A'),
			'unite'    => $this->input->post('unite'),
			'tva'    => $this->input->post('tva'),		
			'description'    => $this->input->post('description'),
			'presentation'    => $this->input->post('presentation'),
			'parpresentation'    => $this->input->post('parpresentation'),	
			'datePEr'    => $this->input->post('datePEr'),		
		);
	
	    if($this->produit_model->insert_prod($data)){
			 
			$this->session->set_flashdata('produit_created', 'Your task has been created');
	 		//Redirect to index page with error above
			 redirect(base_url()."index.php/produit");
	    }
	 }
}



public function cho()
{   $this->load->model('commande_fou_m');
    $data['produit']= $this->produit_model->get_produitnom();
    $data['fournisseur']=$this->fournisseur_model->get_fournnom($this->input->post('nom_fournisseur'))[0]['idfournisseur'];
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
    $data["com"]=$this->commande_fou_m->chiot($date1,$date2);
    $this->load->view('commande_fou/journcho',$data);
    
    //var_dump($data);
}
public function exdep($date1 ="" , $date2 ="")
{
    if($date1 !="") 
    {
        $this->load->model('commande_fou_m');
        $data = $this->commande_fou_m->affi($date1 , $date2);
      $this->load->view("commande_fou/comm",["excel" => $data]);
        // var_dump(["excel" => $data]);
    }
    else{
        $this->load->model('commande_fou_m');
        $data = $this->commande_fou_m->affi($date1 , $date2);
        $this->load->view("commande_fou/comm",["excel" => $data]);
        // var_dump(["excel" => $data]);
    }

}



}
