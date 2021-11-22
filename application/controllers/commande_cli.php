<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commande_cli extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
        $this->load->model("commande_cli_m");
        $this->load->model('client_model');
        $this->load->model('ligne_commande_cli_m');
        $this->load->model('produit_model');
        $this->load->model('commande_fou_m');
        $this->load->model('payement_cli_m');
        // if(!($this->session->has_userdata("state")))
        // {
        //     $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //     redirect(base_url()."index.php/welcome/login");
        // }

	}
 
	public function index()
	{  	
		$this->load->view('acc');	
        $commande_cli = $this->commande_cli_m->all();	
        $data['commande_cli'] = $commande_cli;
		$this->load->view('commande_cli/list_commande_cli',$data);

    }

   
    public function ajout_commande_cli(){
        $this->load->view('ajout_commande_cli');
    }
    



    public function insert_commande_cli(){
$this->load->model("client_model");
$this->load->model("produit_model");
$this->load->model("ligne_commande_cli_m");
            $data = array( 	     
                'nom_client'      => $this->input->post('nom_client'),    
                'idproduit'    => $this->produit_model->get_produits($this->input->post('nom_produit'))["idproduit"],
                'qt'    => $this->input->post('qt'),
               // 'pu_d_V'     =>$this->input->post('pu_d_V');
                //'pu_d_G'  =>$this->input->post('pu_d_G');
                'date_commande'    => $this->input->post('date_commande')
            );
            
  
    
    if( $this->client_model->get_client($this->input->post('nom_client')) !== null){
        if(($_POST['type'] == "detail")){
          $this->ligne_commande_cli_m->lignecomcli($data["idproduit"] , $data["qt"]);
        
    }
        else if (($_POST['type'] == "gros")){
    
            $this->ligne_commande_cli_m->lignecomcli($data["idproduit"] , $data["qt"]*$this->produit_model->get_produits($this->input->post('nom_produit'))["parpresentation"]);
        }
        //return result_array();
    
    }


    



  
        $this->commande_cli_m->insert_commande_cli($this->client_model->get_client($data['nom_client'])[0]['idclient'], $data['date_commande']);
        
        redirect('index.php/commande_cli');
    


         }



    public function delete_commande_cli($idcommande_cli){    
		//Delete list
		$this->commande_cli_m->delete_commande_cli($idcommande_cli);
		//Create Message
		$this->session->set_flashdata('success', 'cette commande a ete supprimer');        
		//Redirect to list index
		redirect('index.php/commande_cli');
 }

 public function delete($idcommande_cli  , $idproduit){    
    //Delete list
    $this->ligne_commande_cli_m->delete($idcommande_cli , $idproduit);
    //Create Message
    $this->session->set_flashdata('task_deleted', 'Your task has been deleted');        
    //Redirect to list index
    // $this->;
            $data['produit']= $this->produit_model->get_produitnom();
            $data["listes"] = ($this->ligne_commande_cli_m->ligneFromCode($this->commande_cli_m->getlast()));
            $data['commande_cli']= $this->commande_cli_m->getlast();
            $data['produit']= $this->produit_model->get_produitnom();
            $this->load->view('acc');
            $this->load->view('commande_cli/js', $data);
}

public function deletes($idcommande_cli){    
    //Delete list
    $this->commande_cli_m->delete($idcommande_cli);
    //Create Message
    $this->session->set_flashdata('task_deleted', 'Your task has been deleted');        
    //Redirect to list index
    redirect('index.php/commande_cli/journalcli');
}

public function deletese($idcommande_cli){    
    //Delete list
    $this->commande_cli_m->delete($idcommande_cli);
    //Create Message
    $this->session->set_flashdata('task_deleted', 'Your task has been deleted');        
    //Redirect to list index
    redirect('index.php/payement_cli/payer');
}

 


 public function client($facture ='')
    {
        $factures = array ();
        if($facture !=''){
            $this->load->view('acc');
            $factures['facture'] = $facture;
            $this->load->library('lettre');
            $this->load->view("commande_cli/list_commande_cli", $factures);
        }
        else{
            $this->load->view("acc");
            $this->load->view("commande_cli/list_commande_Cli");

        }
    }
    public function accueil(){
        $this->load->view("acc");
        $this->load->view("commande_cli/list_commande_cli");
    }
   
public function factureclient()
{
$facture['facture']=$this->commande_cli_m->genererFacture();
$this->load->library('Lettre');
$this->load->library("Html2Pdf/Html2Pdf");
$this->load->view('commande_cli/facture_com_cli', $facture);
}

public function vente()
{
  $query= $this->commande_cli->genererFacture();
  return $query->result();
}

public function facturepersonnel($id_commande_cli)
{
$facture['facture']=$this->commande_cli_m->genererFacture($id_commande_cli);
$this->load->library('Lettre');
$this->load->library("Html2Pdf/Html2Pdf");
$this->load->view('commande_cli/facture_personnel', $facture);

}


public function affichagefacture($id_commande_cli)
{
$facture['facture']=$this->commande_cli_m->genererFacture($id_commande_cli);
// $this->load->library('Lettre');
// $this->load->library("Html2Pdf/Html2Pdf");
 $this->load->view('commande_cli/affichagefacture', $facture);
var_dump($facture);
}

public function plusieur(){
    $this->load->view('acc');
    $this->load->view('commande_cli/plusieur');
}


/*
array_shift()

count($_POST)


*/


public function journal()
{
    $this->load->view('acc');
    $this->load->view('journal/journalier');
}

public function infocomma()
{
    $this->load->view('acc');
    $this->load->view('commande_cli/infocomma');
}

public function addi()
{
            $data['commande_cli']= $this->commande_cli_m->getlast();
            $data['produit']= $this->produit_model->get_produitnom();
            $data['client']= $this->client_model->get_clinom();
            // $data = array( 	     
            //     'nom_client'      => $this->input->post('nom_client'),    
            //     'idproduit'    => $this->produit_model->get_produits($this->input->post('nom_produit'))["idproduit"],
            //     'qt'    => $this->input->post('qt'),
            //    // 'pu_d_V'     =>$this->input->post('pu_d_V');
            //     //'pu_d_G'  =>$this->input->post('pu_d_G');
            //     'date_commande'    => $this->input->post('date_commande')
            // );
            
            $this->form_validation->set_rules('client','client','required');
            if($this->form_validation->run() === FALSE)
                {
                    $this->load->view('acc');
                    $this->load->view('commande_cli/insertcom', $data);
                  
                }
                else {
                    
                    $this->load->view('acc');
                    $this->load->view('commande_cli/complu', $data);
    
                }
    
        }
  
    
//     if( $this->client_model->get_client($this->input->post('nom_client')) !== null){
//         if(($_POST['type'] == "detail")){
//           $this->ligne_commande_cli_m->lignecomcli($data["idproduit"] , $data["qt"]);
        
//     }
//         else if (($_POST['type'] == "gros")){
    
//             $this->ligne_commande_cli_m->lignecomcli($data["idproduit"] , $data["qt"]*$this->produit_model->get_produits($this->input->post('nom_produit'))["parpresentation"]);
//         }
//         //return result_array();
    
//     }
       


         
// // {
   

   
//      if($this->form_validation->run() === FALSE)
// //         {
// //             $this->load->view('acc');
// //             $this->load->view('commande_cli/insertcom', $data);
          
// //         }
// //         else {
            
// //             $this->load->view('acc');
// //             $this->load->view('commande_cli/complu', $data);

// //         }
// $this->commande_cli_m->insert_commande_cli($this->client_model->get_client($data['nom_client'])[0]['idclient'], $data['date_commande']);
        
// redirect('index.php/commande_cli');

//      }


public function enregistrers($idcommande_cli)
{
  $idclient=$this->client_model->get_clinom($this->input->post('nom_client'));
  $idproduit=$this->produit_model->get_produits($this->input->post('nom_produit'));
  if(isset($idclient)){
    $this->commande_cli_m->createcom($idclient,$date_commande);
   }
 else{

  $this->ligne_commande_cli_m->lignecomcli($idproduit,$qt,$conditio);
}
   
redirect('commande_fcli/list_commande_cli');
   
}

public function insertcom()
{
    $this->load->model('client_model');
    $data['client']= $this->client_model->get_clinom();
    $data['produit']= $this->produit_model->get_produitnom();
    $this->form_validation->set_rules('client','client','required');
       if($this->form_validation->run() == False){
            $this->load->view('acc');
            $this->load->view('commande_cli/insertcom', $data); 
            
        }
        else{
            
            $this->commande_cli_m->insert_commande_cli($this->input->post('client') , $this->input->post('date_commande')); 
            $data['commande_cli']= $this->commande_cli_m->getlast();
            
            $this->load->view('acc');
            $this->load->view('commande_cli/js', $data);
        } 
       
        
}


public function enregistrer()
{   
    
    $data['produit']= $this->produit_model->get_produitnom();
    
    $produit = $this->produit_model->get_produit($this->input->post('produit'));


    if(($produit[0]["stock"]) < $this->input->post("qt")&& $this->input->post("type")=='detail')
    {
      $this->session->set_flashdata('success', 'votre stock est insuffisance,faire une approvisionnement de cette produit');

    }
   else if((($produit[0]["stock"]) < ($this->input->post("qt")*$produit[0]['parpresentation'])) && $this->input->post("type")=='gros' )
   {
    $this->session->set_flashdata('success', 'votre stock est insuffisance,faire une approvisionnement de cette produit');

   }
         else{   $this->ligne_commande_cli_m->lignecomcli($this->input->post('produit'),$this->input->post('qt') 
             , $this->input->post("type"));
             }
     


//    echo $this->commande_fou_m->getlast();
$data["listes"] = ($this->ligne_commande_cli_m->ligneFromCode($this->commande_cli_m->getlast()));
$data['commande_cli']= $this->commande_cli_m->getlast();
$data["asd"]=$this->input->post('qt');
 $this->load->view('acc');
 $this->load->view('commande_cli/js' , $data );      
        
 // redirect('commande_fou/js',$data);   


}

public function journalcli()
{   $this->load->model('commande_cli_m');
    $data['produit']= $this->produit_model->get_produitnom();
    $data['client']=$this->client_model->get_clinom($this->input->post('nom_client'))[0]['idclient'];
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
    $data["payement_cli"]=$this->commande_cli_m->afficjournal($date1,$date2);
    $this->load->view('commande_cli/journalcli',$data);
    
    //var_dump($data);
}

public function stat()
{ $client =   $this->commande_cli_m->statmonth();
  $fournisseur =   $this->commande_cli_m->statdate();
  $this->load->view('acc');
  $this->load->view('stat/hh',$client,$fournisseur);
  
}

public function statmonth()
    {   
       
        echo json_encode($this->commande_cli_m->statmonth());
    }
    public function statdate()
    {  
        
        echo json_encode($this->commande_cli_m->statdate());
    }
    public function pied()
    {
        $client =   $this->commande_cli_m->statmonth();
        $fournisseur =   $this->commande_cli_m->statdate();
        $this->load->view('acc');
        $this->load->view('stat/stat',$client,$fournisseur);
    }

    public function ligne()
    {
        $client =   $this->commande_cli_m->statmonth();
        $fournisseur =   $this->commande_cli_m->statdate();
        $this->load->view('acc');
        $this->load->view('stat/ligne',$client,$fournisseur);
    }

    public function date()
    {
        $client =   $this->commande_cli_m->statmonth();
        $fournisseur =   $this->commande_cli_m->statdate();
        $this->load->view('acc');
        $this->load->view('stat/date',$client,$fournisseur);
    }

    
    public function parjour()
    {
        $client =   $this->commande_cli_m->statmonth();
        $fournisseur =   $this->commande_cli_m->statdate();
        $this->load->view('acc');
        $this->load->view('stat/parjour',$client,$fournisseur);
    }

    public function mois()
    {
        $client =   $this->commande_cli_m->statmonth();
        $fournisseur =   $this->commande_cli_m->statdate();
        $this->load->view('acc');
        $this->load->view('stat/mois',$client,$fournisseur);
    }



    public function recherh($recherch)
	{  	
		//$this->load->view('acc');	
		$commande_cli = $this->commande_cli_m->recherch($recherch);	
        //$data['produit'] = $produit;
		echo "<table class='table table-hover' >
		
	  <tbody id='aff'>";
	if(!empty($commande_cli)){	
	  foreach($commande_cli as $commande_clis){
		   
echo "
		  <tr>
			<td>".$commande_clis['idcommande_cli']."</td><td>"
			.$commande_clis['nom_client']."</button></a></td>
			<td>".$commande_clis['intrants']."</td>
			<td>".$commande_clis['nom_produit']."</td>
			<td>".$commande_clis['qt']."</td>
			
			<td>".$commande_clis['unite'].' Ar'."</td>  
			<td>".$commande_clis['description'].' Ar'."</td>
			<td>".$commande_clis['date_commande'].' Ar'."</td>
			
		  </tr>";
	   }
	  
	} else { echo "
	<td colspan= '5'>Element non trouvee</td>";
		
		}
     
    }
    
    public function exceles()
          {
                      $this->load->model("commande_cli_m");
                      $this->load->view('commande_cli/excelcom',["excel"=>$this->commande_cli_m->all()]);
             
          
          }



          function insert_clis(){
            $this->load->model('client_model');
            $this->form_validation->set_rules('nom_client','NOM','required');
            $this->form_validation->set_rules('adresse','ADRESSE','required');
            $this->form_validation->set_rules('contact','CONTACT');
    
         if($this->form_validation->run() == false){
            
    
            $this->load->view('client/insert_cli');
            
         }
           else{
               $formArray= array();
               $formArray['nom_client'] = $this->input->post('nom_client');
               $formArray['adresse'] = $this->input->post('adresse');
               $formArray['contact'] = $this->input->post('contact');
              //$this->client_model->get_client($nom_client);
                $this->client_model->insert_cli($formArray);
                $this->session->set_flashdata('success','ajout avec success');
            
               redirect(base_url().'index.php/commande_cli/insertcom');
    
    
    
        }
        
    }



    public function chi()
{   $this->load->model('commande_cli_m');
    $data['produit']= $this->produit_model->get_produitnom();
    $data['client']=$this->client_model->get_clinom($this->input->post('nom_client'))[0]['idclient'];
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
    $data["com"]=$this->commande_cli_m->chiot($date1,$date2);
    $this->load->view('commande_cli/journchi',$data);
    
    //var_dump($data);
}
public function exdep($date1 ="" , $date2 ="")
{
	if($date1 !="") 
    {
        $this->load->model("commande_cli_m");
        $data = $this->commande_cli_m->affi($date1 , $date2);
        $this->load->view("commande_cli/comm",["excel" => $data]);  
    }
    else{
        $this->load->model("commande_cli_m");
        $data = $this->commande_cli_m->affi($date1 , $date2);
       $this->load->view("commande_cli/comm",["excel" => $data]);
    }

}





}
?>





