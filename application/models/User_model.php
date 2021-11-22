<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    protected $table = "user";

    // public function liste()
    // {
    //     return $this->db->get($this->table)
    //                     ->result();
    // }
    // public function delete($iduser)
    // {
    //     return $this->db->where("iduser" , $iduser)
    //                     ->delete($this->table) ? true : false;
    // }
    function all(){
        return $this->db->get($this->table)->result_array(); //SELECT *FROM
    }


    public function add($pseudo , $mdp, $type)
    {
        $this->db->set([
            "pseudo" => $pseudo,
            "mdp" => $mdp,
            "type" => $type
        ]);
        return $this->db->insert($this->table) ? true : false;
    }
    public function delete($id)
    {
        return $this->db->where("id" , $id)
                        ->delete($this->table) ? true : false;
    }
    public function update($id , $data)
    {
        $this->db->set([
            "pseudo" => $data["pseudo"],
            "mdp" => $data["mdp"]
            // "type" => $data["type"]
        ]);

        return $this->db->where("id",$id)
                        ->update($this->table) ? true : false;
    }

    public function get($id)
    {
        $this->db->where('id', $id);
       return $this->db->get($this->table)->row_array();
    }


}

   