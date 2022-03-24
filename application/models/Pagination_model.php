<?php
class Pagination_model extends CI_Model 
{

    public function get_count() 
	{
        return $this->db->count_all("import_user");
    }

    public function get_students($limit, $start) 
	{
        $this->db->limit($limit, $start);
        $query = $this->db->get("import_user");
        return $query->result();
    }
}
?>