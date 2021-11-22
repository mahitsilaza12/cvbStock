<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class image extends CI_Controller {
     
    public function  __construct(){
        parent ::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('image_model');
    }
    
	public function index()
	{ 
        $this->load->view('img');
          192
     }
    public function insert(){

        $config['upload_path']='./issets';
		$config['allowed_types']='png|jpg|jpeg';
		$config['max_size']=100;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('photo'))
			{
				echo "error";
			}

			else{
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
				$this->image_model->insert ($fn);
            }

    }







  
}