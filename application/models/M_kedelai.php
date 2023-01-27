<?php
class M_kedelai extends CI_Model
{
    //mengambil data dari database
    function get_data()
    {
        $this->db->select('*'); //mengambil semua data
        $this->db->from('t_alternatif'); //dari table t_alternatif
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //menyimpan data kedalam database
    public function input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus($id)
    {
        $this->db->where('id_kedelai', $id);
        $hasil = $this->db->delete('t_alternatif');
        return $hasil;
    }

    function get_where($id)
    {
        $this->db->select('*');
        $this->db->from('t_alternatif');
        $this->db->where_in('t_alternatif.id_kedelai', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
