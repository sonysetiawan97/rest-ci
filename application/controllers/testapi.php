<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Testapi extends REST_Controller{

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    public function index_get(){

        $response['status']=200;
        $response['error']=false;
        $response['message']='Hai from response';
    
        $this->response($response);
    }

    public function user_get(){

    $response['status']=200;
    $response['error']=false;
    $response['user']['username']='sony';
    $response['user']['email']='sonysetiawanred@gmail.com';
    $response['user']['detail']['full_name']='Sony Setiawan';
    $this->response($response);
    }
}
?>