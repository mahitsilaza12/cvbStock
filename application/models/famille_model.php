<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class famille_model extends CI_Model{

	private $table = "famille";

	function insert_fam($formArray){
        $this->db->insert($this->table, $formArray); //INSERT INTO
    }

	function all(){
		return $this->db->get($this->table)->result_array(); //SELECT *FROM
	}
 
	function get($idfamille){
		$this->db->where('idfamille',$idfamille);
		return $this->db->get($this->table)->row_array();
  
	}

	
	function updatefam($idfamille,$formArray){
		$this->db->where('idfamille', $idfamille);
		$this->db->update($this->table, $formArray);
	}


	function deletefam($idfamille){
		$this->db->where('idfamille', $idfamille);
		$this->db->delete($this->table); //delete from client;
  
  }
}