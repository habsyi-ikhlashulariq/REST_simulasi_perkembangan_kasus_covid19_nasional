<?php 

class ProvinsiModel extends CI_Model
{
    public function getAllData()
    {
        return $this->db->get('tbl_provinsi')->result_array();
    }
    public function getDatabyId($id)
    {
        return $this->db->get_where('tbl_provinsi', ['kd_provinsi'=> $id])->row_array();
    }
    public function addData()
    {
        $data = [
            "nm_provinsi" => $this->input->post('nm_provinsi'),
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
        ];
        $this->db->insert('tbl_provinsi', $data);
    }
    public function deleteData($id)
    {
        $this->db->where('kd_provinsi', $id);
        $this->db->delete('tbl_provinsi');
    }
    public function updateData()
    {
        $data = [
            "nm_provinsi" => $this->input->post('nm_provinsi'),
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
        ];
        $this->db->where('kd_provinsi', $this->input->post('kd_provinsi'));
        $this->db->update('tbl_provinsi', $data);
               
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nm_provinsi', $keyword);


        $query = $this->db->get('tbl_provinsi')->result_array();
        return $query;
    }

    
}




?>
