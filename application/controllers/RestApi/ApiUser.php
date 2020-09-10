<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ApiUser extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('ModelUser');
    }

    public function index_get(){
        $response = $this->ModelUser->get_user(
            $this->get('id_user')
        );
        $this->response($response);
    }

    public function index_post(){
        $response = $this->ModelUser->post_user(
            $this->post('id_user'),
            $this->post('first_name'),
            $this->post('last_name')
        );
        $this->response($response);
    }

    public function index_put(){
        $response = $this->ModelUser->put_user(
            $this->put('id_user'),
            $this->put('first_name'),
            $this->put('last_name')
        );
        $this->response($response);
    }

    public function index_delete(){
        $response = $this->ModelUser->delete_user(
            $this->delete('id_user')
        );
        $this->response($response);
    }
}
?>