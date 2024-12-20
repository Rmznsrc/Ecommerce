<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class ApiSssController extends RestController 
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model("Database_Model");     
    }
	public function index_get()
	{ 
		$sss = new Database_Model();
		$sss = $sss->GetAllSSS();
		$this->response($sss, 200);  
        
	}
    public function insertsss_post()
    {
        $dbmodel = new Database_Model;
        $data = [
            'Baslik' =>  $this->input->post('Baslik'),
            'Soru' => $this->input->post('Soru'),
            'Cevap' => $this->input->post('Cevap')
        ];
        $result = $dbmodel->insert_data('SSS',$data);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Yeni Veri Eklendi.'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Veri Ekleme İşlemi Başarısız'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    public function findSSS_get($id){
        $dbmodel = new Database_Model();
        $result  = $dbmodel->getSSS($id);
        $this->response($result, 200);  
    }
    public function updateSSS_put($id){
        $dbmodel = new Database_Model();
 
        $data = [
            'Baslik' =>  $this->put('Baslik'),
            'Soru' => $this->put('Soru'),
            'Cevap' => $this->put('Cevap')
        ];
        $result = $dbmodel->updateSSS($id, $data);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Veri Güncellendi.'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Veri Güncelleme Başarısız.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    public function removeSSS_delete($id){
        $dbmodel = new Database_Model;
        $result = $dbmodel->deleteSSS($id);
        if($result > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'Veri Silindi.'
            ], RestController::HTTP_OK); 
        }
        else
        {
            $this->response([
                'status' => false,
                'message' => 'Veri Silme İşlemi Başarısız.'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
?>