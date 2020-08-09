<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Blog_model extends CI_Model
{
  function get_all()
  {
    return $this->db->order_by("id","DESC")->get("blog")->result();
  }

  function get_all_list($limit,$start){
    return $this->db->order_by("id","DESC")->get("blog",$limit,$start);
  }

  function get_id($slug){
    return $this->db->get_where("blog",['slug'=>$slug])->row();
  }

  function cocokID($slug){
    return $this->db->get_where("blog",["slug"=>$slug])->num_rows();
  }

}


 ?>
