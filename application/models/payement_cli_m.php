<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payement_cli_m extends CI_Model{

    private $table = "payement_cli";
    public function __construct(){
        parent:: __construct();
        $this->load->model('client_model');
        $this->load->model('produit_model');
        $this->load->model('ligne_commande_cli_m');

    }

    public function affic()
    {
      $this->db->select  ("commande_cli.idcommande_cli as numfact,conditio,remise,
    nom_client,adresse,description,
    nom_produit,qt, unite,(qt*pu_d_A) AS montant, date_commande, 
    payement_cli.payee,payement_cli.remise ,payement_cli.type_d_payement,payement_cli.date_payement,
    payement_cli.date_d_echeance,payement_cli.net");
    $this->db->distinct();
    $this->db->FROM("payement_cli, ligne_commande_cli, produit, client, commande_cli");
    $this->db->where("commande_cli.idcommande_cli=payement_cli.idcommande_cli and 
   ligne_commande_cli.idcommande_cli = commande_cli.idcommande_cli AND 
   produit.idproduit=ligne_commande_cli.idproduit
   AND client.idclient=commande_cli.idclient");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }
    
    public function insert($payee,$type_d_payement,$date_payement,$date_d_echeance,$net,$remise){
    
        $this->db->set([
            "idcommande_cli"=>$this->commande_cli_m->getlast(),
            "payee"=>$payee,
            "type_d_payement"=>$type_d_payement,
            "date_payement"=>$date_payement,
            "net" =>$net,
            "remise" =>$remise,
            "date_d_echeance"=>$date_d_echeance
       
        ]);
        return $this->db->insert($this->table)? true : false;
    }

       



    public function excel_cli($numfact)
    {
        if(!isset($numfact))
        {
            $sql="SELECT commande_cli.idcommande_cli as numfact,
            nom_client,adresse,description,
            nom_produit,qt, unite,pu_d_V,pu_d_G,(qt*pu_d_V) AS montant,(qt*pu_d_V) AS montants, date_commande, 
            payement_cli.payee as payee,payement_cli.type_d_payement,payement_cli.date_payement,remise,
            payement_cli.date_d_echeance FROM payement_cli,client,commande_cli,produit
            WHERE commande_cli.idcommande_cli=payement_cli.idcommande_cli
         AND produit.idproduit=payement_cli.idproduit";
        }
        else {
            $sql1="SELECT commande_cli.idcommande_cli as numfact,
            nom_client,adresse,description,
            nom_produit,qt, unite,pu_d_V,pu_d_G,(qt*pu_d_V) AS montant,(qt*pu_d_V) AS montants, remise,date_commande, 
            payement_cli.payee as payee,payement_cli.type_d_payement,payement_cli.date_payement,
            payement_cli.date_d_echeance FROM payement_cli,client,commande_cli,produit
            WHERE commande_cli.idcommande_cli=payement_cli.idcommande_cli
         AND produit.idproduit=payement_cli.idproduit And commande_cli.idcommande_cli=".$numfact;       
        }


    }


    public function journal($idcommande_cli)
    {
        $this->db->select("nom_produit,commande_cli.idcommande_cli,conditio,ligne_commande_cli.idproduit,client.nom_client,pu_d_V,tva,pu_d_G,qt,(qt*pu_d_G) + (((qt*pu_d_G) * tva)  / 100) as montantG,
        (qt*pu_d_V) + (((qt*pu_d_V) * tva)  / 100) as montantD");
        $this->db->from("produit,commande_cli,client,ligne_commande_cli");
        $this->db->where("commande_cli.idcommande_cli=ligne_commande_cli.idcommande_cli AND produit.idproduit=ligne_commande_cli.idproduit
        and client.idclient=commande_cli.idclient");
        $this->db->where("ligne_commande_cli.idcommande_cli",$idcommande_cli);
        // //$this->db->where("produit.idproduit");
        // $this->db->group_by("commande_cli.idcommande_cli");
        return $this->db->get()
                ->result();
        
    }

    public function suppre($idcommande_cli, $idproduit)
    {
        $this->db->where('idcommande_cli', $idcommande_cli);
        $this->db->where('idproduit',$idproduit);
       return $this->db->delete('ligne_commande_cli');
        
    }

    // public function remise($remise)
    // {
    //     $this->db->set([
    //         "remise"=>$remise
    //     ]);
    //     return $this->db->insert($this->table) ?true :false;
    // }


    public function affichpro()
    
    {
        if(!isset($idpay_cli))
        {
            $sql="SELECT commande_cli.idcommande_cli as numfact,payement_cli.remise,
            nom_client,adresse,description,
            nom_produit,qt, unite,pu_d_V,pu_d_G,(qt*pu_d_V) AS montant,(qt*pu_d_G) AS montants, date_commande, 
            payement_cli.payee as payee,payement_cli.type_d_payement,payement_cli.date_payement,payement_cli.remise,
            payement_cli.date_d_echeance FROM payement_cli,client,commande_cli,produit,ligne_commande_cli
            WHERE commande_cli.idcommande_cli=payement_cli.idcommande_cli
         AND  ligne_commande_cli.idcommande_cli = payement_cli.idcommande_cli";
        }
        else {
            $sql1="SELECT commande_cli.idcommande_cli as numfact,
            nom_client,adresse,description,payement_cli.remise,
            nom_produit,qt, unite,pu_d_V,pu_d_G,(qt*pu_d_V) AS montant,(qt*pu_d_G) AS montants,payement_cli.remise, date_commande, 
            payement_cli.payee as payee,payement_cli.type_d_payement,payement_cli.date_payement,
            payement_cli.date_d_echeance FROM payement_cli,client,commande_cli,produit,ligne_commande_cli
            WHERE commande_cli.idcommande_cli=payement_cli.idcommande_cli
         AND  ligne_commande_cli.idcommande_cli = payement_cli.idcommande_cli and payement_cli.idpay_cli=".$idpay_cli;       
        }   
        
     $payement_cli = $this->db->query($sql);

     return $payement_cli->result_Array();
  }
   

  public function get_numfact($numfact){
    $this->db->where('idcommande_cli',$numfact);
    $query = $this->db->get('payement_cli');
    return $query->result_array();
}

public function get_cond(){
    $this->db->where('conditio',$conditio);
    $query = $this->db->get('payement_cli');
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
    return  $this->db->query("UPDATE ".$this->table." SET payee = payee + ".$data["payee"]." WHERE idcommande_cli = ".$numfact) ? true : false;
  }


  public function comm()
  {
    return $this->db->select("count(idpay_fou) as count ,MONTH(date_payement) as month")
                    ->group_by("month")
                    ->get($this->table)
                    ->result();
  }
  public function appro()
  {
     return $this->db->query("SELECT count(idpay_fou) AS COUNT ,DAYNAME()date_appro) AS dayname FROM 
     payement_fou GROUP BY DAYNAME(date_apro)")
                     ->result();
  }


  public function depense($date1="" , $date2="")
    {
        
          
        return $this->db->select("MONTHNAME(date_payement) as month , SUM(payee) as depense")
                        ->where("(date_payement) between '".$date1."' AND '".$date2."'")
                        ->group_by("MONTHNAME(date_payement)")
                        ->get("payement_fou")
                        ->result();
                        
    }
    public function entree($date1 = "" , $date2 = "")
    {
        return $this->db->select("MONTHNAME(date_payement) as month , SUM(payee) as depense")
                        ->where("(date_payement) between '".$date1."' AND '".$date2."'")
                        ->group_by("MONTHNAME(date_payement)")
                        ->get($this->table)
                        ->result();
        

    }



}