<?php 
   class Cookie_controller extends CI_Controller { 
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper(array('cookie', 'url')); 
      } 
  
      public function index() { 
         set_cookie('Test','fnsdfjdld','3600'); 
         $this->load->view('Cookie_view'); 
      } 
  
      public function display_cookie() { 
         echo get_cookie('Test'); 
         $this->load->view('Cookie_view');
      } 
  
      public function deletecookie() { 
         delete_cookie('Test'); 
         redirect('cookie/display'); 
      } 
		
   } 
?>