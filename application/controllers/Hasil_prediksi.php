<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_prediksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION["user"])){
            header("location:/auth/login");
        }else if($this->session->user->level == "petugas"){
            header("location:/");
        }
        $this->load->model(['trend_data_model']);
    }

    function index(){
        $data = $this->trend_data_model->prediksi();
        $next_period = $this->trend_data_model->next_period();
        $this->load->view('layouts/header');
        $this->load->view('hasil_prediksi/index',[
            'data' => $data,
            'next_period' => $next_period
        ]);
        $this->load->view('layouts/footer');
    }

    function cetak(){
        $data = $this->trend_data_model->prediksi();
        $next_period = $this->trend_data_model->next_period();
        $this->load->view('hasil_prediksi/cetak',[
            'data' => $data,
            'next_period' => $next_period
        ]);
    }
}