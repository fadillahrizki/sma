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
        $query = $this->db->query("
            SELECT * FROM trend_data o ORDER BY o.tahun ASC, o.bulan_val ASC
        ");
        return $query->result();
        // return $this->db->order_by('tahun asc, bulan_val asc')->get($this->tbl)->result();
    }

    function next_period(){
        $query = $this->db->query("SELECT AVG(jumlah_terjual) as sma FROM (SELECT jumlah_terjual FROM trend_data order by tahun desc, bulan_val desc LIMIT 0, 3) trend_data");
        return $query->result();
        // return $this->db->order_by('tahun asc, bulan_val asc')->get($this->tbl)->result();
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