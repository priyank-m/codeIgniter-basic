<?php 
class Crud extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
	
	/*load database libray manually*/
	// $this->load->database();
	
	/*load Model*/
	$this->load->model('Crud_model');
	}
        /*Insert*/
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('insert');
	
		/*Check submit button */
		if($this->input->post('save'))
		{
		    $data['first_name']=$this->input->post('first_name');
			$data['last_name']=$this->input->post('last_name');
			$data['email']=$this->input->post('email');
			$response=$this->Crud_model->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}

    /*Display*/
    public function displaydata()
    {
        $result['data']=$this->Crud_model->display_records();
        $this->load->view('display_records',$result);
    }

    /*Update*/
    public function updatedata()
    {
    $id=$this->input->get('id');
    $result['data']=$this->Crud_model->displayrecordsById($id);
    $this->load->view('update_records',$result);
    
        if($this->input->post('update'))
        {
        $first_name=$this->input->post('first_name');
        $last_name=$this->input->post('last_name');
        $email=$this->input->post('email');
        $this->Crud_model->update_records($first_name,$last_name,$email,$id);
        echo "Date updated successfully !";
        }
    }

    // Delete
    /*Delete Record*/
    public function deletedata()
    {
    $id=$this->input->get('id');
    $response=$this->Crud_model->deleterecords($id);
    if($response==true){
        $result['data']=$this->Crud_model->display_records();
        $this->load->view('display_records',$result);
        echo "Data deleted successfully !";
    }
    else{
        echo "Error !";
    }
    }
        
}
?>