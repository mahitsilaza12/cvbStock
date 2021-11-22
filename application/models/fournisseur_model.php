<?php

Class fournisseur_model extends CI_model{
    private $table = "fournisseur";
    
    function insert_fou($formArray){
        $this->db->insert("fournisseur", $formArray); //INSERT INTO
    }



   function all(){
       $recherch=$this->input->get('recherch');
       $this->db->like(array('idfournisseur'=>$recherch));
       $this->db->or_like(array('nom_fournisseur'=>$recherch));
       $this->db->or_like(array('adresse'=>$recherch));
       $this->db->or_like(array('contact'=>$recherch));
       $this->db->or_like(array('responsable'=>$recherch));
       return $this->db->get('fournisseur')->result_array(); //SELECT *FROM
   }

  function get($idfournisseur){
      $this->db->where('idfournisseur',$idfournisseur);
      return $this->db->get('fournisseur')->row_array();

  }

  public function get_fournisseur($nom_fournisseur){
    $this->db->where('nom_fournisseur',$nom_fournisseur);
    $query=$this->db->get($this->table);
    return $query->result_array();

}
public function get_fournnom(){
    $this->db->order_by('nom_fournisseur');
    $query=$this->db->get($this->table);
    return $query->result_array();

}

  function updatefou($idfournisseur,$formArray){
      $this->db->where('idfournisseur', $idfournisseur);
      $this->db->update('fournisseur', $formArray);
  }

  function deletefou($idfournisseur){
      $this->db->where('idfournisseur', $idfournisseur);
      $this->db->delete('fournisseur'); //delete from client;

}
public function getlastfou(){
    return $this->db->select("idfournisseur")
             ->order_by("idfournisseur", "DESC")
             ->get($this->table)
             ->result_array()[0]["idfournisseur"];
}

public function getexcel(){
    $this->db->order_by("idfournisseur","DESC");
    $query=$this->db->get("fournisseur");
    return $query->result();
}
public function recherh($recherch)
{

    $this->db->select();
    $this->db->like('nom_fournisseur',$recherch);
    $this->db->or_like('adresse',$recherch);
    $this->db->or_like('contact',$recherch);
    $this->db->or_like('responsable',$recherch);
    $this->db->from($this->table);
    $query = $this->db->get();  
     if($query->row_array() < 1){
        return false;
    }
    return $query->result_array();
}


}


?>