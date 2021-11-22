<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pe_model extends CI_Model{
    private $table = "pe";

    public function all(){
        $this->db->select("
        pe.idpe,fournisseur.nom_fournisseur,produit.intrants,produit.nom_produit,pe.pu_d_A,pe.qt,pe.tva,pe.dateappro,fac_fou.id_fac_fou
        ");
        $this->db->from(' pe,fournisseur,produit,fac_fou');
        $this->db->where("fournisseur.idfournisseur = pe.idfournisseur  and fac_fou.id_fac_fou=pe.id_fac_fou and produit.idproduit=pe.idproduit
        ");
        $query = $this->db->get();  
        if($query->row_array() < 1){
           return false;
       }
       return $query->result_array();
        
    }
   
    public function get_idpe($idpe){
        $this->db->where('idpe', $idpe);
        $query->this->db->get('pe');
        if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }
    public function get_idfournisseur($idfournisseur){
        $this->db->where('idfournisseur', $idfournisseur);
        $query->this->db->get('fournisseur');
        if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }
    public function get_id_fac_fou($id_fac_fou){
        $this->db->where('id_fac_fou', $id_fac_fou);
        $query->this->db->get('fac_fou');
        if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }

    function insert_pe($formArray){
        $data  = [
        'idfournisseur'      => $formArray["idfournisseur"],   
        'intrants'    => $formArray["intrants"],
        'nom_produit'    => $formArray["nom_produit"],		
        'pu_d_A'    => $formArray["pu_d_A"],
        'qt'    => $formArray["qt"],
        'tva'    => $formArray["tva"],		
        'dateappro'    => $formArray["dateappro"],
        'id_fac_fou'    => $formArray["id_fac_fou"]
        ];
        var_dump($data);
        
       
   return $this->db->insert($this->table, $formArray) ? true : false; //INSERT INTO
    }    


    public function edit_pe($idpe,$formArray){
        $data     = [
            'idfournisseur'      => $formArray["idfournisseur"],   
            'idproduit'    => $formArray["idproduit"],
            'idproduit'    => $formArray["idproduit"],
            'id_fac_fou'    => $formArray["id_fac_fou"],		
            'pu_d_A'    => $formArray["pu_d_A"],
            'qt'    => $formArray["qt"],
            'tva'    => $formArray["tva"],		
            'dateappro'    => $formArray["dateappro"]
            ];
        
        $this->db->update($this->table, $data); 
        $this->db->set($data);
        $this->db->where('idpe', $idpe);
        return true;
         
    }

    public function delete_pe($idpe){
        $this->db->where('idpe',$idpe);
        $this->db->delete($this->table);
        return true;
    }

}
   




?>