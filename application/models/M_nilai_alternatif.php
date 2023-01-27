<?php
class M_nilai_alternatif extends CI_Model
{
    //mengambil data dari database
    function get_data()
    {
        $this->db->select('*');
        $this->db->from('t_nilai_alternatif');
        $this->db->join('t_kriteria', 't_kriteria.id_kriteria = t_nilai_alternatif.id_kriteria');
        $this->db->join('t_alternatif', 't_alternatif.id_kedelai = t_nilai_alternatif.id_kedelai');
        $this->db->join('t_sub_kriteria', 't_sub_kriteria.id_sub = t_nilai_alternatif.id_sub');
        $this->db->order_by('t_nilai_alternatif.id_nilai', 'ASC');
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    //menyimpan data kedalam database
    public function input($data, $table) //$data dan $table merupakan variable yang dikirim dari controller
    {
        $this->db->insert($table, $data); //bagian ini merupakan query builder bawaan codeigniter
    }

    function get_edit($id)
    {
        $this->db->select('*');
        $this->db->from('t_nilai_alternatif');
        $this->db->join('t_kriteria', 't_kriteria.id_kriteria = t_nilai_alternatif.id_kriteria');
        $this->db->where('t_nilai_alternatif.id_nilai', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function hapus($id)
    {
        $this->db->where('id_nilai', $id);
        $hasil = $this->db->delete('t_nilai_alternatif');
        return $hasil;
    }

    function get_where($id)
    {
        $this->db->select('t_nilai_alternatif.*,t_sub_kriteria.nilai,t_alternatif.*');
        $this->db->from('t_nilai_alternatif');
        $this->db->join('t_sub_kriteria', 't_sub_kriteria.id_sub = t_nilai_alternatif.id_sub');
        $this->db->join('t_alternatif', 't_alternatif.id_kedelai = t_nilai_alternatif.id_kedelai');
        $this->db->where_in('t_nilai_alternatif.id_kedelai', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
    function get_where_rincian($id)
    {
        $this->db->select('t_nilai_alternatif.*,t_sub_kriteria.nilai,t_alternatif.*,t_kriteria.*');
        $this->db->from('t_nilai_alternatif');
        $this->db->join('t_sub_kriteria', 't_sub_kriteria.id_sub = t_nilai_alternatif.id_sub');
        $this->db->join('t_alternatif', 't_alternatif.id_kedelai = t_nilai_alternatif.id_kedelai');
        $this->db->join('t_kriteria', 't_kriteria.id_kriteria = t_nilai_alternatif.id_kriteria');
        $this->db->where_in('t_nilai_alternatif.id_kedelai', $id);
        $query = $this->db->get(); //eksekusi query
        return $query; //mengembalikan nilai yang didapat
    }
}
