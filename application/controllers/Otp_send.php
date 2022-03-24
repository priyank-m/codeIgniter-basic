<!-- 
For API

Here is trail SMS login credentials:
URL: http://web.springedge.com/members/login
Username: springedgedemo
Password: 9ot3HDsp#2 -->



<?php  
class Otp_send extends CI_Controller 
{
	public function __construct()
	{
	/*call CodeIgniter's default Constructor*/
	parent::__construct();
    }

    public function otp_message()
	{
		$this->load->view('otp_view');

		if($this->input->post('save'))
		{
			$mobileno = $this->input->post('phone');
			$rndno=rand(1000, 9999);
			$message = "Hello ".$rndno." this is a test message from spring edge";
			$sender = 'SEDEMO'; 
			$apikey = '6ojfpx3g160a1vv2279dtl3m42x9qekd';
			$baseurl = 'https://instantalerts.co/api/web/send?apikey='.$apikey;

			//$url = "https://instantalerts.co/api/web/send?apikey=6ojfpx3g160a1vv2279dtl3m42x9qekd&sender=SEDEMO&to=919067232894&message=Hello%2C+this+is+a+test+message+from+spring+edge";   
			$url = $baseurl.'&sender='.$sender.'&to='.$mobileno.'&message='.$message;  
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_POST, false);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);

			// Use file get contents when CURL is not installed on server.
			if(!$response){
				$response = file_get_contents($url);
			}else{
				echo "message send";
			}
		}
	}

	
}
?>