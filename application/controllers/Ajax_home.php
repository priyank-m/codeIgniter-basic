<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_home extends CI_Controller {

    public function index() {

        $this->load->view('Ajax/view.php');
    }

}