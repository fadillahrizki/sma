<?php

class Stok_model extends CI_Model{
    public $tbl = 'stok';
    
    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        return $this->db->get($this->tbl)->result();
    }

    function single($id){
        return $this->db->where('id',$id)->get($this->tbl)->result()[0];
    }

    function insert($data){
        $stok = $this->db->insert($this->tbl,$data);

        if($stok)
            return true;

        return false;
    }

    function update($data){
        $stok = $this->db->replace($this->tbl,$data);

        if($stok)
            return true;

        return false;
    }

    function delete($data){
        $stok =  $this->db->delete($this->tbl,$data);

        if($stok)
            return true;

        return false;
    }
}