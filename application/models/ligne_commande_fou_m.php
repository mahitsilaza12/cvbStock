<?php

Class ligne_commande_fou_m extends CI_model{
    private $table = "ligne_commande_fou";

    public function __construct(){
        parent::__construct();
        $this->load->model('commande_fou_m');
    }
public function ligneqte(){
    $this->db->where("qt");
$query-= $this->db->get($this->table);
    return $query->row_array();
}

public function lignecomfou($idproduit,$qt,$conditio){
    $this->load->model("produit_model");
    $this->db->set([
        "idcommande_fou"=>$this->commande_fou_m->getlast(),
        "idproduit"=>$idproduit,
        "qt"=>$qt,
        "conditio"=>$conditio
      
     
    ]);

    return $this->db->insert($this->table) && $this->produit_model->stockage($qt,"+",$idproduit,$conditio)? true : false;
}

public function ligneFromCode($idcommande)
{
    return $this->db->select('commande_fou.idcommande_fou,conditio,nom_fournisseur,produit.idproduit,nom_produit,produit.pu_d_A,qt,date_appro')
                ->where("ligne_commande_fou.idcommande_fou" , $idcommande)
                ->where("fournisseur.idfournisseur=commande_fou.idfournisseur And produit.idproduit=ligne_commande_fou.idproduit And commande_fou.idcommande_fou=ligne_commande_fou.idcommande_fou")
                ->get($this->table.',fournisseur,commande_fou,produit')
                ->result();
    }

    public function delete($idcommande_fou , $idproduit){

        $this->db->where('idproduit',$idproduit);
        $this->db->where('idcommande_fou',$idcommande_fou);
          $result =  $this->db->get($this->table);
        $res = $result->result();
    
        $qt = $res[0]->qt;
        $condition = $res[0]->conditio;
        $sql = "update produit set stock = stock - ".$qt." where idproduit = ".$idproduit;
        if($condition == "gros")
        {
            $sql = "update produit set stock = stock - (".$qt." * parpresentation) where idproduit = ".$idproduit;
        }
        $this->db->query($sql);
        $this->db->where('idproduit',$idproduit);
        $this->db->where('idcommande_fou',$idcommande_fou);
        $this->db->delete($this->table) ? true : false;
    
    
    }
    


}

?>