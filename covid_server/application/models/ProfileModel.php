<?php 

class ProfileModel extends CI_Model
{

    public function addPhoto()
    {
        $foto = $_FILES['foto'];
        $config['upload_path'] = '.temp/img';
        $config['allowed_types'] = 'jpg|png|gif';
        
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            echo "Upload Gagal";
        }else{
            $foto = $this->upload->data('file_name');
        }

        $data=[
            'avatar' => $foto,
        ];
        $this->db->where('kd_user', $this->input->post('kd_user'));
        $this->db->update('tbl_user', $data);
    }
}


?>