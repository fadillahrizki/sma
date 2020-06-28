<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trend_data extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION["user"])){
            header("location:/auth/login");
        }else if($this->session->user->level == "petugas"){
            header("location:/");
        }
        $this->load->model(['trend_data_model']);

        $this->bulan = [
            "Januari"=>1,
            "Februari"=>2,
            "Maret"=>3,
            "April"=>4,
            "Mei"=>5,
            "Juni"=>6,
            "Juli"=>7,
            "Agustus"=>8,
            "September"=>9,
            "Oktober"=>10,
            "November"=>11,
            "Desember"=>12,
        ];
    }

    function prediksi(){
        echo json_encode($this->trend_data_model->prediksi());
    }

    function index(){
        $data = [
            'data'=>$this->trend_data_model->get()
        ];
        $this->load->view('layouts/header');
        $this->load->view('trend_data/index',$data);
        $this->load->view('layouts/footer');
    }

    function create(){
        $this->load->view('layouts/header');
        $this->load->view('trend_data/create');
        $this->load->view('layouts/footer');
    }

    function read(){}
    
    function update(){
        $post = $this->input->post();
        $post["bulan_val"] = $this->bulan[$post["bulan"]];
        $post["jumlah_terjual"] = $post["stok_awal"] - $post["stok_sisa"];
        $trend_data = $this->trend_data_model->update($post);                
        if($trend_data){
            $this->session->successUpdate = true;
            header("location:/trend_data");
        }
    }

    function delete(){
        $del = $this->trend_data_model->delete($this->input->get());
        if($del){
            $this->session->successDelete = true;
            header("location:/trend_data");
        }
    }

    function insert(){

        $post = $this->input->post();

        $post["bulan_val"] = $this->bulan[$post["bulan"]];

        $post["jumlah_terjual"] = $post["stok_awal"] - $post["stok_sisa"];

        $trend_data = $this->trend_data_model->insert($post);                
        if($trend_data){
            $this->session->successCreate = true;
            header("location:/trend_data");
        }
    }

    function edit(){
        $data = [
            'trend_data' => $this->trend_data_model->single($this->input->get('id')),
        ];
        $this->load->view('layouts/header');
        $this->load->view('trend_data/edit',$data);
        $this->load->view('layouts/footer');
    }
}