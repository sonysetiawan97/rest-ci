<?php

class ModelHadiah extends CI_Model{

	public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';

    return $response;
  }

  public function get_hadiah($id_hadiah){
    $where = array(
      'id_hadiah' => $id_hadiah
    );

    if($id_hadiah == ''){
      $all = $this->db->get("table_hadiah")->result();
    } else {
      $this->db->where($where);
      $all = $this->db->get("table_hadiah")->result();
    }

    $response['status']=200;
    $response['error']=false;
    $response['user']=$all;
    $response['message']='Get user berhasil';

    return $all;
  }

  public function post_hadiah($id_hadiah,$nama_hadiah,$point_hadiah){
    if(empty($id_hadiah) || empty($first_name) || empty($last_name)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_hadiah" => $id_hadiah,
        "nama_hadiah" => $nama_hadiah,
        "point_hadiah" => $point_hadiah
      );

      $insert = $this->db->insert("table_hadiah", $data);

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

  public function put_hadiah($id_hadiah,$nama_hadiah,$point_hadiah){
    if($id_hadiah == '' || empty($nama_hadiah) || empty($nama_hadiah)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_hadiah" => $id_hadiah
      );$set = array(
        "id_hadiah" => $id_hadiah,
        "nama_hadiah" => $nama_hadiah,
        "point_hadiah" => $point_hadiah
      );

      $this->db->where($where);

      $update = $this->db->update("table_hadiah",$set);

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

  public function delete_hadiah($id_hadiah){
    if($id_hadiah == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_hadiah" => $id_hadiah
      );

      $this->db->where($where);

      $delete = $this->db->delete("table_hadiah");

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

 }

?>