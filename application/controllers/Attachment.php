<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attachment extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('AttachmentModel'); 
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
	
    }
    public function CreateAttachment(){
		$page_data['page_title'] = 'Create Attachment';
		$page_data['page_name'] = "attachment/create_attachment";
		$this->load->view('create_attachment', $page_data);
	}
    public function ManageAttachment(){
            alert();
            exit;
            extract($this->input->post());
            $data['Title']=$Title;
            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->ManageAttachment('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                    $filedata =  $this->upload->data();
                    
            }
            $data['Logo']=$filedata['file_name'];
            $data['Path']=$filedata['file_path'];
            $response=$this->attachmentmodel->ManageAttachment($data,1);
            if($response){
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response)); 
            }
                    
    }
}