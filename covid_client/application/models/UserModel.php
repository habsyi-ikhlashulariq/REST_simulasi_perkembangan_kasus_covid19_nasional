<?php 

class UserModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('tbl_user')->result_array();
    }
    public function getDatabyId($id)
    {
        return $this->db->get_where('tbl_user', ['kd_user'=> $id])->row_array();
    }
    public function addData()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "avatar" => $this->input->post('avatar'),
        ];
        $this->db->insert('tbl_user', $data);
    }
    public function deleteData($id)
    {
        $this->db->where('kd_user', $id);
        $this->db->delete('tbl_user');
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('email', $keyword);
  
        $query = $this->db->get('tbl_user')->result_array();
        return $query;
    }
    
}




?>
