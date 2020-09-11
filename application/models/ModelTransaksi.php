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
      $query = "SELECT table_user.id_user,table_user.first_name,table_user.last_name,table_transaksi.id_transaksi,table_transaksi.total_transaksi FROM table_transaksi INNER JOIN table_user ON table_user.id_user=table_transaksi.id_user";
      $all = $this->db->query($query)->result();
      // $all = $this->db->get('table_transaksi')->result();
    } else {
      $all = $this->db->get_where('table_transaksi', $where) -> result();
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
        'id_transaksi' => $id_transaksi,
        'id_user' => $id_user,
        'total_transaksi' => $total_transaksi
      );

      $insert = $this->db->insert('table_transaksi', $data);

      //flush query
      $this->db->flush_cache();

      //menambahkan point user
      $query = "UPDATE table_user SET point_user=point_user+5 WHERE id_user='$id_user'";
      $update_point = $this->db->query($query);

      if($insert & $update_point){
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
        'id_transaksi' => $id_transaksi
      );
      $set = array(
        'id_transaksi' => $id_transaksi,
        'id_user' => $id_user,
        'total_transaksi' => $total_transaksi
      );

      $update = $this->db->update('table_transaksi', $set, $where);

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

      $delete = $this->db->delete('table_transaksi', $where);

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