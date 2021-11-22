<?php

Class image_model extends CI_model{
    
    function ins($x){
        $famille=$this ->input->post('famille');
        $nom_produit=$this ->input->post('nom_produit');
        $nom_fournisseur=$this ->input->post('nom_fournisseur');
        $design=$this ->input->post('design');
        $unite=$this ->input->post('unite');
        $pu_d_V=$this ->input->post('pu_d_V');
        $pu_d_A=$this ->input->post('pu_d_A');
        $qtstock=$this ->input->post('qtstock');
        $w=array(
            'famille'=>$famille,
            'nom_produit'=>$nom_produit,
            'nom_fournisseur'=>$nom_fournisseur,
            'design'=>$design,
            'unite'=>$unite,
            'pu_d_V'=>$pu_d_V,
            'pu_d_A'=>$pu_d_A,
            'qtstock'=>$qtstock,
            'photo'=>$x
        );
        $this->db->insert('produit',$w);
    }

}