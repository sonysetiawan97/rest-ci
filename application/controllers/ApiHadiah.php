<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ApiHadiah extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('ModelHadiah');
    }

    public function index_get(){
        $response = $this->ModelHadiah->get_hadiah(
            $this->get('id_hadiah')
        );
        $this->response($response);
    }

    public function index_post(){
        $response = $this->ModelHadiah->post_hadiah(
            $this->post('id_hadiah'),
            $this->post('nama_hadiah'),
            $this->post('point_hadiah')
        );
        $this->response($response);
    }

    public function index_put(){
        $response = $this->ModelHadiah->put_hadiah(
            $this->put('id_hadiah'),
            $this->put('nama_hadiah'),
            $this->put('point_hadiah')
        );
        $this->response($response);
    }

    public function index_delete(){
        $response = $this->ModelHadiah->delete_hadiah(
            $this->delete('id_hadiah')
        );
        $this->response($response);
    }
}
?>