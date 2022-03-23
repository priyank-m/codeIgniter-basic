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

    // Import Excel
    public function importdata()
	{ 
		$this->load->view('import_data');
		if(isset($_POST["submit"]))
		{
			$file = $_FILES['file']['tmp_name'];
			$handle = fopen($file, "r");
			$c = 0;
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				$fname = $filesop[0];
				$lname = $filesop[1];
				if($c<>0){					/* SKIP THE FIRST ROW */
					$this->Crud_model->saverecord($fname,$lname);
				}
				$c = $c + 1;
			}
			echo "sucessfully import data !";
				
		}
	}


	// Multiple checkbox insert
	public function multicheck()
	{ 
			$this->load->view('multicheck_insert');
			if(isset($_POST['save']))
			{
				$user_id=1;/* Pass the userid here */
				$checkbox = $_POST['check']; 
				for($i=0;$i<count($checkbox);$i++){
					$category_id = $checkbox[$i];
					$this->Crud_model->multisave($user_id,$category_id);/* Call the modal */
					
				}
				echo "Data added successfully!";
			}
	}
        
}
?>