<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
         $this->load->model("User_model");

        
    }
    public function index()
    {
    $this->load->view('acc');
    $this->load->model('User_model');	
        $utilisateur = $this->User_model->all();
		$data = array();
		$data['utilisateur'] = $utilisateur;
		$this->load->view('user/index',$data);
    }
    public function add()
    {
        $pseudo = $this->input->post("pseudo");
        $mdp = $this->input->post("mdp");
        $type = $this->input->post("type");
        
        $this->User_model->add($pseudo , $mdp , $type);
    
            $this->session->set_flashdata("update" , "Un compte a été creé avec succès");
            redirect("index.php/user/index");
    
    }
    public function addi()
    {
        $pseudo = $this->input->post("pseudo");
        $mdp = $this->input->post("mdp");
        $type = $this->input->post("type");
        
        $this->User_model->add($pseudo , $mdp , $type);
    
            $this->session->set_flashdata("update" , "Un compte a été creé avec succès");
            redirect("index.php/welcome/login");
    
    }

    
    public function update($id)
    {
        $this->load->view('acc');
        $this->load->model('User_model');
        $utilisateurs = $this->User_model->get($id);
        $data = array();
        $data['utilisateur'] = $utilisateurs;
        $this->form_validation->set_rules('pseudo', 'pseudo', 'required');
        if($this->form_validation->run()== false)
        {
         $this->load->view('user/edit',$data);   
        }
        else{
            $formArray = array();
    $formArray['pseudo'] = $this->input->post('pseudo');
    $formArray['mdp'] = $this->input->post('mdp');
    $this->User_model->update($id , $formArray);
    $this->session->set_flashdata("update" , "Votre compte a été modifié avec succès");
                redirect("index.php/user/index");       
}
       
    }
    public function delete($id)
    {
        if($this->User_model->delete($id))
        {
            $this->session->set_flashdata("update" , "Compte supprimé avec succès");
             redirect("index.php/user/index");
        }
    }

}
