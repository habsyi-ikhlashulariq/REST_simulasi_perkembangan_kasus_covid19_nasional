<?php 

class KasusModel extends CI_Model
{
    public function getAllData()
    {
        $this->db->select('tbl_perkembangan_kasus.*, tbl_provinsi.nm_provinsi');
        $this->db->join('tbl_provinsi', 'tbl_provinsi.kd_provinsi = tbl_perkembangan_kasus.kd_provinsi');
        return $this->db->get('tbl_perkembangan_kasus')->result_array();
    }
    public function getDatabyId($id)
    {
        return $this->db->get_where('tbl_perkembangan_kasus', ['id_kasus'=> $id])->row_array();
    }
    public function getDataProvinsi()
    {
        return $this->db->get('tbl_provinsi')->result_array();
    }
    public function addData()
    {
        $data = [
            "kd_provinsi" => $this->input->post('provinsi'),
            "positif" => $this->input->post('positif'),
            "sembuh" => $this->input->post('sembuh'),
            "meninggal" => $this->input->post('meninggal'),
            "dirawat" => $this->input->post('dirawat'),
            "pdp" => $this->input->post('pdp'),
            "odp" => $this->input->post('odp'),
        ];
        $this->db->insert('tbl_perkembangan_kasus', $data);
    }
    public function deleteData($id)
    {
        $this->db->where('id_kasus', $id);
        $this->db->delete('tbl_perkembangan_kasus');
    }
    public function updateData()
    {
        $data = [
            "kd_provinsi" => $this->input->post('provinsi'),
            "positif" => $this->input->post('positif'),
            "sembuh" => $this->input->post('sembuh'),
            "meninggal" => $this->input->post('meninggal'),
            "dirawat" => $this->input->post('dirawat'),
            "pdp" => $this->input->post('pdp'),
            "odp" => $this->input->post('odp'),
        ];
        $this->db->where('id_kasus', $this->input->post('id_kasus'));
        $this->db->update('tbl_perkembangan_kasus', $data);
               
    }
    public function searchData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nm_provinsi', $keyword);
        
        $this->db->select('tbl_perkembangan_kasus.*, tbl_provinsi.nm_provinsi');
        $this->db->join('tbl_provinsi', 'tbl_provinsi.kd_provinsi = tbl_perkembangan_kasus.kd_provinsi');
        return $this->db->get('tbl_perkembangan_kasus')->result_array();
    }


    // Rest Server
    public function getAllKasusRest($id=null)
    {
        if ($id==null) {
            return $this->db->get('tbl_perkembangan_kasus')->result_array();
        }else {
            return $this->db->get_where('tbl_perkembangan_kasus', ['kd_provinsi'=> $id])->result_array($id);
        }

    }

    public function updateKasusRest($data,$id)
    {
        $this->db->update('tbl_perkembangan_kasus', $data, ['kd_provinsi'=>$id]);
        return $this->db->affected_rows();
    }
    
}




?>
