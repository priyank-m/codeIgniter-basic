<?php
class Ajax_model extends CI_Model 
{
    // Register
	function saverecords($name,$email,$phone,$city)
	{
		$query="INSERT INTO `ajax_crud`( `name`, `email`, `phone`, `city`) 
		VALUES ('$name','$email','$phone','$city')";
		$this->db->query($query);
	}

    // View
    function display_records()
	{
		$query=$this->db->query("select * from ajax_crud");
		return $query->result();
	}

    // Update
    function updaterecords($id,$name,$email,$phone,$city)
	{
		$query="UPDATE `ajax_crud` 
		SET `name`='$name',
		`email`='$email',
		`phone`='$phone',
		`city`='$city' WHERE id=$id";
		$this->db->query($query);
	}

    // delete
    function deleterecords($id)
	{
		$query="DELETE FROM `ajax_crud` WHERE id=$id";
		$this->db->query($query);
	}
}