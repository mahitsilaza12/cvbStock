<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commande_fou_m extends CI_Model{

    private $table = "commande_fou";
    public function __construct(){
        parent:: __construct();
        $this->load->model('fournisseur_model');
        $this->load->model('produit_model');
        $this->load->model('ligne_commande_fou_m');

    }

    public function all(){
    $this->db->select("
    commande_fou.idcommande_fou,fournisseur.nom_fournisseur,produit.intrants, produit.nom_produit,ligne_commande_fou.qt,
    produit.unite,produit.description,produit.pu_d_A,(qt*pu_d_A) AS montant,commande_fou.date_appro,
    conditio,
    ");
    $this->db->from('commande_fou,fournisseur,produit,ligne_commande_fou');
    $this->db->where("commande_fou.idcommande_fou=ligne_commande_fou.idcommande_fou and
     produit.idproduit=ligne_commande_fou.idproduit AND fournisseur.idfournisseur=commande_fou.idfournisseur
    ");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
}
public function get_commande_fou($idcommande_fou){
    $this->db->where('idcommande_fou',$idcommande_fou);
    $query = $this->db->get($this->table);
    return $query->row_array();
}
public function get_commande_fous(){
    $this->db->order_by('idcommande_fou');
    $query = $this->db->get($this->table);
    return $query->row_array();
}


function insert_commande_fou($idfournisseur,$date_appro){
   
    $this->db->set([
     "idfournisseur"=>$idfournisseur,
     "date_appro"=>$date_appro
    ]);
     
     return $this->db->insert($this->table) ? true : false;
 
    }  

    public function getlast(){
        return $this->db->select("idcommande_fou")
                 ->order_by("idcommande_fou", "DESC")
                 ->get($this->table)
                 ->result_array()[0]["idcommande_fou"];
    }

    
    public function delete_commande_fou($idcommande_fou){
        $this->db->where('idcommande_fou',$idcommande_fou);
        $this->db->delete($this->table);
        return true;
    }

    public function genererFacture($idcommande_fou='')
    {
        if(!isset($idcommande_fou))
        {
         $sql =" SELECT nom_fournisseur,adresse,description,ligne_commande_fou.idcommande_fou AS numfact,nom_produit,qt,
         unite,produit.pu_d_A,(qt*pu_d_A) AS total, date_appro AS dates,payement_fou.net as kk,type_d_payement,date_payement,date_d_echeance
         ,payee FROM payement_fou, ligne_commande_fou, produit, fournisseur, commande_fou
         where ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND produit.idproduit=ligne_commande_fou.idproduit
         AND fournisseur.idfournisseur=commande_fou.idfournisseur and commande_fou.idcommande_fou=payement_fou.idcommande_fou";
  

        
     }
     else{
      $sql =" SELECT nom_fournisseur,adresse,description,ligne_commande_fou.idcommande_fou AS numfact,nom_produit,qt,
      unite,produit.pu_d_A,(qt*pu_d_A) AS total, date_appro AS dates,net,type_d_payement,date_payement,date_d_echeance
      ,payee FROM payement_fou, ligne_commande_fou, produit, fournisseur, commande_fou
      where ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND produit.idproduit=ligne_commande_fou.idproduit
      AND fournisseur.idfournisseur=commande_fou.idfournisseur and commande_fou.idcommande_fou=payement_fou.idcommande_fou and commande_fou.idcommande_fou=".$idcommande_fou;
     
     }
     $facture = $this->db->query($sql);

     return $facture->result();
  }

  public function genererFactures($idcommande_fou='')
    {
        if(!isset($idcommande_fou))
        {
         $sql =" SELECT nom_fournisseur,adresse,description,ligne_commande_fou.idcommande_fou AS numfact,nom_produit,qt,
         unite,produit.pu_d_A,(qt*pu_d_A) AS total, date_appro AS dates FROM ligne_commande_fou, produit, fournisseur, commande_fou
         where ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND produit.idproduit=ligne_commande_fou.idproduit
         AND fournisseur.idfournisseur=commande_fou.idfournisseur";
  

        
     }
     else{
      $sql =" SELECT nom_fournisseur,adresse,description,ligne_commande_fou.idcommande_fou AS numfact,nom_produit,qt,
      unite,produit.pu_d_A,(qt*pu_d_A) AS total, date_appro AS dates FROM ligne_commande_fou, produit, fournisseur, commande_fou
      where ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND produit.idproduit=ligne_commande_fou.idproduit
      AND fournisseur.idfournisseur=commande_fou.idfournisseur and commande_fou.idcommande_fou=".$idcommande_fou;
     
     }
     $facture = $this->db->query($sql);

     return $facture->result();
  }


//  public function getpu($pu_d_A)
//  {
//      $this->db->where("pu_d_A",$pu_d_A);
//      $query=$this->db->get($this->table);
//      return $query->result_Array();
//  }
 
public function get_produitnom(){
    $this->db->order_by('nom_produit');
    $query = $this->db->get('produit');
    return $query->result_array();
}
    
public function createcom($idfournisseur,$date_appro)
{ $this->db->set([
    "idfournisseur"=>$idfournisseur,
    "date_appro"=>$date_appro
]);
return $this->db->insert($this->table) ? true : false;


}

// public function journal($date1, $date2){
//     return $this->db->select("commande_fou.idcommande_fou,fournisseur.nom_fournisseur,fournisseur.adresse,produit.nom_produit,commande_fou.date_appro,sum(qt*pu_d_A) as montant ")
//                         ->from("produit,fournisseur ,ligne_commande_fou,commande_fou ")
//                         ->where("produit.idproduit =ligne_commande_fou.idproduit AND commande_fou.idfournisseur=
//                         fournisseur.idfournisseur AND ligne_commande_fou.idcommande_fou=commande_fou.idcommande_fou")
//                         ->where("commande_fou.date_appro BETWEEN '".$date1."' AND '".$date2."'")
//                         ->group_by("ligne_commande_fou.idcommande_fou");

//                       return $this->db->get()
//                         ->result();
//   }


  public function afficjournal($date1, $date2)
    {
      $this->db->select  ("commande_fou.idcommande_fou as numfact,conditio,
    nom_fournisseur,description,
    nom_produit,qt, unite,(qt*pu_d_A) AS montant, date_appro, 
    payement_fou.payee ,payement_fou.type_d_payement,payement_fou.date_payement,
    payement_fou.date_d_echeance,payement_fou.net");
    $this->db->distinct();
    $this->db->FROM("payement_fou, ligne_commande_fou,fournisseur, produit, commande_fou");
    $this->db->where("commande_fou.idcommande_fou=payement_fou.idcommande_fou and 
   ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND 
   produit.idproduit=ligne_commande_fou.idproduit
   AND fournisseur.idfournisseur=commande_fou.idfournisseur");
   $this->db->where("commande_fou.date_appro BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_fou.idcommande_fou");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }
    public function delete($idcommande_fou){
        $this->db->where('idcommande_fou',$idcommande_fou);
        $this->db->delete($this->table);
        return true;
    }

    public function chiot($date1, $date2)
    {
      $this->db->select  ("commande_fou.idcommande_fou as numfact,conditio,
    nom_fournisseur,adresse,
    nom_produit,qt, unite,date_appro,pu_d_A,
    ");
    $this->db->distinct();
    $this->db->FROM("payement_fou, ligne_commande_fou, produit, fournisseur, commande_fou");
    $this->db->where("commande_fou.idcommande_fou=payement_fou.idcommande_fou and 
   ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND 
   produit.idproduit=ligne_commande_fou.idproduit
   AND fournisseur.idfournisseur=commande_fou.idfournisseur");
   $this->db->where("commande_fou.date_appro BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_fou.idcommande_fou");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }



    public function affi($date1, $date2)
    {
      $this->db->select  ("commande_fou.idcommande_fou as numfact,conditio,
    nom_fournisseur,adresse,description,net,type_d_payement,payee,date_payement,date_d_echeance,
    nom_produit,qt, unite,date_appro,pu_d_A
    ");
    $this->db->FROM("payement_fou, ligne_commande_fou, produit, fournisseur, commande_fou");
    $this->db->where("commande_fou.idcommande_fou=payement_fou.idcommande_fou and 
   ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND 
   produit.idproduit=ligne_commande_fou.idproduit
   AND fournisseur.idfournisseur=commande_fou.idfournisseur");
   $this->db->where("commande_fou.date_appro BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_fou.idcommande_fou");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }




}

?>