<?php 


class FrontendModel extends CI_Model
{
     public function getAllData()
    {
        return $this->db->get('tb_kasus')->result_array();
    }
    public function getAllDataKota()
    {
        return $this->db->get('tb_kota')->result_array();
    }
    public function jumlah()
    {
        $this->db->order_by('id','DESC');
        $query = $this->db->get('tb_kasus')->row_array();
        return $query;
    }
}


?>

