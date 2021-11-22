<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payement_cli extends CI_Controller {
	
    public function __construct(){
		parent::__construct();
        $this->load->model('commande_cli_m');
        $this->load->model('client_model');
        $this->load->model('ligne_commande_cli_m');
        $this->load->model('produit_model');
        $this->load->model('payement_cli_m');
        $this->load->model('payement_fou_m');
        // if(!($this->session->has_userdata("state")))
    		// {
        //         $this->session->set_flashdata("login" , "Vous devez d'abord vous connecter");
        //         redirect(base_url()."index.php/welcome/login");
        //     }

	}
 
  public function information($idcommande_cli)
  {  
      $data['client']= $this->client_model->get_clinom();
       $data['produit']= $this->produit_model->get_produitnom();
      $this->load->view('acc');  
      $data['payement_cli'] =  $this->payement_cli_m->journal($idcommande_cli);
      $data['remise'] = $this->input->post('remise');
      $this->load->view('commande_cli/information',$data);
    //var_dump($this->payement_cli_m->journal($idcommande_cli));

      
  }
  
  public function insert()
  {
  
      $this->load->model('commande_cli_m');
      $this->load->model('client_model');
      $this->load->model('ligne_commande_cli_m');
      $this->load->model('payement_cli_m');
      
      $data['client']= $this->client_model->get_clinom();
      $data['produit']= $this->produit_model->get_produitnom();
      $this->form_validation->set_rules('payee','payee','required');
      if($this->form_Validation->run()==false)
      {
          $this->load->view('acc');
          $this->load->view('commande_cli/information',$data);
      }
       
      else{
          $data['payement_cli'] = $this->payement_cli_m->insert();
          $this->load->view('acc');
          $this->load->view('commande_cli/payement',$data);
  
      }
         
  
      
  
  redirect('index.php/commande_cli/index');
  
  }
  
  
  
  
  // public function payement()
  // {
  //     $this->load->view('acc');
  //     $this->load->model('payement_cli_m');
  // 	$payement_clis = $this->payement_cli_m->get($idpay_cli);
  // 	$data = array();
  // 	$data['payement_cli'] = $payement_clis;
  //     $this->form_validation->set_rules('payee','payee','required');
  //     $this->form_validation->set_rules('type_d_payement','type_d_payement','required');
  //     $this->form_validation->set_rules('date_d_payement','date_d_payement','required');
  //     $this->form_validation->set_rules('date_d_echeance','date_d_echeance','required');
  // if($this->form_validation->run()== false){
  // 	$this->load->view('payement_cli/payement', $data);
  // }
  // else{
  // 	$formArray = array();
  // 	$formArray['payee'] = $this->input->post('payee');
  // 	$formArray['type_d_payement'] = $this->input->post('type_d_payement');
  //     $formArray['date_d_payement'] = $this->input->post('date_d_payement');
  //     $formArray['date_d_echeance'] = $this->input->post('date_d_echeance');
  // 	$this->payement_cli_m->updatepayfou($idpay_cli, $formArray);
  // 	$this->session->set_flashdata('success', 'mise a jour correct');
  // 	redirect(base_url().'index.php/payement_cli/info_fou');
  
  // }
  
  // }
  
  public function payement()
              {
                  
                  $this->load->model('commande_cli_m');
                  $this->load->model('client_model');
                  $this->load->model('ligne_commande_cli_m');
                  $this->load->model('produit_model');
                 
              $data= array(
                  'net' =>$this->input->post('net'),
                  'payee'=>$this->input->post('payee'),
                  'remise'=>$this->input->post('remise'),
                  'type_d_payement'=>$this->input->post('type_d_payement'),
                  'date_payement'=>$this->input->post('date_payement'),
                  'date_d_echeance'=>$this->input->post('date_d_echeance')
                  );
            
              $this->form_validation->set_rules('payee','payee','required');
              if($this->form_validation->run()==false)
              {
              $this->load->view('acc');
              $this->load->view('commande_cli/information',$data);
             
             
              }

              
              else{
               
              
                  $this->payement_cli_m->insert($data['payee'],$data['type_d_payement'],$data['date_payement'],$data['date_d_echeance'],$data['net'],$data['remise']);
                  $data['payement_cli']=$this->payement_cli_m->affic();
                  $this->load->view('acc');
         
                  redirect("index.php/payement_cli/payer" , "refresh");
              
              }
  
             
          }      
  
          public function payer()
          {
              $data['payement_cli']=$this->payement_cli_m->affic();
              $this->load->view('acc');
              $this->load->view('commande_cli/payement',$data);
              
          }
          public function commpay()
          {
              $this->payement_cli_m->insert();
              redirect('index.php/commande_cli/information');
          }
           
  
          public function edit_pay($numfact)
        {
            $this->load->model('payement_cli_m');
           $payement_clis = $this->payement_cli_m->get_numfact($numfact);
           $data = array();
           $data['payement_cli']=$payement_clis;
           $this->form_validation->set_rules('payee','payee','required');
           if($this->form_validation->run()==false)
           {
            $this->load->view('acc');
            
            $this->load->view('commande_cli/edition_pay',$data);
            
           }

           else{
            $formArray = array();
      $formArray['payee'] = $this->input->post('payee');
      $formArray['remise'] = $this->input->post('remise');
			$formArray['type_d_payement'] = $this->input->post('type_d_payement');
			$formArray['date_payement'] = $this->input->post('date_payement');
            $formArray['date_d_echeance'] = $this->input->post('date_d_echeance');
            ($this->payement_cli_m->edit_pay($numfact,$formArray));
            $this->session->set_flashdata('success', 'mise a jour correct');
			redirect("http://cybb.test/index.php/payement_cli/payer" , "refresh");
           }
            
        }
  
          public function exceles()
          {
                      $this->load->model("payement_cli_m");
                      $this->load->view('commande_cli/excel',["excel"=>$this->payement_cli_m->affic()]);
             
          
          }

          public function exceljournals()
          {
              $this->load->model("commande_cli_m");
              $data['produit']= $this->produit_model->get_produitnom();
              $data['client']=$this->client_model->get_clinom($this->input->post('nom_client'))[0]['idclient'];
              $date1 = $this->input->post('date1');
              $date2 = $this->input->post('date2');
             // $this->load->view("commande_cli/exceljournal",["exceljournal"=>$this->commande_cli_m->afficjournal($date1,$date2)]);
              var_dump(["exceljournal"=>$this->commande_cli_m->afficjournal($date1,$date2)]);
          }

          public function comm()
          {
            echo json_encode($this->payement_cli_m->comm());
          }
          public function appro()
          {
            echo json_encode($this->payement_fou_m->appro());
          }
          

          public function statistiquepayement()
          {
            // $client =   $this->payement_cli_m->comm();
            // $fournisseur =   $this->payement_cli_m->appro();
            $this->load->view('acc');
          $this->load->view('stat/payementstat'/*,$client,$fournisseur*/);
          }
          public function statistiquepayfou()
          {
            // $client =   $this->payement_cli_m->comm();
            // $fournisseur =   $this->payement_cli_m->appro();
            $this->load->view('acc');
          $this->load->view('stat/payementstatfou'/*,$client,$fournisseur*/);
          }

          public function depense($date1 , $date2)
            {
              //if($date1 == "" and $date2 == "")
          //  $date1 = $this->input->get('date_appro');
          //  $date2 = $this->input->get('date_appro');
                echo json_encode($this->payement_cli_m->depense($date1,$date2));
            }
          public function entree($date1 , $date2)
            {
                echo json_encode($this->payement_cli_m->entree($date1,$date2));
            }

            public function annuler($idcommande_cli, $idproduit)
            { $this->load->view('acc');
              $this->payement_cli_m->suppre($idcommande_cli,$idproduit);
              $this->load->view('commande_cli/information');
           
            }


            public function exceljournale($date1 ="" , $date2 ="")
            {
              if($date1 !="") 
                {
                    $this->load->model("commande_cli_m");
                    $data = $this->commande_cli_m->afficjournal($date1 , $date2);
                    $this->load->view("commande_cli/sound",["excel" => $data]);  
                }
                else{
                    $this->load->model("commande_cli_m");
                    $data = $this->commande_cli_m->afficjournal($date1 , $date2);
                   $this->load->view("commande_cli/sound",["excel" => $data]);
                }
            
            }


                 
    }
  
      // public function information()
      // {
      //     $this->load->view('commande_cli/information');
      // }
  
  
  
  


