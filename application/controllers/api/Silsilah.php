<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Silsilah extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_silsilah');

    }
// GET

public function all_get(){
	$all=$this->m_silsilah->get_all();
	$this->response($all, REST_Controller::HTTP_OK);
	if ($all) {
			$this->response([
				'status'=>TRUE,
				'data'=>$all
			], REST_Controller::HTTP_OK);
	}else{
		 $this->response([
                    'status' => FALSE,
                    'message' => 'Error'
            ], REST_Controller::HTTP_NO_CONTENT);
	}

}
//Api untuk mendapatkan semua anak pak budi
public function anak_get(){
	$id=$this->get('id');

	if ($id==Null) {
		$anak=$this->m_silsilah->get_semua_anak();
		$this->response($anak, REST_Controller::HTTP_OK);
	}else{
		$anak=$this->m_silsilah->get_semua_anak($id);
	}
	if ($anak) {
			$this->response([
					'status'=> TRUE,
					'data'=>$anak
			], REST_Controller::HTTP_OK);
	}else{
		 $this->response([
                    'status' => FALSE,
                    'message' => 'ID Not found'
            ], REST_Controller::HTTP_NOT_FOUND);
	}
	
}
//Api mendapatkan cucu pak Budi

public function cucu_get(){
	$cucu=$this->m_silsilah->get_cucu();
	$this->response($cucu, REST_Controller::HTTP_OK);
	if ($cucu) {
			$this->response([
				'status'=>TRUE,
				'data'=>$cucu
			], REST_Controller::HTTP_OK);
	}else{
		 $this->response([
                    'status' => FALSE,
                    'message' => 'Error'
            ], REST_Controller::HTTP_NO_CONTENT);
	}
}

//Api cucu perempuan pak Budi

public function cucu_perempuan_get(){
	$cucu_pr=$this->m_silsilah->get_cucu_perempuan();
	$this->response($cucu_pr, REST_Controller::HTTP_OK);
	if ($cucu_pr) {
			$this->response([
				'status'=>TRUE,
				'data'=>$cucu_pr
			], REST_Controller::HTTP_OK);
	}else{
		 $this->response([
                    'status' => FALSE,
                    'message' => 'Error'
            ], REST_Controller::HTTP_NO_CONTENT);
	}
}

//Api bibi farah
public function bibi_get(){
	$bibi=$this->m_silsilah->get_bibi_farah();
	$this->response($bibi, REST_Controller::HTTP_OK);
	if ($bibi) {
			$this->response([
				'status'=>TRUE,
				'data'=>$bibi
			], REST_Controller::HTTP_OK);
	}else{
		 $this->response([
                    'status' => FALSE,
                    'message' => 'Error'
            ], REST_Controller::HTTP_NO_CONTENT);
	}
}

//Api mendapatkan sepupu laki-laki dari Hani
public function sepupu_get(){
	$sepupu=$this->m_silsilah->get_sepupu_laki();
	$this->response($sepupu, REST_Controller::HTTP_OK);
	if ($sepupu) {
			$this->response([
				'status'=>TRUE,
				'data'=>$sepupu
			], REST_Controller::HTTP_OK);
	}else{
		 $this->response([
                    'status' => FALSE,
                    'message' => 'Error'
            ], REST_Controller::HTTP_NO_CONTENT);
	}
}

//post
// api menmbah keluarga
   public function keluarga_post(){
        $data=[
            'nama'=>$this->post('nama'),
            'jenis_kelamin'=>$this->post('jengkel'),
            'status'=>$this->post('status'),
            'ortu_id'=>$this->post('ortu')
        ];
  
        if ($this->m_silsilah->simpan($data)>0) {
                        $this->response([
                            'status' => TRUE,
                            'message'=>'Keluarga Baru telah ditambah'
                    ], REST_Controller::HTTP_CREATED);
        }else {
                        $this->response([
                             'status' => FALSE,
                             'message' => 'Gagal Menambahkan Keluarga'
                    ], REST_Controller::HTTP_BAD_REQUEST);
    }
}

//Api Delete

  public function hapus_delete(){
        $id =$this->delete('id');
        if ($id == null)
        {
            $this->response([
                             'status' => FALSE,
                             'message' => 'ID Tidak Boleh Kosong'
                    ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else {
            if ($this->m_silsilah->hapus($id)>0) {
                //hapus
                $this->response([
                            'status' => TRUE,
                            'id' => $id,
                            'message'=>' Terhapus'
                    ], REST_Controller::HTTP_OK);
            }else {
                $this->response([
                             'status' => FALSE,
                             'message' => 'ID Not found'
                    ], REST_Controller::HTTP_NO_CONTENT);
            }
        }

    }


//Api untuk mengedit 
   public function index_put(){
        $id=$this->put('id');

         $data=[
            'nama'=>$this->put('nama'),
            'jenis_kelamin'=>$this->put('jengkel'),
            'status'=>$this->put('status'),
            'ortu_id'=>$this->put('otu')
        ];
        if ($this->m_silsilah->update($data, $id)>0) {
                        $this->response([
                            'status' => TRUE,
                            'message'=>'Terupdate'
                    ], REST_Controller::HTTP_NO_CONTENT);
        }else {
                        $this->response([
                             'status' => FALSE,
                             'message' => 'Gagal Mengupdate'
                    ], REST_Controller::HTTP_BAD_REQUEST);
    }
    }

}

