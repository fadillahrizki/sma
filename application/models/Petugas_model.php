<?php

class Petugas_model extends CI_Model{
    public $tbl = 'petugas';
    
    function count(){
        return $this->db->count_all($this->tbl);
    }

    function get(){
        return $this->db->select('petugas.id,petugas.nama_lengkap,pengguna.username')->join('pengguna','pengguna.id=pengguna_id','left')->get($this->tbl)->result();
    }

    function single($id){
        return $this->db->select('petugas.id,petugas.nama_lengkap,petugas.jenis_kelamin,petugas.pengguna_id,petugas.alamat,petugas.no_hp,pengguna.username,pengguna.password')->join('pengguna','pengguna.id=pengguna_id','left')->where('petugas.id',$id)->get($this->tbl)->result()[0];
    }

    function insert($data){
        $petugas = $this->db->insert($this->tbl,$data);

        if($petugas)
            return true;

        return false;
    }

    function update($data){
        $petugas = $this->db->replace($this->tbl,$data);

        if($petugas)
            return true;

        return false;
    }

    function delete($data){
        $g = $this->single($data['id']);
        $pengguna =  $this->db->where('id',$g->pengguna_id)->delete('pengguna');
        if($pengguna){
            $petugas =  $this->db->delete($this->tbl,$data);
    
            if($petugas)
                return true;
    
            return false;
        }
    }
}