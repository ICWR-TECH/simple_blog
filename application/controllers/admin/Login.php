<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Login extends CI_Controller
{
  function __construct()
  {
      parent::__construct();
      $this->load->model("Admin_model");
      $this->load->library("form_validation");
  }
  private function rules(){
    return [
      [
        'field'=>"username",
        "label"=>"username",
        "rules"=>"required"
      ],
      [
        "field"=>"password",
        "label"=>"password",
        "rules"=>"required"
      ]
    ];
  }

  function index(){
    $username=$this->input->post("username");
    $password=md5($this->input->post("password"));
    $data=['username'=>$username,"password"=>$password];
    if($this->input->post()){
      if($this->form_validation->set_rules($this->rules())->run()){
        $ses=[
          'nama'=>$username,
          "status"=>"login"
        ];

        if($this->Admin_model->login("admin",$data)->num_rows()>0){
          $this->session->set_userdata($ses);
          header("location:".base_url("admin"));
        }else {
          $this->session->set_flashdata("gagal_login","Anda gagal login, silahkan cek username dan password anda kembali");
          redirect(base_url("login"));
        }
      }
    }
    $this->load->view("admin/login");
  }
}

 ?>
