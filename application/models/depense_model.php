<?php

Class depense_model extends CI_model{
    private $table = "depense";

    public function __construct(){
        parent::__construct();
        $this->load->model('depense_model');
    }
    function insert_de($formArray){
        $this->db->insert($this->table, $formArray); //INSERT INTO
    }
    public function get_date(){
        $this->db->order_by("date_depense");
        $query=$this->db->get("depense");
        return $query->result();
    }

    function get($iddepense){
        $this->db->where('iddepense',$iddepense);
        return $this->db->get($this->table)->row_array();
  
    }


    function all(){
        return $this->db->get($this->table)->result_array(); //SELECT *FROM
    }

    function updatede($iddepense,$formArray){
        $this->db->where('iddepense', $iddepense);
        $this->db->update($this->table, $formArray);
    }
  
    function deletede($iddepense){
        $this->db->where('iddepense', $iddepense);
        $this->db->delete($this->table); //delete from client;
  
  }


  public function journal($date1, $date2)
  {
    $this->db->select  ("depense.iddepense,nom,
  motif,montant,date_depense");
  $this->db->distinct();
  $this->db->FROM("depense");
 $this->db->where("depense.date_depense BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_cli.idcommande_cli");
  $query = $this->db->get();  
  if($query->row_array() < 1){
     return false;
 }
 return $query->result_array();
  
  }

  public function affi($date1, $date2)
  {
    $this->db->select  ("depense.iddepense,nom,
    motif,montant,date_depense
  ");
  $this->db->distinct();
  $this->db->FROM("depense");
 $this->db->where("depense.date_depense BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_cli.idcommande_cli");
  $query = $this->db->get();  
  if($query->row_array() < 1){
     return false;
 }
 return $query->result_array();
  
  }


}


?>