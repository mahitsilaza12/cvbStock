<?php

Class produit_model extends CI_model{
    private $table ='produit';
    public function __construct(){
        parent ::__construct();
        $this->load->model('produit_model');
    }

    public function all(){
        $this->db->select(' 
        idproduit,
        produit.intrants,
        produit.nom_produit,
        produit.pu_d_V,
        produit.pu_d_G,
        produit.pu_d_A,
        produit.stock,
        produit.unite,
        produit.tva,
        produit.description,
        produit.presentation,
        produit.parpresentation,
        produit.par2presentation,
        produit.datePEr
        ');
        $this->db->from($this->table);


        $query = $this->db->get();  
         if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }

    public function recherch($recherch)
    {   
        $this->db->select();
        $this->db->like('intrants',$recherch);
        $this->db->or_like('nom_produit',$recherch);
        $this->db->or_like('pu_d_V',$recherch);
        $this->db->or_like('pu_d_G',$recherch);
        $this->db->or_like('pu_d_A',$recherch);
        $this->db->or_like('unite',$recherch);
        $this->db->or_like('tva',$recherch);
        $this->db->or_like('stock',$recherch);
        $this->db->or_like('description',$recherch);
        $this->db->or_like('presentation',$recherch);
        $this->db->from($this->table);
        $query = $this->db->get();  
         if($query->row_array() < 1){
            return false;
        }
        return $query->result_array();
    }

    public function get_produits($nom_produit){
        return $this->db->where('nom_produit',$nom_produit)
        ->get($this->table)
         ->result_array()[0];
    }
    
    public function get_produitnom(){
        $this->db->order_by('nom_produit');
        $query=$this->db->get($this->table);
        return $query->result_array();
    
    }

    public function parpre(){
        $this->db->where('parpresentation',$parpresentation);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_tva(){
        $this->db->where('tva');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_produit($idproduit){
        $this->db->where('idproduit',$idproduit);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function insert_prod($formArray){
        $data  = [
        'intrants'      => $formArray["intrants"],   
        'nom_produit'    => $formArray["nom_produit"],
        'pu_d_V'    => $formArray["pu_d_V"],
        'pu_d_G'    => $formArray["pu_d_G"],
        'pu_d_A'    => $formArray["pu_d_A"],
        'unite'    => $formArray["unite"],
        'tva'    => $formArray["tva"],		
        'description'    => $formArray["description"],
        'presentation'    => $formArray["presentation"],
        'parpresentation'    => $formArray["parpresentation"],		
        'par2presentation'    => $formArray["par2presentation"],
        'datePEr'    => $formArray["datePEr"],
        ];
        return $this->db->insert($this->table, $formArray) ? true : false; //INSERT INTO
    }    

    public function edit_pro($idproduit,$formArray){
        $data     = [
            'intrants'      => $formArray["intrants"],   
            'nom_produit'    => $formArray["nom_produit"],
            'pu_d_V'    => $formArray["pu_d_V"],
            'pu_d_G'    => $formArray["pu_d_G"],
            'pu_d_A'    => $formArray["pu_d_A"],
            'unite'    => $formArray["unite"],	
            'tva'    => $formArray["tva"],		
            'description'    => $formArray["description"],
            'presentation'    => $formArray["presentation"],
            'parpresentation'    => $formArray["parpresentation"],		
            'datePEr'    => $formArray["datePEr"],	
            ];
        $this->db->set($data);
        $this->db->where('idproduit', $idproduit);
        $this->db->update($this->table, $formArray); 
       
        return true;
         
    }


   

    public function stockage($qt, $operation, $idproduit,$conditio){
        $sql ="UPDATE produit set stock=stock ".$operation." ? where idproduit=?";
       if($conditio=='gros')
       {
        $qt *= $this->get_produit($idproduit)[0]['parpresentation'];
       }
        return $this->db->query($sql, array($qt, $idproduit)) ?true :false;
        
    }



    public function delete_prod($idproduit){
        $this->db->where('idproduit',$idproduit);
        $this->db->delete($this->table);
        return true;
    }

    public function affichpro()
    
    {
        if(!isset($idproduit))
        
        {
         $sql =" SELECT idproduit,intrants,nom_produit,stock,presentation,parpresentation,par2presentation,pu_d_V,pu_d_G
         ,pu_d_A,unite,tva,description,datePEr
         FROM produit
         where produit.idproduit";
         
      

        
     }
     else{
        $sql =" SELECT idproduit,intrants,nom_produit,stock,presentation,parpresentation,par2presentation,pu_d_V,pu_d_G
        ,pu_d_A,unite,tva,description,datePEr
        FROM produit
        where produit.idproduit=".$idproduit;
       
      }
     $produits = $this->db->query($sql);

     return $produits->result_Array();
  }

  public function getlastpro(){
    return $this->db->select("idproduit")
             ->order_by("idproduit", "DESC")
             ->get($this->table)
             ->result_array()[0]["idproduit"];
}

public function getexcel(){
    $this->db->order_by("idproduit","DESC");
    $query=$this->db->get("produit");
    return $query->result();
}

public function notifier()
    {
    $sql = "SELECT * FROM produit WHERE DATEDIFF(datePEr , NOW()) < 0 AND 1";

        return $this->db->query($sql)
                        ->result();// ? true : false;
    }


}

?>