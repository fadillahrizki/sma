<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION["user"])){
            header("location:/auth/login");
        }else if($this->session->user->level == "petugas"){
            header("location:/");
        }
        $this->load->model(['petugas_model','pengguna_model']);
    }

    function index(){
        $data = [
            'data'=>$this->petugas_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('petugas/index',$data);
        $this->load->view('layouts/footer');
    }

    function create(){
        $this->load->view('layouts/header');
        $this->load->view('petugas/create');
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $post = $this->input->post();
        $pengg = [
            "id"=>$post["pengguna_id"],
            "username"=>$post["username"],
            "password"=>$post["password"],
            "level"=>$post["level"],
        ];
        $pengguna = $this->pengguna_model->update($pengg);                
        if($pengguna){
            $petugas = [
                "id"=>$post["id"],
                "nama_lengkap"=>$post["nama_lengkap"],
                "alamat"=>$post["alamat"],
                "jenis_kelamin"=>$post["jenis_kelamin"],
                "no_hp"=>$post["no_hp"],
                "no_hp"=>$post["no_hp"],
                "pengguna_id"=>$post["pengguna_id"]
            ];

            $ins = $this->petugas_model->update($petugas);
            if($ins){
                $this->session->successUpdate = true;
                header("location:/petugas");
            }
        }
    }

    function delete(){
        $del = $this->petugas_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/petugas");
        }
    }

    function insert(){
        $post = $this->input->post();
        $post["id"] = $this->pengguna_model->count()+1;
        $pengg = [
            "id"=>$post["id"],
            "username"=>$post["username"],
            "password"=>$post["password"],
            "level"=>$post["level"],
        ];
        $pengguna = $this->pengguna_model->insert($pengg);                
        if($pengguna){
            $petugas = [
                "pengguna_id"=>$post["id"],
                "nama_lengkap"=>$post["nama_lengkap"],
                "alamat"=>$post["alamat"],
                "jenis_kelamin"=>$post["jenis_kelamin"],
                "no_hp"=>$post["no_hp"],
            ];

            $ins = $this->petugas_model->insert($petugas);
            if($ins){
                $this->session->successCreate = true;
                header("location:/petugas");
            }
        }
    }

    function edit(){
        $data = [
            'petugas' => $this->petugas_model->single($this->input->get('id')),
        ];
        $this->load->view('layouts/header');
        $this->load->view('petugas/edit',$data);
        $this->load->view('layouts/footer');
    }
}