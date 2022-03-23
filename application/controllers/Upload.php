<?php
class Upload extends CI_Controller {
	
      public function __construct() { 
         parent::__construct(); 
         $this->load->library('form_validation');
         $this->load->helper('url', 'form');
      }
		
      public function index() { 
         $this->load->view('upload_form'); 
      }  
		
    public function do_upload() { 
         $config["upload_path"] = 'uploads';
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 2000; 
         $config['max_width']     = 1500; 
         $config['max_height']    = 1500;  

         $this->load->library('upload', $config);
         $this->upload->initialize($config);

			
         if ( ! $this->upload->do_upload('profile_pic')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
         }
			
         else { 
            $data = array('upload_metadata' => $this->upload->data());
 
            $this->load->view('upload_success', $data);
         } 
    } 
   } 
?>