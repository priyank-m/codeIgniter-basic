<?php
class User extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->library('session');
    $this->load->model('Form_model');
	}

 
	public function sign_up()
	{
		if($this->input->post('save'))
		{
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$password=$this->input->post('pass');
		$phone=$this->input->post('phone');
		$que=$this->db->query("select * from user_login where email='$email'");
		$row = $que->num_rows();
		if($row > 0)
		{
		$data['error']="<h3 style='color:red'>Email id already exists</h3>";
		}
		else
		{
		$que=$this->db->query("insert into user_login values('','$name','$email','$password','$phone')");
		
		$data['error']="<h3 style='color:blue'>Your account created successfully</h3>";
		}			
				
		}
	    $this->load->view('student_registration',@$data);	
	}

    public function login()
    {
        if($this->input->post('login'))
        {
        $email=$this->input->post('email');
        $password=$this->input->post('pass');
        $que=$this->db->query("select * from user_login where email='$email' and password='$password'");
        $row = $que->num_rows();
        $result = (array) $que->row();
        if($row > 0)
        {
        $this->session->set_userdata($result);
        redirect('User/dashboard');
        }
        else
        {
        $data['error']="<h3 style='color:red'>Invalid userid or password !</h3>";
        }
        }
        $this->load->view('login',@$data);
        }
        function dashboard()
        {
            $result['data']=$this->Form_model->display_records();
            $this->load->view('dashboard',$result);
    }


    public function change_pass()
	{
		if($this->input->post('change_pass'))
		{
			$old_pass= $this->input->post('old_pass');
			$new_pass =$this->input->post('new_pass');
			$confirm_pass= $this->input->post('confirm_pass');
			$session_id= $this->session->userdata('id');
			$que=$this->db->query("select * from user_login where id='$session_id'");
			$row=$que->row();
            $pass = $row->password;
			if((!strcmp($old_pass, $pass)) && (!strcmp($new_pass, $confirm_pass))){
				$this->Form_model->change_pass($session_id,$new_pass);
				echo "Password changed successfully !";
				}
			    else{
					echo "Invalid";
				}
		}
		$this->load->view('change_password');	
	}
	
	
}
?>