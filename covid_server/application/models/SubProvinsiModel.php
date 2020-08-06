<?php 

class SubProvinsiModel extends CI_Model
{
    public function getAllData()
    {
                $this->db->select('tbl_sub_provinsi.*, tbl_provinsi.nm_provinsi');
        $this->db->join('tbl_provinsi', 'tbl_provinsi.kd_provinsi = tbl_sub_provinsi.kd_provinsi');
        return $this->db->get('tbl_sub_provinsi')->result_array();
    }
    public function getDatabyId($id)
    {
        return $this->db->get_where('tbl_sub_provinsi', ['id'=> $id])->row_array();
    }
    public function getDataProvinsi()
    {
        return $this->db->get('tbl_provinsi')->result_array();
    }
    public function addData()
    {
        $data = [
            "kd_provinsi" => $this->input->post('kd_provinsi'),
            "nm_kota" => $this->input->post('nm_kota'),
            "nm_kab" => $this->input->post('nm_kab'),
            "nm_kec" => $this->input->post('nm_kec'),
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
            "radius" => $this->input->post('radius'),
            "warna" => $this->input->post('warna'),

        ];
        $this->db->insert('tbl_sub_provinsi', $data);
    }
    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_sub_provinsi');
    }
    public function updateData()
    {
        $data = [
            "kd_provinsi" => $this->input->post('kd_provinsi'),
            "nm_kota" => $this->input->post('nm_kota'),
            "nm_kab" => $this->input->post('nm_kab'),
            "nm_kec" => $this->input->post('nm_kec'),
            "latitude" => $this->input->post('latitude'),
            "longitude" => $this->input->post('longitude'),
            "radius" => $this->input->post('radius'),
            "warna" => $this->input->post('warna')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tbl_sub_provinsi', $data);
               
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nm_kota', $keyword);

        $this->db->select('tbl_sub_provinsi.*, tbl_provinsi.nm_provinsi');
        $this->db->join('tbl_provinsi', 'tbl_provinsi.kd_provinsi = tbl_sub_provinsi.kd_provinsi');
        return $this->db->get('tbl_sub_provinsi')->result_array();
    }

    // REST SERVER
    public function getAllSubProvinsiRest($id=null)
    {
        if ($id==null) {
            return $this->db->get('tbl_sub_provinsi')->result_array();
        }else {
            return $this->db->get_where('tbl_sub_provinsi', ['kd_provinsi'=> $id])->result_array($id);
        }

    }
    public function deleteSubProvinsiRest($id)
    {
        $this->db->delete('tbl_sub_provinsi', ['id'=>$id]);
        return $this->db->affected_rows();
    }
    public function createdSubProvinsiRest($data)
    {
        $this->db->insert('tbl_sub_provinsi', $data);
        return $this->db->affected_rows();
    }
    
}


?>
