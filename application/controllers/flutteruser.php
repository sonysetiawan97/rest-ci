<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class flutteruser extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id_user');
        if ($id == '') {
            $all_user = $this->db->get('table_user')->result();
        } else {
            $this->db->where('id_user', $id);
            $all_user = $this->db->get('table_user')->result();
        }
        $this->response($all_user, 200);
    }

    function index_post() {
        $data = array(
            'id_user'       => $this->post('id_user'),
            'first_name'    => $this->post('first_name'),
            'last_name'     => $this->post('last_name'));
        $insert = $this->db->insert('table_user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id_user');
        $data = array(
            'id_user'       => $this->put('id_user'),
            'first_name'    => $this->put('first_name'),
            'last_name'     => $this->put('last_name'),
            'point_user'    => $this->put('point_user'));
        $this->db->where('id_user', $id);
        $update = $this->db->update('table_user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id_user');
        $this->db->where('id_user', $id);
        $delete = $this->db->delete('table_user');
        if ($delete) {
            $this->response(array('status' => 'success'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>