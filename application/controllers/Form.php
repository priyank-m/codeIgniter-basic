<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Form extends CI_Controller {  
  
    public function index()  
    {  
        $this->load->view('include/header');  
        $this->load->view('include/nav');  
        $this->load->view('include/content');  
        $this->load->view('include/footer');  
    }  
}     
?>  