<?php 

class ProfileModel extends CI_Model
{
    public function getProfile($id)
    {
        return $this->db->get_where('kd_user', ['kd_user=>$id']);
    }
}



?>