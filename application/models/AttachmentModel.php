<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AttachmentModel extends CI_Model {

	public function __construct()
    {
		parent::__construct();
		$this->load->database();
        
	}
	public function ManageAttachment($data,$type,$id=""){
		if($type==1){
			$this->db->insert('attachmentmst',$data);
			return $this->db->insert_id();
		}
    }
}