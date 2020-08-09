<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin_model extends CI_Model
{
  function login($db,$data)
  {
    return $this->db->get_where($db,$data);
  }

  function select_all($db)
  {
    return $this->db->order_by("id","DESC")->get($db)->result();
  }

  function get_id($id)
  {
    return $this->db->get_where("blog",["id"=>$id])->row();
  }

  function cocokID($id)
  {
    return $this->db->get_where("blog",['id'=>$id])->num_rows();
  }

  function update_blog($data,$id)
  {
    $this->db->update("blog",$data,["id"=>$id]);
  }

  function delete_blog($id)
  {
    return $this->db->delete("blog",["id"=>$id]);
  }

  function tambah($data){
    return $this->db->insert("blog",$data);
  }

  function view_user(){
    return $this->db->get("admin")->result();
  }

  function delete_user($id){
    return $this->db->delete("admin",['id'=>$id]);
  }

  function tambah_user($data){
    return $this->db->insert("admin",$data);
  }
}
