<?php

class ModelUser extends CI_Model{

  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';

    return $response;
  }

  public function post_user($id_user,$first_name,$last_name){
    if(empty($id_user) || empty($first_name) || empty($last_name)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_user" => $id_user,
        "first_name" => $first_name,
        "last_name" => $last_name
      );

      $insert = $this->db->insert("table_user", $data);

      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['boolstatus']=$insert;
        $response['message']='Post user berhasil';

        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['boolstatus']=$insert;
        $response['message']='Post user gagal';

        return $response;
      }
    }
  }

  public function get_user($id_user){
    $where = array(
      'id_user' => $id_user
    );

    if($id_user == ''){
      $all = $this->db->get("table_user")->result();
    } else {
      $this->db->where($where);
      $all = $this->db->get("table_user")->result();
    }

    $response['status']=200;
    $response['error']=false;
    $response['user']=$all;
    $response['message']='Get user berhasil';

    return $all;
  }

  public function delete_user($id_user){
    if($id_user == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_user" => $id_user
      );

      $this->db->where($where);

      $delete = $this->db->delete("table_user");

      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['boolstatus']=$delete;
        $response['message']='Delete user berhasil';

        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['boolstatus']=$delete;
        $response['message']='Delete user gagal';

        return $response;
      }
    }
  }

  public function put_user($id_user,$first_name,$last_name){
    if($id_user == '' || empty($first_name) || empty($last_name)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_user" => $id_user
      );$set = array(
        "id_user" => $id_user,
        "first_name" => $first_name,
        "last_name" => $last_name
      );

      $this->db->where($where);

      $update = $this->db->update("table_user",$set);

      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['boolstatus']=$update;
        $response['message']='Put user berhasil';

        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['boolstatus']=$update;
        $response['message']='Put user gagal';

        return $response;
      }
    }
  }
}
?>