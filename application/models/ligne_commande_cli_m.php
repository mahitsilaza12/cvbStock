<?php

Class ligne_commande_cli_m extends CI_model{
    private $table = "ligne_commande_cli";

    public function __construct(){
        parent::__construct();
        $this->load->model('commande_cli_m');
    }
public function ligneqte(){
    $this->db->where("qt");
$query-= $this->db->get($this->table);
    return $query->row_array();
}

public function lignecomcli($idproduit,$qt,$conditio){
    $this->load->model("produit_model");
    $this->db->set([
        "idcommande_cli"=>$this->commande_cli_m->getlast(),
        "idproduit"=>$idproduit,
        "qt"=>(float) $qt,
        "conditio"=>$conditio
    ]);
    return $this->db->insert($this->table) && $this->produit_model->stockage($qt,"-",$idproduit,$conditio)? true : false;
}

public function delete($idcommande_cli , $idproduit){

    $this->db->where('idproduit',$idproduit);
    $this->db->where('idcommande_cli',$idcommande_cli);
      $result =  $this->db->get($this->table);
    $res = $result->result();

    $qt = $res[0]->qt;
    $condition = $res[0]->conditio;
    $sql = "update produit set stock = stock + ".$qt." where idproduit = ".$idproduit;
    if($condition == "gros")
    {
        $sql = "update produit set stock = stock + (".$qt." * parpresentation) where idproduit = ".$idproduit;
    }
    $this->db->query($sql);
    $this->db->where('idproduit',$idproduit);
    $this->db->where('idcommande_cli',$idcommande_cli);
    $this->db->delete($this->table) ? true : false;


}

public function ligneFromCode($idcommande)
{
    return $this->db->select('commande_cli.idcommande_cli,nom_client,nom_produit,qt,conditio,produit.pu_d_V,pu_d_G,tva,date_commande , ligne_commande_cli.idproduit as idproduit')
                ->where("ligne_commande_cli.idcommande_cli" , $idcommande)
                ->where("client.idclient=commande_cli.idclient And produit.idproduit=ligne_commande_cli.idproduit And commande_cli.idcommande_cli=ligne_commande_cli.idcommande_cli")
                ->get($this->table.',client,commande_cli,produit')
                ->result();
    }


}

?>