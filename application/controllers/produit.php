<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produit extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
		$this->load->model("produit_model");
		// if(!($this->session->has_userdata("state")))
    // 		{
    //             $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
    //             redirect(base_url()."index.php/welcome/login");
    //         }
	}
 
	public function index()
	{  	
		$this->load->view('acc');	
		$produit = $this->produit_model->all();	
        $data['produit'] = $produit;
		$this->load->view('produit/list_pro',$data);
	
     
	}
	public function recherh($recherch)
	{  	
		//$this->load->view('acc');	
		$produit = $this->produit_model->recherch($recherch);	
        //$data['produit'] = $produit;
		echo "<table class='table table-hover' >
		
	  <tbody id='aff'>";
	if(!empty($produit)){	
	  foreach($produit as $produits){
		  
		
		  $produits['par2presentation']=  (int)($produits['stock']/$produits['parpresentation'] );
		   
echo "
		  <tr>
			<td>".$produits['idproduit']."</td><td>"
			.$produits['intrants']."</button></a></td>
			<td>".$produits['nom_produit']."</td>
			<td>".$produits['stock']."</td>
			<td>".$produits['presentation']."</td>
			<td>".$produits['parpresentation'].' '.$produits['unite']."</td>
			<td>".$produits['par2presentation'].'  '.$produits['presentation'].' est '.$produits['stock']%$produits['parpresentation'].' '.$produits['unite']."</td>
			<td>".$produits['pu_d_V'].' Ar'."</td>  
			<td>".$produits['pu_d_G'].' Ar'."</td>
			<td>".$produits['pu_d_A'].' Ar'."</td>
			<td>".$produits['unite']."</td>
			<td>".$produits['tva'].'%'."</td>
			<td>".$produits['description']."</td>
			<td>".$produits['datePEr']."</td>
			<td>
			  <a  href='".base_url()."index.php/produit/edit_pro/".$produits['idproduit']." 'class='  btn btn-info btn-xr' ><i class='fas fa-edit'></i></a>
			   
			</td>
			
			<td>
			<a onclick='return confirm('ete vous sur pour supprimer cette produit?');' href='".base_url()."index.php/produit/delete_prod/".$produits['idproduit'] ."'class='btn btn-danger btn-xr' ><i class='fas fa-trash-alt'></i></a>
			</td>
		  </tr>";
	   }
	  
	} else { echo "
	<td colspan= '5'>Element non trouvee</td>";
		
		}
     
	}
	
public function ajout()
{
	$this->load->view('produit/ajout');

}



public function insert_prod(){
	$this->form_validation->set_rules('intrants','intrants','required');
	$this->form_validation->set_rules('nom_produit','nom_produit','required');
	$this->form_validation->set_rules('pu_d_V','pu_d_V','required');   
	$this->form_validation->set_rules('unite','unite','required');      
	if($this->form_validation->run() == FALSE){
		//Get list famille for view
	echo('tsy mety');
		//Load view and layout
		
		$this->load->view('produit/index',$data);  
	} 
	
	else {
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
		if($this->input->post("nom_produit") == $produit[0]["nom_produit"])
	{
		$this->session->set_flashdata('success', 'votre produit est deja existee');
	
		redirect(base_url()."index.php/produit");
	}
	


	    else{
			$this->produit_model->insert_prod($data);
			$this->session->set_flashdata('success', 'votre produit est inserer');
	 		//Redirect to index page with error above
			 redirect(base_url()."index.php/produit");
	    }
	 }
}

public function getnompro($idproduit){
	$this->db->where('idproduit',$idproduit);
	$query=$this->db->get($this->table);
	return $query=result_array();
}
/*
 public function edit_pro($idproduit){
	 $this->load->model('produit_model');
	$produits = $this->produit_model->get_produit($idproduit);
	$data = array();
	$data['produit'] = $produits;
	$this->form_validation->set_rules('intrants','intrants');
	$this->form_validation->set_rules('nom_produit','nom_produit');
	$this->form_validation->set_rules('pu_d_V','pu_d_V');  
	$this->form_validation->set_rules('pu_d_G','pu_d_G');  
	$this->form_validation->set_rules('unite','unite');  
	$this->form_validation->set_rules('description','description');  
	$this->form_validation->set_rules('presentation','presentation');    
	$this->form_validation->set_rules('parpresentation','parpresentation');   
	$this->form_validation->set_rules('datePEr','datePEr');           
        if($this->form_validation->run() == FALSE){
            //Get produit id
			$this->session->set_flashdata('produit_created', 'Your task has been created');
			//Redirect to index page with error above
			//redirect(base_url()."index.php/produit/edit_pro");
			$this->load->view('produit/edit_pro',$data);
	
		
		} 
		
		else {
            //Get  id produit
            $idproduit = $this->produit_model->get_produit($idproduit);
            //Post values to array
            $data = array(             
				'intrants'      => $this->input->post('intrants'),   
				'nom_produit'    => $this->input->post('nom_produit'),
				'pu_d_V'    => $this->input->post('pu_d_V'),
				'pu_d_G'    => $this->input->post('pu_d_G'),
				'unite'    => $this->input->post('unite'),		
				'description'    => $this->input->post('description'),
				'presentation'    => $this->input->post('presentation'),
				'parpresentation'    => $this->input->post('parpresentation'),
				'datePEr'    => $this->input->post('datePEr'),	
			);

           if($this->produit_model->edit_pro($idproduit , $data)){
			   
                $this->session->set_flashdata('produit updated', 'Your produit has been updated');
                //Redirect to index page with error aboves
			    redirect('index.php/produit/');
			  
           }
         }
	}*/
	
	
 function edit_pro($idproduit){

			$this->load->model('produit_model');
			$produits = $this->produit_model->get_produit($idproduit);
			$data = array();
			$data['produit'] = $produits;
			$this->form_validation->set_rules('intrants','intrants','required');
			
		if($this->form_validation->run()== false){
			$this->load->view('acc');
			$this->load->view('produit/edit_pro', $data);
	
		
		}
		else{
			$formArray = array();
			$formArray['intrants'] = $this->input->post('intrants');
			$formArray['nom_produit'] = $this->input->post('nom_produit');
			$formArray['pu_d_V'] = $this->input->post('pu_d_V');
			$formArray['pu_d_G'] = $this->input->post('pu_d_G');
			$formArray['pu_d_A'] = $this->input->post('pu_d_A');
			$formArray['unite'] = $this->input->post('unite');
			$formArray['tva'] = $this->input->post('tva');
			$formArray['description'] = $this->input->post('description');
			$formArray['presentation'] = $this->input->post('presentation');
			$formArray['parpresentation'] = $this->input->post('parpresentation');
			$formArray['datePEr'] = $this->input->post('datePEr');
			$this->produit_model->edit_pro($idproduit, $formArray);
			$this->session->set_flashdata('success', 'mise a jour correct');
			redirect(base_url().'index.php/produit/index');
		
		}
		
	}

	public function delete_prod($idproduit){    
		//Delete list
		$this->produit_model->delete_prod($idproduit);
		//Create Message
		$this->session->set_flashdata('success', 'votre produit a ete supprimer');        
		//Redirect to list index
		redirect('index.php/produit');
 }

 public function infopro()
 {
	 $this->load->view('acc');
	 $produits = $this->produit_model->affichpro();	
	 $data['produit'] = $produits;
	 //var_dump($data);
	 $this->load->view('produit/infopro',$data);
 }


 public function excel()

 {
	 $this->load->model-('produit_model');
	 $data["produit"]=$this->produit_model->getexcel();
	 $this->load->view('produit/list_pro',$data);
 }
//  public function action()
//  {
 
//  $this->load->model("produit_model");
//  $this->load->library('Classes/PHPExcel');
//  $object = new PHPExcel();
//  $object->setActiveSheetIndex(0);
//  $table_columns= array("idproduit","intrants","nom_produit","stock","presentation","parpresentation","stock_gros",
//   "pu_detail","pu_d_gros","unite","tva","description","date(peremption)");
//  $column= 0;
 
// 	foreach($table_columns as $field)
// 	{
// 		$object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
// 		$column++;
// 	}
// 	$produit = $this->produit_model->getexcel();
// 	$excel_row = 2;
 
// 	foreach($produit as $produits)
// 	{
// 		// if(!empty($produits['par2presentation']=(int)($produits['stock']/$produits['parpresentation'])));
	
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $produits->idproduit);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $produits->intrants);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $produits->nom_produit);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $produits->stock);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $produits->presentation);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $produits->parpresentation);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $produits->par2presentation);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $produits->pu_d_V);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $produits->pu_d_G);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $produits->unite);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $produits->tva);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $produits->description);
// 		$object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $produits->datePEr);
// 		$excel_row++;
// 	}
// 	$object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
// 	header('content-Type: application/vnd.ms-excel');
// 	header('content-Disposition:attachement;filename="client.xls"');
// 	$object_writer->save('php://output');
//  }


public function exceles()
{
			$this->load->model("produit_model");
			$this->load->view('produit/excel',["excel"=>$this->produit_model->affichpro()]);
		// foreach($this->produit_model->affichpro() as $pro)
		// {
		// 	echo($pro["intrants"]);
		// }

}

public function notifier()
{
	echo json_encode($this->produit_model->notifier());
}




}