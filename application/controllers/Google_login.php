<!-- For Refrance

https://www.webslesson.info/2020/03/google-login-integration-in-codeigniter.html 

Google Account - priyank.m@upsquare.in
-->



<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_login extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('google_login_model');
 }

 function login()
 {
  include_once APPPATH . "vendor/autoload.php";

  $google_client = new Google_Client();

  $google_client->setClientId('33768762312-kte18l7fjk4leq270mbnhg2ssrtf2i31.apps.googleusercontent.com'); //Define your ClientID

  $google_client->setClientSecret('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'); //Define your Client Secret Key

  $google_client->setRedirectUri('http://127.0.0.1/codeIgniter-basic/Google_login/login'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  if(isset($_GET["code"]))
  {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

   if(!isset($token["error"]))
   {
    $google_client->setAccessToken($token['access_token']);

    $this->session->set_userdata('access_token', $token['access_token']);

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');

    if($this->google_login_model->Is_already_register($data['id']))
    {
     //update data
     $user_data = array(
      'first_name' => $data['given_name'],
      'last_name'  => $data['family_name'],
      'email' => $data['email'],
      'picture'=> $data['picture'],
      'gender'=> $data['gender'],
      'modified' => $current_datetime
     );

     $this->google_login_model->Update_user_data($user_data, $data['id']);
    }
    else
    {
     //insert data
     $user_data = array(
      'oauth_uid' => $data['id'],
      'first_name'  => $data['given_name'],
      'last_name'   => $data['family_name'],
      'email'  => $data['email'],
      'picture' => $data['picture'],
      'gender'=> $data['gender'],
      'created'  => $current_datetime
     );

     $this->google_login_model->Insert_user_data($user_data);
    }
    $this->session->set_userdata('user_data', $user_data);
   }
  }
  $login_button = '';
  if(!$this->session->userdata('access_token'))
  {
   $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="https://onymos.com/wp-content/uploads/2020/10/google-signin-button-1024x260.png" /></a>';
   $data['login_button'] = $login_button;
   $this->load->view('google_login', $data);
  }
  else
  {
   $this->load->view('google_login', $data);
  }
 }

 function logout()
 {
  $this->session->unset_userdata('access_token');

  $this->session->unset_userdata('user_data');

  redirect('google_login/login');
 }
 
}
?>