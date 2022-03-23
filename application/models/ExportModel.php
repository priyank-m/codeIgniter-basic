<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ExportModel extends CI_Model 
{
    function getUserDetails(){
        
        $response = array();
           
        // Select record
        $this->db->select('*');
        $q = $this->db->get('import_user');
        $response = $q->result_array();
        
        return $response;
    }

}