<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if($this->session->userdata("status") != "login"){
      redirect(base_url("login"));
      exit;
    }
    $this->load->library("form_validation");
    $this->load->model("Admin_model");
  }

  private function _rules(){
    return [
      [
        'field'=>"judul",
        "label"=>"judul",
        "rules"=>"required"
      ],
      [
        "field"=>"author",
        "label"=>"author",
        "rules"=>"required"
      ],
      [
        'field'=>"konten",
        "label"=>"konten",
        "rules"=>"required"
      ]
    ];
  }

  private function _upload(){
    $config['upload_path']      = "./asset/gambar/";
    $config['allowed_types']    = "gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG";
    $config['file_name']        = uniqid();
    $config['overwrite']        = true;
    $config['max_size']         = 2024;

    $this->load->library("upload",$config);

    if ($this->upload->do_upload("gambar")) {
      return $this->upload->data("file_name");
    }
    return "default.jpg";

  }

  private function _deleteImage($id)
  {
      $gambar = $this->Admin_model->get_id($id);
      if ($gambar->gambar != "default.jpg") {
  	  //   $filename = explode(".", $gambar->image)[0];
  		// return array_map('unlink', glob(FCPATH."asset/gambar/$filename.*"));
        return unlink("./asset/gambar/".$gambar->gambar);
      }
  }

  function index(){
    $data['bloge']=$this->Admin_model->select_all("blog");
    $this->load->view("admin/header");
    $this->load->view("admin/index",$data);
    $this->load->view("admin/footer");
  }

  function view($id=null)
  {
    if($this->Admin_model->cocokID($id)<1){
      show_404();
    }else{
      $data['var']=$this->Admin_model->get_id($id);
      $this->load->view("admin/header");
      $this->load->view("admin/view_id",$data);
      $this->load->view("admin/footer");
    }
  }

  function edit($id=null)
  {
    if($this->Admin_model->cocokID($id)<1){
      show_404();
    }else{
      // $id_gambar=$id;

      if($this->input->post("submit")){
        if($this->form_validation->set_rules($this->_rules())->run()){
          date_default_timezone_set('Asia/Jakarta');
          $slug=url_title($this->input->post("judul"))."-".uniqid();
          $judul=htmlentities($this->input->post("judul"));
          $isi=$this->input->post("isi");
          $gambar=$this->_upload();
          $tanggal=date("Y-m-d H:i:s");
          $author=htmlentities($this->input->post("author"));
          $konten=htmlentities($this->input->post("konten"));

          $get_id=$this->Admin_model->get_id($id)->gambar;

          $data=[
            'slug'=>$slug,
            "judul"=>$judul,
            "isi"=>$isi,
            "gambar"=>$gambar,
            "tanggal"=>$tanggal,
            "author"=>$author,
            "konten"=>$konten
          ];

          $this->_deleteImage($id);
          $this->Admin_model->update_blog($data,$id);

          $this->session->set_flashdata("success_edit_blog","Success perbarui blog");
          redirect(base_url("admin"));
        }
      }
      $data['var']=$this->Admin_model->get_id($id);
      $this->load->view("admin/header");
      $this->load->view("admin/edit",$data);
      $this->load->view("admin/footer");
    }
  }

  function delete($id=null){
    if(!$id){
      show_404();
    }else{
      if ($this->Admin_model->cocokID($id)<1) {
        show_404();
      }else {
        $this->_deleteImage($id);
        if ($this->Admin_model->delete_blog($id)) {
          $this->session->set_flashdata("sukses_hapus_blog","Sukses hapus blog");
          redirect(base_url("admin"));
        }
      }
    }
  }

  function tambah(){

    date_default_timezone_set('Asia/Jakarta');
    $slug=url_title($this->input->post("judul"))."-".uniqid();
    $judul=htmlentities($this->input->post("judul"));
    $isi=$this->input->post("isi");
    $gambar=$this->_upload();
    $tanggal=date("Y-m-d H:i:s");
    $author=htmlentities($this->input->post("author"));
    $konten=htmlentities($this->input->post("konten"));

    $data=[
      'slug'=>$slug,
      "judul"=>$judul,
      "isi"=>$isi,
      "gambar"=>$gambar,
      "tanggal"=>$tanggal,
      "author"=>$author,
      "konten"=>$konten
    ];
    if($_POST){
      if ($this->form_validation->set_rules($this->_rules())->run()) {
        if($this->Admin_model->tambah($data)){
          $this->session->set_flashdata("sukses_tambah_blog","Sukses tambah blog");
          redirect(base_url("admin"));
        }
      }
    }

    $this->load->view("admin/header");
    $this->load->view("admin/tambah");
    $this->load->view("admin/footer");
  }

  function user(){
    $username=$this->input->post("username");
    $password=md5($this->input->post("password"));
    $datane=[
      "username"=>$username,
      "password"=>$password
    ];
    if($this->input->post("submit")){
      if ($this->Admin_model->tambah_user($datane)) {
        $this->session->set_flashdata("sukses_tambah_user");
        redirect(base_url("admin/user"));
      }
    }
    $data['user']=$this->Admin_model->view_user();
    $this->load->view("admin/header");
    $this->load->view("admin/view_admin",$data);
    $this->load->view("admin/footer");
  }

  function delete_user($id){
    if ($this->Admin_model->delete_user($id)) {
      $this->session->set_flashdata("sukses_hapus_user","Sukses hapus user");
      redirect(base_url("admin/user"));
    }
  }

  function logout(){
    $this->session->sess_destroy();
    $this->session->set_flashdata("sukses_logout","Berhasil logout");
    redirect(base_url("login"));
  }

}

 ?>
