<?php
class Crud_model extends CI_Model 
{
	// insert
	function saverecords($data)
	{
        $this->db->insert('crud',$data);
        return true;
	}

    // Retrive
    function display_records()
    {
      $query=$this->db->get("crud");
      return $query->result();
    }

    // Retrive by id
    function displayrecordsById($id)
	{
	$query=$this->db->query("select * from crud where id='".$id."'");
	return $query->result();
	}

    /*Update*/
	function update_records($first_name,$last_name,$email,$id)
	{
	$query=$this->db->query("update crud SET first_name='$first_name',last_name='$last_name',email='$email' where id='$id'");
	}

    // Delete
    function deleterecords($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("crud");
        return true;
    }

    // Multiple checkbox insert
    function multisave($user_id,$category)
	{
		$query="insert into user_cat values($user_id,$category)";
		$this->db->query($query);
	}
	
}