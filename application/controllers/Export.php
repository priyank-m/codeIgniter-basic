<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ExportModel');
	}
	
	public function index()
	{
		$data = array();
		$data['usersData'] = $this->ExportModel->getUserDetails();
		$this->load->view('export_data',$data);
	}

	// Export data in CSV format
	public function exportCSV()
	{
		
		//csv file name
		$filename = 'users_'.date('Ymd').'.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; "); 

		// get data
		$usersData = $this->ExportModel->getUserDetails();

		// file creation
		$file = fopen('php://output', 'w');

		$header = array("srno","Name","Phone","Email");
		fputcsv($file, $header);

		foreach ($usersData as $key=>$line){
		 fputcsv($file,$line);
		}

		fclose($file);
		exit;
	}
}