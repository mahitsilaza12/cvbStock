<?php

Class fac_fou_model extends CI_model{
    private $table="fac_fou";

    public function all(){

        $this->db->select("
        fac_fou.id_fac_fou,fournisseur.nom_fournisseur,produit.intrants,produit.nom_produit,pe.qt,pe.dateappro
        ");
       // $this->db->order_by('fac_fou.id_fac_fou', 'DESC');
        $this->db->from('fac_fou,fournisseur,produit,pe');
        $this->db->where('fournisseur.idfournisseur = pe.idfournisseur and produit.idproduit=pe.idproduit and pe.id_fac_fou=fac_fou.id_fac_fou');
   
       
      $query = $this->db->get();  
         if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }

    public function delete_fac_fou($id_fac_fou){
        $this->db->where('id_fac_fou',$id_fac_fou);
        $this->db->delete($this->table);
        return true;
    }
}