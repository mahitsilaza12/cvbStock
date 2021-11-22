<?php

Class num_fac_cli_model extends CI_model{
    private $table="fac_cli";

    public function all(){
        $this->db->order_by('fac_cli.id_fac_cli', 'ASC');
       $this->db->select("
        fac_cli.id_fac_cli,client.nom_client,produit.intrants,produit.nom_produit,ps.qt,ps.date_p"
    );
        $this->db->from('fac_cli,client,produit,ps');
        $this->db->where(' client.idclient=ps.idclient and produit.idproduit=ps.idproduit and ps.id_fac_cli=fac_cli.id_fac_cli');
       
      $query = $this->db->get();  
         if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }
    public function get_client($idclient){
        $this->db->where('idclient',$idclient);
        $query = $this->db->get('client');
        return $query->row_array()->client;
    }

    public function get_produit($idproduit){
        $this->db->where('idproduit',$idproduit);
        $query = $this->db->get('produit');
        return $query->row_array()->produit;
    }
    public function get_ps($idps){
        $this->db->where('idps',$idps);
        $query = $this->db->get('ps');
        return $query->row_array()->ps;
    }
    public function get_fac_cli($id_fac_cli){
        $this->db->where('id_fac_cli',$id_fac_cli);
        $query = $this->db->get($this->table);
        return $query->row();
    }


    function insert_fac_cli($formArray){
        $data  = [
        'idclient'      => $formArray["idclient"],   
        'idproduit'    => $formArray["idproduit"],
        'idproduit'    => $formArray["idproduit"],
        'qt'            => $formArray["qt"],
        'num_fac_cli'   => $formArray["num_fac_cli"],		
        'idps'        => $formArray["idps"],
        ];
        return $this->db->insert($this->table, $formArray) ? true : false; //INSERT INTO
    }    


    public function edit_fac_cli($id_fac_cli,$formArray){
        $data     = [
        'idclient'      => $formArray["idclient"],   
        'idproduit'    => $formArray["idproduit"],
        'idproduit'    => $formArray["idproduit"],
        'qt'            => $formArray["qt"],
        'num_fac_cli'   => $formArray["num_fac_cli"],		
        'idps'        => $formArray["idps"],
            ];
        $this->db->update($this->table, $data); 
        $this->db->set($data);
        $this->db->where('id_fac_cli', $idp_fac_cli);
        return true;
         
    }
    
    public function delete_fac_cli($id_fac_cli){
        $this->db->where('id_fac_cli',$id_fac_cli);
        $this->db->delete($this->table);
        return true;
    }
}


?>