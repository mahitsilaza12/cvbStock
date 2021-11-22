<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fournisseur extends CI_Controller {

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
	 	$this->load->model('fournisseur_model');	
        $fournisseur = $this->fournisseur_model->all();
		$data = array();
		$data['fournisseur'] = $fournisseur;
        $this->load->view('fournisseur/list_fou',$data);
	

		
		
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
		   redirect(base_url().'index.php/fournisseur/index');



	}

	
}



function edit_fou($idfournisseur){
    $this->load->model('fournisseur_model');
	$fournisseurs = $this->fournisseur_model->get($idfournisseur);
	$data = array();
	$data['fournisseur'] = $fournisseurs;
    $this->form_validation->set_rules('nom_fournisseur','nom_fournisseur','required');
    $this->form_validation->set_rules('adresse','ADRESSE','required');
    $this->form_validation->set_rules('contact','CONTACT','required');
    $this->form_validation->set_rules('responsable','RESPONSABLE','required');
if($this->form_validation->run()== false){
	$this->load->view('acc');
	$this->load->view('fournisseur/edit_fou', $data);
}
else{
	$formArray = array();
	$formArray['nom_fournisseur'] = $this->input->post('nom_fournisseur');
	$formArray['adresse'] = $this->input->post('adresse');
    $formArray['contact'] = $this->input->post('contact');
    $formArray['responsable'] = $this->input->post('responsable');
	$this->fournisseur_model->updatefou($idfournisseur, $formArray);
	$this->session->set_flashdata('success', 'mise a jour correct');
	redirect(base_url().'index.php/fournisseur/index');

}
}
function delete($idfournisseur){
	$this->load->model('fournisseur_model');
	$fournisseurs = $this->fournisseur_model->get($idfournisseur);
	if(empty($fournisseurs)){
		$this->session->set_flashdata('success', 'suppression non correct');
		redirect(base_url().'index.php/fournisseur/index');
	
	}

	$this->fournisseur_model->deletefou($idfournisseur);
	$this->session->set_flashdata('success', 'suppression correct');
	redirect(base_url(). 'index.php/fournisseur/index');
	

}


public function excel()

{
	$this->load->model-('fournisseur_model');
	$data["fournisseur"]=$this->fournisseur_model->getexcel();
	$this->load->view('fournisseur/list_fou',$data);
}
public function action()
{

$this->load->model("fournisseur_model");
$this->load->library('Classes/PHPExcel');
$object = new PHPExcel();
$object->setActiveSheetIndex(0);
$table_columns= array("idfournisseur","nom_fournisseur","adresse","contact","responsable");
$column= 0;

   foreach($table_columns as $field)
   {
	   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
	   $column++;
   }
   $fournisseur = $this->fournisseur_model->getexcel();
   $excel_row = 2;

   foreach($fournisseur as $fournisseurs)
   {
	   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $fournisseurs->idfournisseur);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $fournisseurs->nom_fournisseur);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $fournisseurs->adresse);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $fournisseurs->contact);
	   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $fournisseurs->responsable);
	   $excel_row++;
   }
   $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
   header('content-Type: application/vnd.ms-excel');
   header('content-Disposition:attachement;filename="fournisseur.xls"');
   $object_writer->save('php://output');
}


public function exceles()
{
			$this->load->model("fournisseur_model");
			$this->load->view('fournisseur/excel',["excel"=>$this->fournisseur_model->all()]);
   

}


public function recherh($recherch)
{  $this->load->model('fournisseur_model');	
	$fournisseur = $this->fournisseur_model->recherh($recherch);

	echo "<table class='table table-hover' >

	<tbody id='aff>";
     if(!empty($fournisseur)){ foreach($fournisseur as $fournisseurs){ 
		
 echo  "<tr>
        <td>".$fournisseurs['idfournisseur']. "</td>
        <td>".$fournisseurs['nom_fournisseur']."</td>
        <td>".$fournisseurs['adresse']."</td>
		<td>".$fournisseurs['contact']."</td>
		<td>".$fournisseurs['responsable']."</td>
        <td>
       <a href=".base_url()."'index.php/fournisseur/edit_fou/'".$fournisseurs['idfournisseur']." 'class='btn btn-info btn-xr'<i class='fas fa-edit'></i></a>
        </td>
        
        <td>
        <a onclick='return confirm('ete vous sur pour supprimer cette fournisseur?');' href='".base_url()."'index.php/fournisseur/delete/'".$fournisseurs['idfournisseur']." 'class='btn btn-danger btn-xr'<i class='fas fa-trash-alt'></i></a>
        </td>
      </tr>";
	 }
	  } else { echo "
<td colspan= '5'>Element non trouvee</td>";
	  }




	}




}
?>