<?php
class Sms_m extends CI_model {

public function insertgroup($namagroup){
return $this->db->insert('tgroupsms',$namagroup);
}

function ambil_group(){
	return $this->db->query("Select * from tgroupsms order by id_group DESC");
}

function get_grup(){
	$this->db->select('*');
	$this->db->from('tgroupsms');
	$this->db->order_by('date','DESC');
	return $this->db->get()->result();
}

function deletegroups($id){
$this->db->where('id_group',$id);    
$this->db->delete('tgroupsms');
  
$this->db->where('idgroup',$id);
$this->db->delete('tgroupsms_detail');
    
}

function get_kontak($group){
	$this->db->select('*');
	$this->db->from('tgroupsms_detail');
	 $this->db->where('idgroup', $group);
	return $this->db->get()->result();
}

function get_grup_name($group){
	 $this->db->select('*');
     $this->db->from('tgroupsms');
     $this->db->where('id_group', $group);
     return $this->db->get()->row();
}

function import_kontak($kontakData){
	try {
            $this->db->trans_begin();
            foreach ($kontakData as $row) {
                $options = array('idgroup' => $row['idgroup'],'nama' => $row['nama'], 'kontak' => $row["kontak"]);
                $Q = $this->db->get_where('tgroupsms_detail', $options, 1);
                if ($Q->num_rows() > 0) {
                    $previousData = $Q->result();
                    foreach ($previousData as $data) {
                        $this->db->update('tgroupsms_detail', $row, array('noid' => $data->noid));
                    }
                } else {
                    $this->db->insert('tgroupsms_detail', $row);
                }
            }
            if (($this->db->trans_status() == false)) {
                $this->db->trans_rollback();
                $result = false;
            } else {
                $this->db->trans_commit();
                $result = true;
            }
        } catch (Exception $exc) {
            $this->db->trans_rollback();
            $result = false;
        }
        $this->db->trans_complete();

        return true;

}

}

?>