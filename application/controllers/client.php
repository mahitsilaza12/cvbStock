<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class client extends CI_Controller {

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
	 	$this->load->model('client_model');	
        $client = $this->client_model->all();
		$data = array();
		$data['client'] = $client;
		$this->load->view('client/list_cli',$data);
		
		
	}

	function insert_cli(){
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
		
		   redirect(base_url().'index.php/client/index');



	}




	
}

public function pdf_client(){
	$this->load->model('client_model');	
	$result = $this->client_model->all();
	$result["liste"] = $result;
	$this->load->library("Html2Pdf/Html2Pdf");
	$this->load->view("client/factureclient", $result);
}


public function excel()

{
	$this->load->model-('client_model');
	$data["client"]=$this->client_model->getexcel();
	$this->load->view('client/list_cli',$data);
}
public function action()
{

$this->load->model("client_model");
$this->load->library('Classes/PHPExcel');
$object = new PHPExcel();
$object->setActiveSheetIndex(0);
$table_columns= array("idclient","nom_client","adresse","contact");
$column= 0;

   foreach($table_columns as $field)
   {
	   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	   $column++;
   }
   $client = $this->client_model->getexcel();
   $excel_row = 2;

   foreach($client as $clients)
   {
	   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $clients->idclient);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $clients->nom_client);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $clients->adresse);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $clients->contact);
	   $excel_row++;
   }
   $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
   header('content-Type: application/vnd.ms-excel');
   header('content-Disposition:attachement;filename="client.xls"');
   $object_writer->save('php://output');
}
public function chiffreAffaire()

 {	
	$this->load->model('client_model');	
//	$codeclient['client']=$this->client_model->get_clinom();
	$idclient['client']=$this->client_model->get_clinom($this->input->post('nom_client'))[0]['idclient'];
	$codeclient =$this->client_model->get_client($this->input->post('nom_client'))[0]['idclient'];
	$date1 = $this->input->post('date1');
	$date2 = $this->input->post('date2');
	//	
// 	$this->load->model->commande_cli_m('date');
	// $this->commande_cli_m->date('date');
	
	$this->load->view('acc');
	$chiffreAffaire=($this->client_model->chiffreAffaire($codeclient,$date1,$date2));
	$data = array();
	$data["chiffreAffaire"] = $chiffreAffaire;
	$this->load->view('chiffre/chiffre_affaire',$data);

	// $codeclient =$this->client_model->get_client($this->input->post('nom_client'))[0]['idclient'];
	// $date1 =$this->commande_cli_m->date( $this->input->post('date1'))[0]['date_commande'];
	// $date2 =$this->commande_cli_m->date( $this->input->post('date2'))[0]['date_commande'];
	// $this->client_model->getCAPerDate($codeclient,$date1,$date2);
	// $this->client_model->chiffreAffaire();
	// 


	//var_dump($this->client_model->getCAPerDate($codeclient,$date1,$date2));
	
	/*$this->load->model('client_model');	
	
	echo json_encode($this->client_model->chiffreAffaire());*/

	//2015-6-4 2014-5-6
	
	
	
			
		
	}
    
	public function affaire()
	{
		$this->load->model('commande_cli_m');
		
		$data['produit']= $this->produit_model->get_produitnom();
		$data['client']=$this->client_model->get_nomcli();
		$data['client']=$this->client_model->get_clinom($this->input->post('nom_client'))[0]['idclient'];
		$codeclient =$this->client_model->get_client($this->input->post('nom_client'));
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		//$this->load->view('acc');
		$data = array();
		$data["chiffreAffaire"]=$this->client_model->chiffreAffaire($codeclient,$date1,$date2);
		$this->load->view('chiffre/chiffre_affaire',$data);
	
	}



// public function affaire()
//  {  $this->load->model('client_model');
// 	$this->load->model('commande_cli_m');
// 	$data['client']= $this->client_model->get_clinom();
//     $this->load->view('acc');
// 	$this->load->view('chiffre/chiffre_affaire');
//     $date1='';
// 	$date2='';
	
// 	$this->client_model->chiffreAffaire($codeclient,$date1,$date2);
 
  
// 		$this->load->client_model('get_client');
// 		$this->get_clients($data['nom_client'])[0]['idclient'];
// 		$this->load->commande_cli_m('date');
// 		$this->date($date1['date_commande'] && $date2['date_commande']);
// 		if(!empty($date1) && !empty($date2))
//            {
// 			   if($date1!=$date2)
// 			       {
// 						$nom_client['nom_client']->$this->input->post('nom_client');
// 						$date1['date1']->$this->input->post('date1');
// 						$sare2['date2']->$this->input->post('date2');
// 						$this->load->view('chiffre/chiffre_affaire');
// 					}

// 	      }


    
// }

function edit_cli($idclient){
	$this->load->view('acc');
	$this->load->model('client_model');
	$clients = $this->client_model->get($idclient);
	$data = array();
	$data['client'] = $clients;
	  $this->form_validation->set_rules('nom_client','NOM','required');
		$this->form_validation->set_rules('adresse','ADRESSE','required');
		$this->form_validation->set_rules('contact','CONTACT','required');
if($this->form_validation->run()== false){
	$this->load->view('client/edit_cli', $data);
}
else{
	$formArray = array();
	$formArray['nom_client'] = $this->input->post('nom_client');
	$formArray['adresse'] = $this->input->post('adresse');
	$formArray['contact'] = $this->input->post('contact');
	$this->client_model->updatecli($idclient, $formArray);
	$this->session->set_flashdata('success', 'mise a jour correct');
	redirect(base_url().'index.php/client/index');

}
}
function delete($idclient){
	$this->load->model('client_model');
	$clients = $this->client_model->get($idclient);
	if(empty($clients)){
		$this->session->set_flashdata('success', 'suppression non correct');
		redirect(base_url().'index.php/client/index');
	
	}

	$this->client_model->deletecli($idclient);
	$this->session->set_flashdata('danger', 'suppression correct');
	redirect(base_url(). 'index.php/client/index');
	

}


public function infocli()
{
	$this->load->model("commande_cli_m");
	$this->load->view('acc');	
	$commande_cli = $this->commande_cli_m->all();	
	$data['commande_cli'] = $commande_cli;
	$this->load->view('client/infocli',$data);
}

public function exceles()
{
			$this->load->model("client_model");
			$this->load->view('client/excel',["excel"=>$this->client_model->all()]);
   

}

public function recherh($recherch)
{  $this->load->model('client_model');	
	$client = $this->client_model->recherh($recherch);

	echo "<table class='table table-hover' >

	<tbody id='aff>";
     if(!empty($client)){ foreach($client as $clients){ 
		
 echo  "<tr>
        <td>".$clients['idclient']. "</td>
        <td>".$clients['nom_client']."</td>
        <td>".$clients['adresse']."</td>
        <td>".$clients['contact']."</td>
        <td>
       <a href=".base_url()."'index.php/client/edit_cli/'".$clients['idclient']." 'class='btn btn-info btn-xr'<i class='fas fa-edit'></i></a>
        </td>
        
        <td>
        <a onclick='return confirm('ete vous sur pour supprimer cette Client?');' href='".base_url()."'index.php/client/delete/'".$clients['idclient']." 'class='btn btn-danger btn-xr'<i class='fas fa-trash-alt'></i></a>
        </td>
      </tr>";
	 }
	  } else { echo "
<td colspan= '5'>Element non trouvee</td>";
	  }




	}





}


?>