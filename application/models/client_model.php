<?php

Class client_model extends CI_model{
    private $table = "client";

    public function __construct(){
        parent::__construct();
        $this->load->model('client_model');
    }
    function insert_cli($formArray){
        $this->db->insert($this->table, $formArray); //INSERT INTO
    }
    public function get_clients(){
        $this->db->order_by("nom_client");
        $query=$this->db->get("client");
        return $query->result();
    }

public function recherh($recherch)
{

    $this->db->select();
    $this->db->like('nom_client',$recherch , "both");
    $this->db->or_like('adresse',$recherch , "both");
    $this->db->or_like('contact',$recherch , "both");
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result_array();
}

  public function get_client($nom_client){
      $this->db->where('nom_client',$nom_client);
      $query=$this->db->get($this->table);
      return $query->result_array();
      $cc=$query;

  }
  public function get_adresse($adresse){
    $this->db->where('nom_client',$adresse);
    $query=$this->db->get($this->table);
    return $query->result_array();
    $fc=$query;

}
  public function getCAPerDate($codeClient , $date1 , $date2)
  {if($date1<=$date2)
    {
        $sql = "select idpay_cli from payement_cli,client,commande_cli,ligne_commande_cli where
        commande_cli.idcommande_cli = payement_cli.idcommande_cli 
        and payee BETWEEN '".$date2."' and '".$date1."' and commande_cli.idclient = ".$codeClient;
    }
    else if($date1>$date2)
    {
        $sql = "select idpay_cli from payement_cli,client,commande_cli,ligne_commande_cli where
        commande_cli.idcommande_cli = payement_cli.idcommande_cli 
        and payee BETWEEN '".$date2."' and '".$date1."' and commande_cli.idclient = ".$codeClient;
  
    }
    $query= $this->db->query($sql);
    return $query->result();

  }


  
  function all(){
       return $this->db->get($this->table)->result_array(); //SELECT *FROM
   }
   public function getexcel(){
       $this->db->order_by("idclient","DESC");
       $query=$this->db->get("client");
       return $query->result();
   }

  function get($idclient){
      $this->db->where('idclient',$idclient);
      return $this->db->get($this->table)->row_array();

  }

  public function get_nomcli(){
    $this->db->order_by('nom_client');
    $query=$this->db->get($this->table);
    return $query->result_array();

}
 
  public function chiffreAffaire($codeclient, $date1, $date2)
  {
    $this->db->select  ("commande_cli.idcommande_cli as numfact,conditio,
    nom_client,adresse,description,pu_d_G,pu_d_V,pu_d_G,(qt*pu_d_V) + (((qt*pu_d_V) * tva)  / 100) AS montantD,
    nom_produit,qt, unite,date_commande, (qt*pu_d_G) + (((qt*pu_d_G) * tva)  / 100) AS montantG,
    payement_cli.payee ,payement_cli.type_d_payement,payement_cli.date_payement,
    payement_cli.date_d_echeance,payement_cli.net");
    $this->db->distinct();
    $this->db->FROM("payement_cli, ligne_commande_cli, produit, client, commande_cli");
    $this->db->where("commande_cli.idcommande_cli=payement_cli.idcommande_cli and 
    commande_cli.idcommande_cli = ligne_commande_cli.idcommande_cli AND 
   produit.idproduit=ligne_commande_cli.idproduit
   AND client.idclient=commande_cli.idclient");
   $this->db->where("payement_cli.idpay_cli".$codeclient);
   $this->db->where("payement_cli.date_payement BETWEEN '".$date1."' AND '".$date2."'");
//   $this->db->group_by("payement_cli.payee");
    $query = $this->db->get();  
    if($query->row_array() < 1){
       return false;
   }
   return $query->result_array();

  }


  //$ca=$this->db->query(select client.nom_client, sum(qt*pu) AS chifre from produit,client, ligne_commande_cli,commande_cli
  //where produit.idproduit=lignecomcli.idproduit And commande_cli.idclient = client.idclient And lignecommcli.numcli=
  //commandecli group by nomcli";
  //$row = $ca->result

//   public chiffreAffaireChart(){
//       $data = array();
//       $idclient='';
//       $nom_client='';
//       $chiffre='';
//       $backcolor ='';
//       $result=$this->chiffreAffaire();
//       foreach($result as $key{
//           $ipclient=(int)$key->idclient;
//           $chiffreAffaire =(int)$key
//       })
//   }


  function updatecli($idclient,$formArray){
      $this->db->where('idclient', $idclient);
      $this->db->update($this->table, $formArray);
  }

  function deletecli($idclient){
      $this->db->where('idclient', $idclient);
      $this->db->delete($this->table); //delete from client;

}
public function get_clinom(){
    $this->db->order_by('nom_client');
    $query=$this->db->get($this->table);
    return $query->result_array();

}

}


?>