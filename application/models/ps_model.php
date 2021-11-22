
<?php

Class ps_model extends CI_model{
    private $table = "ps";
    
    public function all(){
        
        $this->db->select("
        ps.idps,client.nom_client,produit.intrants,produit.nom_produit,produit.pu_d_V,ps.qt,produit.unite,produit.description,produit.presentation,produit.parpresentation,produit.par2presentation,fac_cli.id_fac_cli,ps.date_p");
        $this->db->from('ps,client,produit,fac_cli');
        $this->db->where(' produit.idproduit=ps.idproduit and fac_cli.id_fac_cli=ps.id_fac_cli');
          
      $query = $this->db->get();  
         if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }

    public function delete_ps($idps){
        $this->db->where('idps',$idps);
        $this->db->delete($this->table);
        return true;
    }

}