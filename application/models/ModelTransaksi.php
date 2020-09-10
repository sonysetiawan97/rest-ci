<?php

class ModelTransaksi extends CI_Model{

	public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';

    return $response;
  }

  public function get_transaksi($id_transaksi){
    $where = array(
      'id_transaksi' => $id_transaksi
    );

    if($id_transaksi == ''){
      $all = $this->db->get("table_transaksi")->result();
    } else {
      $this->db->where($where);
      $all = $this->db->get("table_transaksi")->result();
    }

    $response['status']=200;
    $response['error']=false;
    $response['user']=$all;
    $response['message']='Get user berhasil';

    return $all;
  }

  public function post_transaksi($id_transaksi,$id_user,$total_transaksi){
    if(empty($id_transaksi) || empty($id_user) || empty($total_transaksi)){
      return $this->empty_response();
    }else{
      $data = array(
        "id_hadiah" => $id_hadiah,
        "nama_hadiah" => $nama_hadiah,
        "point_hadiah" => $point_hadiah
      );

      $insert = $this->db->insert("table_transaksi", $data);

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

  public function put_transaksi($id_transaksi,$id_user,$total_transaksi){
    if(empty($id_transaksi) || empty($id_user) || empty($total_transaksi)){
      return $this->empty_response();
    }else{
      $where = array(
        "id_transaksi" => $id_transaksi
      );$set = array(
        "id_transaksi" => $id_transaksi,
        "id_user" => $id_user,
        "total_transaksi" => $total_transaksi
      );

      $this->db->where($where);

      $update = $this->db->update("table_transaksi",$set);

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

  public function delete_transaksi($id_transaksi){
    if($id_transaksi == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id_transaksi" => $id_transaksi
      );

      $this->db->where($where);

      $delete = $this->db->delete("table_transaksi");

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