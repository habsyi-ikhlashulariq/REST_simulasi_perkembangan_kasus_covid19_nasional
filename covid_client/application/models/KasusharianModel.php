<?php 


class KasusharianModel extends CI_Model
{
  public function getAllData()
  {
      return $this->db->get('tb_kasus')->result_array();
  }

  public function deleteData($id)
  {
      $this->db->where('id', $id);
      $this->db->delete('tb_kasus');
  }
}


?>

