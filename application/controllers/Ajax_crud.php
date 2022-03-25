<?php
class Ajax_crud extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ajax_model');
	}

    // Register
	public function register()
	{
		$this->load->view('Ajax/register');
	}
    public function savedata()
	{   
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $city=$this->input->post('city');
        $type=$this->input->post('type');
 
		if($type==1)
		{   
      		$this->Ajax_model->saverecords($name,$email,$phone,$city);	
			echo json_encode(array(
				"statusCode"=>200
			));
		}if($type==3){
            $id=$this->input->post('id');
            $this->Ajax_model->updaterecords($id,$name,$email,$phone,$city);
			echo json_encode(array(
				"statusCode"=>200
			));
        } 
	}

    // View Data
    public function view()
	{
		$this->load->view('Ajax/view');
	}
    public function viewajax()
	{
				$data=$this->Ajax_model->display_records();
				$i=1;
				foreach($data as $row)
				{
					  echo "<tr>";
					  echo "<td>".$i."</td>";
					  echo "<td>".$row->name."</td>";
					  echo "<td>".$row->email."</td>";
					  echo "<td>".$row->phone."</td>";
					  echo "<td>".$row->city."</td>";
					  echo "<td><button type='button' class='btn btn-success btn-sm update' data-toggle='modal' data-keyboard='false' data-backdrop='static' data-target='#update_country'
                      data-id='".$row->id."'
                      data-name='".$row->name."'
                      data-email='".$row->email."'
                      data-phone='".$row->phone."'
                      data-city='".$row->city."'
                      >Edit</button>
                      <button type='button' class='btn btn-danger btn-sm delete' data-id='".$row->id."'>Delete</button></td>";
					  echo "</tr>";
					  $i++;
				}
	}

    // delete
    function deleterecords()
	{
		if($this->input->post('type')==2)
		{
			$id=$this->input->post('id');
			$this->Ajax_model->deleterecords($id);	
			echo json_encode(array(
				"statusCode"=>200
			));
		} 
	}
}