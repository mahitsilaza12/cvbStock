<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payement_fou extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
        $this->load->model('commande_fou_m');
        $this->load->model('fournisseur_model');
        $this->load->model('ligne_commande_fou_m');
        $this->load->model('produit_model');
        $this->load->model('payement_fou_m');
        // if(!($this->session->has_userdata("state")))
    	// 	{
        //         $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //         redirect(base_url()."index.php/welcome/login");
        //     }

	}
 

public function information($idcommande_fou)
{
    $data['fournisseur']= $this->fournisseur_model->get_fournnom();
    $data['produit']= $this->produit_model->get_produitnom();
    $this->load->view('acc');
     	
    $data['payement_fou'] = $this->payement_fou_m->journal($idcommande_fou);
    $this->load->view('commande_fou/information',$data);
    //var_dump($data);
}

public function insert()
{

    $this->load->model('commande_fou_m');
    $this->load->model('fournisseur_model');
    $this->load->model('ligne_commande_fou_m');
    $this->load->model('payement_fou_m');
    
    $data['fournisseur']= $this->fournisseur_model->get_fournnom();
    $data['produit']= $this->produit_model->get_produitnom();
    $this->form_validation->set_rules('payee','payee','required');
    if($this->form_Validation->run()==false)
    {
        $this->load->view('acc');
        $this->load->view('commande_fou/information',$data);
    }
     
    else{
        $data['payement_fou'] = $this->payement_fou_m->insert();
        $this->load->view('acc');
        $this->load->view('commande_fou/payement',$data);

    }
     	

//    var_dump($data);
    

redirect('index.php/commande_fou/index');

}




// public function payement()
// {
//     $this->load->view('acc');
//     $this->load->model('payement_fou_m');
// 	$payement_fous = $this->payement_fou_m->get($idpay_fou);
// 	$data = array();
// 	$data['payement_fou'] = $payement_fous;
//     $this->form_validation->set_rules('payee','payee','required');
//     $this->form_validation->set_rules('type_d_payement','type_d_payement','required');
//     $this->form_validation->set_rules('date_d_payement','date_d_payement','required');
//     $this->form_validation->set_rules('date_d_echeance','date_d_echeance','required');
// if($this->form_validation->run()== false){
// 	$this->load->view('payement_fou/payement', $data);
// }
// else{
// 	$formArray = array();
// 	$formArray['payee'] = $this->input->post('payee');
// 	$formArray['type_d_payement'] = $this->input->post('type_d_payement');
//     $formArray['date_d_payement'] = $this->input->post('date_d_payement');
//     $formArray['date_d_echeance'] = $this->input->post('date_d_echeance');
// 	$this->payement_fou_m->updatepayfou($idpay_fou, $formArray);
// 	$this->session->set_flashdata('success', 'mise a jour correct');
// 	redirect(base_url().'index.php/payement_fou/info_fou');

// }

// }

public function payement()
            {
                
                $this->load->model('commande_fou_m');
                $this->load->model('fournisseur_model');
                $this->load->model('ligne_commande_fou_m');
                $this->load->model('produit_model');
               
            $data= array(
                'net' =>$this->input->post('net'),
                'payee'=>$this->input->post('payee'),
                'type_d_payement'=>$this->input->post('type_d_payement'),
                'date_payement'=>$this->input->post('date_payement'),
                'date_d_echeance'=>$this->input->post('date_d_echeance')
                );
          
            $this->form_validation->set_rules('payee','payee','required');
            if($this->form_validation->run()==false)
            {
            $this->load->view('acc');
            $this->load->view('commande_fou/information',$data);
           
           
            }

            else{
                $this->payement_fou_m->insert($data['payee'],$data['type_d_payement'],$data['date_payement'],$data['date_d_echeance'],$data['net']);
                $data['payement_fou']=$this->payement_fou_m->affic();
                $this->load->view('acc');
                $this->load->view('commande_fou/payement',$data);
            
            }

           
        }      

        public function payer()
        {
            $data['payement_fou']=$this->payement_fou_m->affic();
            $this->load->view('acc');
            $this->load->view('commande_fou/payement',$data);
        }
        public function commpay()
        {
            $this->payement_fou_m->insert();
            redirect('index.php/commande_fou/information');
        }
         

        public function edit($idpay_fou)
        {
            $this->load->view('acc');
            $this->load->view('commande_fou/edit_pay');
        }

        public function exceles()
        {
                    $this->load->model("payement_fou_m");
                    $this->load->view('commande_fou/excel',["excel"=>$this->payement_fou_m->affic()]);
           
        
        }


        public function edit_pay($numfact)
        {
            $this->load->model('payement_fou_m');
           $payement_fous = $this->payement_fou_m->get_numfact($numfact);
           $data = array();
           $data['payement_fou']=$payement_fous;
           $this->form_validation->set_rules('payee','payee','required');
           if($this->form_validation->run()==false)
           {
            $this->load->view('acc');
            
            $this->load->view('commande_fou/edition_pay',$data);
            
           }

           else{
            $formArray = array();
			$formArray['payee'] = $this->input->post('payee');
			$formArray['type_d_payement'] = $this->input->post('type_d_payement');
			$formArray['date_payement'] = $this->input->post('date_payement');
            $formArray['date_d_echeance'] = $this->input->post('date_d_echeance');
            ($this->payement_fou_m->edit_pay($numfact,$formArray));
            $this->session->set_flashdata('success', 'mise a jour correct');
			redirect("http://cybb.test/index.php/payement_fou/payer" , "refresh");
           }
            
        }

        public function payeee($idpay_fou)
        {
            $data['payement_fou']=$this->payement_fou_m->vola();
            $data = array(
                'payee'=>$this->input->post('payee')
            );
            $this->$this->payement_fou_m->py($operation="+");
        }
       
        public function exceljournal()
        {
            $this->load->model("commande_fou_m");
              $data['produit']= $this->produit_model->get_produitnom();
              $data['fournisseur']=$this->fournisseur_model->get_fournnom($this->input->post('nom_fournisseur'))[0]['idfournisseur'];
              $date1 = $this->input->post('date1');
              $date2 = $this->input->post('date2');
              $this->load->view("commande_fou/exceljournal",["exceljournal"=>$this->commande_fou_m->afficjournal($date1,$date2)]);
             // var_dump(["exceljournal"=>$this->commande_fou_m->afficjournal($date1,$date2)]);
        }
        public function datecheance()
        {
            echo json_encode($this->payement_fou_m->echeance());
        }


        
        public function exceljournale($date1 ="" , $date2 ="")
        {
          if($date1 !="") 
            {
                $this->load->model("commande_fou_m");
                $data = $this->commande_fou_m->affi($date1 , $date2);
                $this->load->view("commande_fou/sound",["excel" => $data]);  
            }
            else{
                $this->load->model("commande_fou_m");
                $data = $this->commande_fou_m->affi($date1 , $date2);
               $this->load->view("commande_fou/sound",["excel" => $data]);
            }
        
        }
               
  }


