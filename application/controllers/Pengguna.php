<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION["user"])){
            header("location:/auth/login");
        }else if($this->session->user->level == "petugas"){
            header("location:/");
        }
        $this->load->model(['pengguna_model']);
    }

    function index(){
        $data = [
            'data'=>$this->pengguna_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('guru/index',$data);
        $this->load->view('layouts/footer');
    }

    function create(){
        $data = [
            'kelas' => $this->kelas_model->get(),
            'pengguna' => $this->pengguna_model->guru(),
        ];
        $this->load->view('layouts/header');
        $this->load->view('guru/create',$data);
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $post = $this->input->post();
        $pengg = [
            "id"=>$post["pengguna_id"],
            "nama"=>$post["nama"],
            "username"=>$post["username"],
            "password"=>$post["password"],
            "jenis_kelamin"=>$post["jenis_kelamin"],
            "level"=>$post["level"],
        ];
        $pengguna = $this->pengguna_model->update($pengg);                
        if($pengguna){
            $guru = [
                "id"=>$post["id"],
                "pengguna_id"=>$post["pengguna_id"],
                "kelas_id"=>$post["kelas_id"],
            ];

            $ins = $this->pengguna_model->update($guru);
            if($ins){
                $this->session->successUpdate = true;
                header("location:/guru");
            }
        }
    }

    function delete(){
        $del = $this->pengguna_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/guru");
        }
    }

    function insert(){
        $post = $this->input->post();
        $post["id"] = $this->pengguna_model->count()+1;
        $pengg = [
            "id"=>$post["id"],
            "nama"=>$post["nama"],
            "username"=>$post["username"],
            "password"=>$post["password"],
            "jenis_kelamin"=>$post["jenis_kelamin"],
            "level"=>$post["level"],
        ];
        $pengguna = $this->pengguna_model->insert($pengg);                
        if($pengguna){
            $guru = [
                "pengguna_id"=>$post["id"],
                "kelas_id"=>$post["kelas_id"],
            ];

            $ins = $this->pengguna_model->insert($guru);
            if($ins){
                $this->session->successCreate = true;
                header("location:/guru");
            }
        }
    }

    function edit(){
        $data = [
            'guru' => $this->pengguna_model->single($this->input->get('id')),
            'kelas' => $this->kelas_model->get(),
            'pengguna' => $this->pengguna_model->guru(),
        ];
        $this->load->view('layouts/header');
        $this->load->view('guru/edit',$data);
        $this->load->view('layouts/footer');
    }
}