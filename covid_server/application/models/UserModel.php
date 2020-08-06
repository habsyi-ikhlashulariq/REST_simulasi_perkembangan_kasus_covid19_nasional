<?php 

class UserModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('tbl_user.*, tbl_provinsi.nm_provinsi');
        $this->db->join('tbl_provinsi', 'tbl_user.kd_provinsi = tbl_provinsi.kd_provinsi');

        return $this->db->get('tbl_user')->result_array();
    }
    public function getAllDataProvinsi()
    {
        return $this->db->get('tbl_provinsi')->result_array();
    }
    public function getDatabyId($id)
    {
        return $this->db->get_where('tbl_user', ['kd_user'=> $id])->row_array();
    }
    public function addData()
    {
        $data = [
            "username" => $this->input->post('username'),
            "password" => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            "avatar" => $this->input->post('avatar'),
            "kd_provinsi" => $this->input->post('provinsi'),
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
        $this->db->like('username', $keyword);
        $this->db->or_like('nm_provinsi', $keyword);

        $this->db->select('tbl_user.*, tbl_provinsi.nm_provinsi');
        $this->db->join('tbl_provinsi', 'tbl_provinsi.kd_provinsi = tbl_user.kd_provinsi');
        return $this->db->get('tbl_user')->result_array();
    }
    
}




?>
