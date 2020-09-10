<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ApiTransaksi extends REST_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('ModelTransaksi');
    }

    public function index_get(){
        $response = $this->ModelTransaksi->get_transaksi(
            $this->get('id_transaksi')
        );
        $this->response($response);
    }

    public function index_post(){
        $response = $this->ModelTransaksi->post_transaksi(
            $this->post('id_transaksi'),
            $this->post('id_user'),
            $this->post('total_transaksi')
        );
        $this->response($response);
    }

    public function index_put(){
        $response = $this->ModelTransaksi->put_transaksi(
            $this->put('id_transaksi'),
            $this->put('id_user'),
            $this->put('total_transaksi')
        );
        $this->response($response);
    }

    public function index_delete(){
        $response = $this->ModelTransaksi->delete_transaksi(
            $this->delete('id_transaksi')
        );
        $this->response($response);
    }
}
?>