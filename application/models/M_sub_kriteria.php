<?php
class M_sub_kriteria extends CI_Model
{
    //mengambil data dari database
    function get_data()
    {
        $this->db->select('*');
        $this->db->from('t_kriteria');
        $this->db->join('t_sub_kriteria', 't_kriteria.id_kriteria = t_sub_kriteria.id_kriteria');
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
        $this->db->where('id_sub', $id);
        $hasil = $this->db->delete('t_sub_kriteria');
        return $hasil;
    }
}
