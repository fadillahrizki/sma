<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION["user"])){
            header("location:/auth/login");
        }else if($this->session->user->level != "petugas"){
            header("location:/");
        }
        $this->load->model(['stok_model']);
    }

    function index(){
        $data = [
            'data'=>$this->stok_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('stok/index',$data);
        $this->load->view('layouts/footer');
    }

    function create(){
        $this->load->view('layouts/header');
        $this->load->view('stok/create');
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $post = $this->input->post();
        $stok = $this->stok_model->update($post);                
        if($stok){
            $this->session->successUpdate = true;
            header("location:/stok");
        }
    }

    function delete(){
        $del = $this->stok_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/stok");
        }
    }

    function insert(){
        $post = $this->input->post();
        $stok = $this->stok_model->insert($post);                
        if($stok){
            $this->session->successCreate = true;
            header("location:/stok");
        }
    }

    function edit(){
        $data = [
            'stok' => $this->stok_model->single($this->input->get('id')),
        ];
        $this->load->view('layouts/header');
        $this->load->view('stok/edit',$data);
        $this->load->view('layouts/footer');
    }
}