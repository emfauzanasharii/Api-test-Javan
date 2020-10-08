<?php 
/**
 * 
 */
class M_silsilah extends CI_Model {

	function get_all(){
		$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id");
		return $hsl->result();
	}
	
	function get_semua_anak($id=NULL){
		if ($id===NULL) {
			$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id where cucu.status=1");
		return $hsl->result();
		}else{
			$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id where cucu.status=1 and id='$id'");
			return $hsl->result();
		}
		
	}

	function get_cucu(){
		$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id  WHERE cucu.status=2");
		return $hsl->result();
	}

	function get_cucu_perempuan(){
		$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id WHERE cucu.status=2 and cucu.jenis_kelamin=2");
		return $hsl->result();
	}

	function get_bibi_farah(){
		$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id where cucu.status=1 and cucu.jenis_kelamin=2");
		return $hsl->result();
	}

	function get_sepupu_laki(){
		$hsl=$this->db->query("SELECT cucu.id as id, cucu.nama as nama, cucu.jenis_kelamin as jenis_kelamin, cucu.status as status,
			anak.nama as ortu_nama  
		 FROM tbl_keluarga as cucu left join tbl_keluarga as anak on cucu.ortu_id=anak.id where cucu.status=2 and cucu.jenis_kelamin=1");
		return $hsl->result();
	}

	function simpan($data){
		$hsl=$this->db->insert('tbl_keluarga', $data);
		return $this->db->affected_rows();
	}

	function hapus($id){
		$this->db->delete('tbl_keluarga', ['id'=> $id]);
        return $this->db->affected_rows();
	}

	function edit($where,$table){		
	return $this->db->get_where($table,$where);
	}

	public function update($data, $id)
    {
        $this->db->update('tbl_keluarga', $data, ['id'=>$id]);
        return $this->db->affected_rows();
    }

}