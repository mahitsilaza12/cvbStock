<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class commande_cli_m extends CI_Model{

    private $table = "commande_cli";
    public function __construct(){
        parent:: __construct();
        $this->load->model('client_model');
        $this->load->model('produit_model');
        $this->load->model('ligne_commande_cli_m');
        $this->load->model('commande_cli_m');

    }
   

    public function all(){
        $this->db->select("
        commande_cli.idcommande_cli,client.nom_client,produit.intrants,produit.tva, produit.nom_produit,ligne_commande_cli.qt,produit.unite,produit.description,commande_cli.date_commande
        ");
        $this->db->from('commande_cli,client,produit,ligne_commande_cli_m '); 
        $this->db->where("commande_cli.idcommande_cli=ligne_commande_cli.idcommande_cli and produit.idproduit=ligne_commande_cli.idproduit AND client.idclient=commande_cli.idclient
        ");
        $query = $this->db->get();  
        if($query->row_array() < 1){
           return false;
       }
       return $query->result_array();
        
    }


    public function recherch($recherch){
        $this->db->like('nom_client',$recherch);
        $this->db->or_like('nom_produit',$recherch);
        $this->db->or_like('intrants',$recherch);
        $this->db->or_like('description',$recherch);
       
        $this->db->select("
        commande_cli.idcommande_cli,client.nom_client,produit.intrants,produit.tva, produit.nom_produit,ligne_commande_cli.qt,produit.unite,produit.description,commande_cli.date_commande
        ");
        $this->db->from('commande_cli,client,produit,ligne_commande_cli '); 
        $this->db->where("commande_cli.idcommande_cli=ligne_commande_cli.idcommande_cli and produit.idproduit=ligne_commande_cli.idproduit AND client.idclient=commande_cli.idclient
        ");
        $query = $this->db->get();  
        if($query->row_array() < 1){
           return false;
       }
       return $query->result_array();
        
    }



    public function get_commande_cli($idcommande_cli){
        $this->db->where('idcommande_cli',$idcommande_cli);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    function insert_commande_cli($idclient,$date_commande){
   
            $this->db->set([
                "idclient"=>$idclient,
                "date_commande"=>$date_commande
            ]);
                
                return $this->db->insert($this->table) ? true : false;

   }  



   public function getlast(){
    return $this->db->select("idcommande_cli")
             ->order_by("idcommande_cli", "DESC")
             ->get($this->table)
             ->result_array()[0]["idcommande_cli"];
}

   public function date($date){
    $this->db->where('date_commande',$date_commande);
    $query = $this->db->get($this->table);
    return $query->result_array();
}
   
 

   //generer facture

   public function genererFacture($id_commande_cli='')
      {
          if(!isset($id_commande_cli))
          {
           $sql =" SELECT conditio , client.idclient,nom_client,adresse,nom_produit,unite,description,(net-payee) as rest,produit.tva,ligne_commande_cli.idcommande_cli AS numfact,qt,
           pu_d_V,pu_d_G,(((qt*pu_d_V) * tva)  / 100) AS montantD,(qt*pu_d_G) + (((qt*pu_d_G) * tva)  / 100) AS montantG, produit.tva,commande_cli.date_commande AS dates FROM ligne_commande_cli, produit, client, commande_cli
           where payement_cli, ligne_commande_cli.idcommande_cli = commande_cli.idcommande_cli AND produit.idproduit=ligne_commande_cli.idproduit 
           AND client.idclient=commande_cli.idclient ";
        

          
       }
       else{
        $sql =" SELECT remise,net,client.idclient,payee,date_payement,type_d_payement,date_d_echeance,(net-payee) as rest, conditio, nom_client,adresse,nom_produit,unite,description,produit.tva,ligne_commande_cli.idcommande_cli AS numfact,qt,
        pu_d_V,pu_d_G,(qt*pu_d_V) + (((qt*pu_d_V) * tva)  / 100) AS montantD, (qt*pu_d_G) + (((qt*pu_d_G) * tva)  / 100) AS montantG, produit.tva, commande_cli.date_commande AS dates FROM ligne_commande_cli, produit, client, commande_cli
        ,payement_cli
        where commande_cli.idcommande_cli=payement_cli.idcommande_cli and ligne_commande_cli.idcommande_cli = commande_cli.idcommande_cli AND produit.idproduit=ligne_commande_cli.idproduit 
        AND client.idclient=commande_cli.idclient and commande_cli.idcommande_cli=".$id_commande_cli;
         
        }
       $facture = $this->db->query($sql);

       return $facture->result();
    }
       
      
    


    


    public function delete_commande_cli($idcommande_cli){
        $this->db->where('idcommande_cli',$idcommande_cli);
        $this->db->delete($this->table);
        return true;
    }

    public function delete($idcommande_cli){
        $this->db->where('idcommande_cli',$idcommande_cli);
        $this->db->delete($this->table);
        return true;
    }

    public function insertcommande($idclient,$date_commande,$idproduit,$qt)
    {
        for($i=0 ;$i < count($idproduit); $i++)
        {
            $sql="INSERT into ligne_commande_cli values (NULL, ?,?,?)";
            $sql2="INSERT into commande_cli values (NULL,NOW(),?)";

            $this->produit_model->stockage($idproduit[$i], $qt[$i]);
            $this->db->query($sql, array($idproduit[$i] , $qt[$i]));
            $this->db->query($sql2, array($idclient , $date_commande));
        }
        return true;
    }
    public function createcom($idclient,$date_commande)
    { $this->db->set([
        "idclient"=>$idclient,
        "date_commande"=>$date_commande
    ]);
    return $this->db->insert($this->table) ? true : false;
    
    
    }


    public function journal($date1, $date2){
        return $this->db->select("commande_cli.idcommande_cli,client.nom_client,client.adresse,commande_cli.date_commande,sum(qt*pu_d_V) as montant,sum(qt*pu_d_G) as montants ")
                            ->from("produit,client ,ligne_commande_cli,commande_cli ")
                            ->where("produit.idproduit =ligne_commande_cli.idproduit AND commande_cli.idclient=
                            client.idclient AND ligne_commande_cli.idcommande_cli=commande_cli.idcommande_cli")
                         
                            ->where("commande_cli.date_commande BETWEEN '".$date1."' AND '".$date2."'")
                            ->group_by("ligne_commande_cli.idcommande_cli")
    
                            ->get()
                            ->result();
      }




      public function statmonth()
    {
        return $this->db->select("count(idcommande_cli) as count , MONTH(date_commande) AS month")
                        ->group_by("month")
                        ->get($this->table)
                        ->result();
    }
    public function statdate()
    {
        return $this->db->query("SELECT COUNT(idcommande_fou) AS COUNT , DAYNAME(date_appro) AS dayname FROM commande_fou GROUP BY DAYNAME(date_appro)")
                        ->result();
    }


    public function afficjournal($date1, $date2)
    {
      $this->db->select  ("commande_cli.idcommande_cli as numfact,conditio,
    nom_client,adresse,description,
    nom_produit,qt, unite,date_commande, 
    payement_cli.payee ,payement_cli.type_d_payement,payement_cli.date_payement,
    payement_cli.date_d_echeance,payement_cli.net,payement_cli.remise");
    $this->db->distinct();
    $this->db->FROM("payement_cli, ligne_commande_cli, produit, client, commande_cli");
    $this->db->where("commande_cli.idcommande_cli=payement_cli.idcommande_cli and 
   ligne_commande_cli.idcommande_cli = commande_cli.idcommande_cli AND 
   produit.idproduit=ligne_commande_cli.idproduit
   AND client.idclient=commande_cli.idclient");
   $this->db->where("commande_cli.date_commande BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_cli.idcommande_cli");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }


    public function chiot($date1, $date2)
    {
      $this->db->select  ("commande_cli.idcommande_cli as numfact,conditio,
    nom_client,adresse,description,
    nom_produit,qt, unite,date_commande,pu_d_V, pu_d_G,
    payement_cli.payee ,payement_cli.type_d_payement,payement_cli.date_payement,
    payement_cli.date_d_echeance,payement_cli.net,payement_cli.remise");
    $this->db->distinct();
    $this->db->FROM("payement_cli, ligne_commande_cli, produit, client, commande_cli");
    $this->db->where("commande_cli.idcommande_cli=payement_cli.idcommande_cli and 
   ligne_commande_cli.idcommande_cli = commande_cli.idcommande_cli AND 
   produit.idproduit=ligne_commande_cli.idproduit
   AND client.idclient=commande_cli.idclient");
   $this->db->where("commande_cli.date_commande BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_cli.idcommande_cli");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }



    public function affi($date1, $date2)
    {
      $this->db->select  ("commande_cli.idcommande_cli as numfact,conditio,
    nom_client,adresse,description,
    nom_produit,qt, unite,date_commande,pu_d_V, pu_d_G
    ");
    $this->db->distinct();
    $this->db->FROM("payement_cli, ligne_commande_cli, produit, client, commande_cli");
    $this->db->where("commande_cli.idcommande_cli=payement_cli.idcommande_cli and 
   ligne_commande_cli.idcommande_cli = commande_cli.idcommande_cli AND 
   produit.idproduit=ligne_commande_cli.idproduit
   AND client.idclient=commande_cli.idclient");
   $this->db->where("commande_cli.date_commande BETWEEN '".$date1."' AND '".$date2."'");
//    $this->db->group_by("ligne_commande_cli.idcommande_cli");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();
    
    }


   
}