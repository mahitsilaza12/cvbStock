<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payement_fou_m extends CI_Model{

    private $table = "payement_fou";
    public function __construct(){
        parent:: __construct();
        $this->load->model('fournisseur_model');
        $this->load->model('produit_model');
        $this->load->model('ligne_commande_fou_m');

    }
    
    public function affic()
    {
    //     $this->db->select("payement_fou.idpay_fou,payement_fou.payee,payement_fou.type_d_payement,
    //     fournisseur.nom_fournisseur
    //     ,payement_fou.date_payement,payement_fou.date_d_echeance,
    //     commande_fou.date_appro,produit.nom_produit,commande_fou.pu_d_A");
    //     $this->db->from("payement_fou,fournisseur,commande_fou,produit");
    //     $this->db->where("commande_fou.idcommande_fou=payement_fou.idcommande_fou
    //      AND produit.idproduit=payement_fou.idproduit and commande_fou.idcommande_fou".$idcommande_fou);
    //      $this->db->order_by('idpay_fou','DESC');
    //    $query = $this->db->get();
    
      $this->db->select  ("commande_fou.idcommande_fou as numfact,
    nom_fournisseur,adresse,description,
    nom_produit,qt, unite,pu_d_A,(qt*pu_d_A) AS montant, date_appro, 
    payement_fou.payee ,payement_fou.type_d_payement,payement_fou.date_payement,
    payement_fou.date_d_echeance,payement_fou.net");
    $this->db->distinct();
    $this->db->FROM("payement_fou, ligne_commande_fou, produit, fournisseur, commande_fou");
    $this->db->where("commande_fou.idcommande_fou=payement_fou.idcommande_fou and 
   ligne_commande_fou.idcommande_fou = commande_fou.idcommande_fou AND 
   produit.idproduit=ligne_commande_fou.idproduit
   AND fournisseur.idfournisseur=commande_fou.idfournisseur");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }

    public function get($idpay_fou)
    {
        $this->db->where($idpay_fou,'idpay_fou');
        $query=$this->db->get($this->table);
        return $query->result_Array();
    }
    
    public function payee($payee)
    {
        $this->db->where($payee,'payee');
        $query=$this->db->get($this->table);
        return $query->result_Array();
    }
    public function update($idpay_fou,$formArray)
    {
        $this->db->where($idpay_fou,'idpay_fou');
        $this->db->update($this->table,$formArray);
    }


    public function insert($payee,$type_d_payement,$date_payement,$date_d_echeance,$net){
    
        $this->db->set([
            "idcommande_fou"=>$this->commande_fou_m->getlast(),
            "payee"=>$payee,
            "type_d_payement"=>$type_d_payement,
            "date_payement"=>$date_payement,
            "net" =>$net,
            "date_d_echeance"=>$date_d_echeance
       
        ]);
        return $this->db->insert($this->table)? true : false;
    }

       



    public function excel_fou($numfact)
    {
        if(!isset($numfact))
        {
            $sql="SELECT commande_fou.idcommande_fou as numfact,
            nom_fournisseur,adresse,description,
            nom_produit,qt, unite,pu_d_A,(qt*pu_d_A) AS montant, date_appro, 
            payement_fou.payee as payee,payement_fou.type_d_payement,payement_fou.date_payement,
            payement_fou.date_d_echeance FROM payement_fou,fournisseur,commande_fou,produit
            WHERE commande_fou.idcommande_fou=payement_fou.idcommande_fou
         AND produit.idproduit=payement_fou.idproduit";
        }
        else {
            $sql1="SELECT commande_fou.idcommande_fou as numfact,
            nom_fournisseur,adresse,description,
            nom_produit,qt, unite,pu_d_A,(qt*pu_d_A) AS montant, date_appro, 
            payement_fou.payee as payee,payement_fou.type_d_payement,payement_fou.date_payement,
            payement_fou.date_d_echeance FROM payement_fou,fournisseur,commande_fou,produit
            WHERE commande_fou.idcommande_fou=payement_fou.idcommande_fou
         AND produit.idproduit=payement_fou.idproduit And commande_fou.idcommande_fou=".$numfact;       
        }


    }

    public function payeep($payee)
    {
        $this->db->where('payee',$payee);
        $query=$this->db->get('payement_fou');
        return $query->result_array();
    }

    public function journal($idcommande_fou)
    {
        $this->db->select("nom_produit,commande_fou.idcommande_fou,conditio,fournisseur.nom_fournisseur,pu_d_A,qt,(qt*pu_d_A) as montant");
        $this->db->from("produit,commande_fou,fournisseur,ligne_commande_fou");
        $this->db->where("commande_fou.idcommande_fou=ligne_commande_fou.idcommande_fou AND produit.idproduit=ligne_commande_fou.idproduit
        and fournisseur.idfournisseur=commande_fou.idfournisseur");
        $this->db->where("ligne_commande_fou.idcommande_fou",$idcommande_fou);
        // //$this->db->where("produit.idproduit");
        // $this->db->group_by("commande_fou.idcommande_fou");
        return $this->db->get()
                ->result();
        
    }


    public function affichpro()
    
    {
        if(!isset($idpay_fou))
        {
            $sql="SELECT commande_fou.idcommande_fou as numfact,
            nom_fournisseur,adresse,description,
            nom_produit,qt, unite,pu_d_A,(qt*pu_d_A) AS montant, date_appro, 
            payement_fou.payee as payee,payement_fou.type_d_payement,payement_fou.date_payement,
            payement_fou.date_d_echeance FROM payement_fou,fournisseur,commande_fou,produit,ligne_commande_fou
            WHERE commande_fou.idcommande_fou=payement_fou.idcommande_fou
         AND  ligne_commande_fou.idcommande_fou = payement_fou.idcommande_fou";
        }
        else {
            $sql1="SELECT commande_fou.idcommande_fou as numfact,
            nom_fournisseur,adresse,description,
            nom_produit,qt, unite,pu_d_A,(qt*pu_d_A) AS montant, date_appro, 
            payement_fou.payee as payee,payement_fou.type_d_payement,payement_fou.date_payement,
            payement_fou.date_d_echeance FROM payement_fou,fournisseur,commande_fou,produit,ligne_commande_fou
            WHERE commande_fou.idcommande_fou=payement_fou.idcommande_fou
         AND  ligne_commande_fou.idcommande_fou = payement_fou.idcommande_fou and payement_fou.idpay_fou=".$idpay_fou;       
        }   
        
     $payement_fou = $this->db->query($sql);

     return $payement_fou->result_Array();
  }
    
  public function get_numfact($numfact){
    $this->db->where('idcommande_fou',$numfact);
    $query = $this->db->get('payement_fou');
    return $query->result_array();
}

  public function edit_pay($numfact,$formArray)
  {
      $data = [
        
          'payee'            =>$formArray["payee"],
          'type_d_payement'  =>$formArray["type_d_payement"],
          'date_payement'    =>$formArray["date_payement"],
          'date_d_echeance'  =>$formArray["date_d_echeance"]
      ];
    return  $this->db->query("UPDATE ".$this->table." SET payee = payee + ".$data["payee"]." WHERE idcommande_fou = ".$numfact) ? true : false;
  }

  public function py($operation)   
        {
            $sql ="UPDATE payement_fou set payee=payee ".$operation." ? where idpay_fou=?";
            return $this->db->query($sql, array($payee, $idpay_fou)) ?true :false;
        }

  public function vola()
  {
      $this->db->order_by('payee');
      $query=$this->db->get('payement_fou');
        return $query->result_array();
  }

  public function echeance()
  {
    //   $sql = "SELECT * FROM payement_fou WHERE DATEDIFF(date_d_echeance, NOW()) BETWEEN 0 AND 1";
    $sql = "SELECT  DATEDIFF((date_d_echeance),(date_payement)) as dater FROM payement_fou WHERE DATEDIFF((date_d_echeance),(date_payement)) < 7";
      return $this->db->query($sql)
                      ->result();// ? true : false;
  }



}