<?php

class Trend_data_model extends CI_Model{
    public $tbl = 'trend_data';
    
    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        return $this->db->get($this->tbl)->result();
    }

    function single($id){
        return $this->db->where('id',$id)->get($this->tbl)->result()[0];
    }

    function prediksi(){
        return $this->db->order_by('tahun desc, bulan_val desc')->get($this->tbl)->result();
    }

    function insert($data){
        $trend_data = $this->db->insert($this->tbl,$data);

        if($trend_data)
            return true;

        return false;
    }

    function update($data){
        $trend_data = $this->db->replace($this->tbl,$data);

        if($trend_data)
            return true;

        return false;
    }

    function delete($data){
        $trend_data =  $this->db->delete($this->tbl,$data);

        if($trend_data)
            return true;

        return false;
    }
}