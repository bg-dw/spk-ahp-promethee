<?php
class M_kriteria extends CI_Model
{
    //mengambil data dari database
    function get_data()
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from('t_kriteria'); //dari table t_kriteria
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //menyimpan data kedalam database
    public function input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $query = $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
        return $query; //mengembalikan nilai yang didapat
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query; //mengembalikan nilai yang didapat
    }

    function hapus($id)
    {
        $this->db->where('id_kriteria', $id);
        $hasil = $this->db->delete('t_kriteria');
        return $hasil;
    }

    function get_where($id)
    {
        $this->db->select('*');
        $this->db->from('t_kriteria');
        $this->db->where_in('t_kriteria.id_kriteria', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
